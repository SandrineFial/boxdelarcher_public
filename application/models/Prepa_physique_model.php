<?php
class Prepa_physique_model extends CI_Model {
        
        public function si_existe_ce_jr($data) {
                $query = $this->db->get_where('prepa_physique', $data, 1); // limit a 1 result
                return $query->result();
        }
        public function select_prepa_physique($ateldate, $sian=NULL, $simois=NULL) { // annee en cours
                $where["utilisateur_id"]=$this->session->user['user_id'];
                if($sian==NULL) { 
                    $where['date']=$ateldate; }
                else { 
                    $where['mois'] = $simois;
                }
                $get_liste_jr = $this->db->select("prepa_physique.*, prepa_physique_exos.exos_nom, prepa_physique_outils.outils_nom")
			->from("prepa_physique")
			->join("prepa_physique_exos", "prepa_physique_exos.id = prepa_physique.exercice_id")
			->join("prepa_physique_outils", "prepa_physique_outils.id = prepa_physique.outils_id")
			->where($where)
                        ->order_by('date', 'DESC')
			->get();
		$formdon = $get_liste_jr->result();
                return $formdon;
        }
        public function sel_prepa_physique_exos() { 
                $get_liste_jr = $this->db->select("*")
			->from("prepa_physique_exos")
                        ->where(array("vue"=>"1"))
                        ->order_by('exos_nom', 'ASC')
			->get();
		$formdon = $get_liste_jr->result();
                return $formdon;
        }
        public function sel_prepa_physique_outils() { 
                $get_liste_jr = $this->db->select("*")
			->from("prepa_physique_outils")
                        ->order_by('id', 'ASC')
			->get();
		$formdon = $get_liste_jr->result();
                return $formdon;
        }
        public function sel_prepa_physique_efforts() { 
                $get_liste_jr = $this->db->select("*")
			->from("prepa_physique_efforts")
                        ->order_by('id', 'ASC')
			->get();
		$formdon = $get_liste_jr->result();
                return $formdon;
        }
        public function sel_efforts_liste_nom() { 
                $get_liste_jr = $this->sel_prepa_physique_efforts();
                $new_table = array();
                foreach($get_liste_jr as $t) {
                        $new_table[$t->id]=$t->efforts_nom;
                }
                return $new_table;
        }
        public function sel_efforts_color() { 
                $get_liste_jr = $this->sel_prepa_physique_efforts();
                $new_table = array();
                foreach($get_liste_jr as $t) {
                        $new_table[$t->id]=$t->efforts_color;
                }
                return $new_table;
        }
        public function semaines_tot($mois) {
                $where["utilisateur_id"]=$this->session->user['user_id'];
                $where["mois"]=$mois;
                $select=$this->db->select("prepa_physique.id, prepa_physique.exercice_id, prepa_physique.semaine, prepa_physique.mois,
                                          prepa_physique.effort, prepa_physique_exos.exos_nom")
                ->select_sum("effort")
                ->select_sum("repetitions")
                ->from("prepa_physique")
		->join("prepa_physique_exos", "prepa_physique_exos.id = prepa_physique.exercice_id")
                ->where($where)
                ->group_by("CONCAT(an, semaine)")
                ->group_by("prepa_physique_exos.exos_nom")      
                ->order_by("YEARWEEK(date)", "ASC")
                ->get();
                $tableaudedonnees=$select->result();
                return $tableaudedonnees;
                
                    // semaine
                        // outils1
                            // exos1
                                // total
                            // exos2
                                // total
        
        }
        public function semaines_tot_par_exos($mois, $where) {
                //$where["utilisateur_id"]=$this->session->user['user_id'];
                $where["mois"]=$mois;
                $select=$this->db->select("prepa_physique.id, prepa_physique.semaine, prepa_physique.mois,
                                          prepa_physique.repetitions,
                                          prepa_physique.effort, prepa_physique_exos.exos_nom")
                ->select_sum("effort")
                ->from("prepa_physique")
		->join("prepa_physique_exos", "prepa_physique_exos.id = prepa_physique.exercice_id")
                ->where($where)
                ->group_by("prepa_physique_exos.exos_nom")   
                ->order_by("YEARWEEK(date)", "DESC")
                ->get();
                $tableaudedonnees=$select->result();
                return $tableaudedonnees;
                
                    // semaine
                        // outils1
                            // exos1
                                // total
                            // exos2
                                // total
        }
        public function semaines_tot_exos_6sem($where) {
                $select=$this->db->select("id, an, semaine, mois, exercice_id, repetitions, effort")
                ->select_sum("effort")
                ->select_sum("repetitions")
                ->from("prepa_physique")
                ->where($where)
                ->group_by("CONCAT(an, semaine)")
                ->order_by("YEARWEEK(date)", "DESC")
                ->limit(8)
                ->get();
                //$tableaudedonnees=$select->result();
                //return $tableaudedonnees;
                $tab_donnees= $select->result_array(); // print_r($tab_donnees);
                $new_tab = array();
                foreach($tab_donnees as $tab_don_new) {
                        if(round($tab_don_new["semaine"])<=9) { $sem="0".$tab_don_new["semaine"]; }
                        else { $sem=$tab_don_new["semaine"]; } // echo $sem."./.";
                        $new_tab[$tab_don_new["an"].$sem]=$tab_don_new["effort"]."-".$tab_don_new["repetitions"];
                }
                // print_r($new_tab);
               
                $donnees=array();
                $sem_en_cours = date('W', strtotime(date("Y-m-d"))); 
                $an_en_cours = date('Y', strtotime(date("Y-m-d")));
                $ansem_en_cours=$an_en_cours.$sem_en_cours;
                $il_y_a_6sem = $sem_en_cours-5;
                switch($il_y_a_6sem) {
                        case "0" : $ansem_moins_6=round($an_en_cours-1)."53"; break;
                        case "-1" : $ansem_moins_6=round($an_en_cours-1)."52"; break;
                        case "-2" : $ansem_moins_6=round($an_en_cours-1)."51"; break;
                        case "-3" : $ansem_moins_6=round($an_en_cours-1)."50"; break;
                        case "-4" : $ansem_moins_6=round($an_en_cours-1)."49"; break;
                        case "-5" : $ansem_moins_6=round($an_en_cours-1)."48"; break;
                        case "-6" : $ansem_moins_6=round($an_en_cours-1)."47"; break;
                        case "-7" : $ansem_moins_6=round($an_en_cours-1)."46"; break;
                        case "-8" : $ansem_moins_6=round($an_en_cours-1)."45"; break;
                        default : 
                                if(round($sem_en_cours-6)<10) { $sem_enc="0".round($sem_en_cours-6); }
                                else { $sem_enc=round($sem_en_cours-6); }
                                $ansem_moins_6=$an_en_cours.$sem_enc; break;
                }
                                           
                //echo "Sem - 6 : ".$ansem_moins_6." / ";
                //echo "Sem en cours : ".$ansem_en_cours;
                for($n=$ansem_moins_6; $n<=$ansem_en_cours; $n++) { // recree le tableau avec nvl données
                        if($n==round($an_en_cours-1)."54") {
                                $n=$an_en_cours."01";
                        } else {}
                        // echo "<br/>".$n." / ";
                        $donnees[$n]="0";       
                }
                $tab_new_return = array();
                foreach($donnees as $newdon => $tot) { 
                        $an=substr($newdon, 0, 4);
                        $semaine=substr($newdon, -2, 2);
                        if(array_key_exists($newdon, $new_tab)) {
                                $rep_eff=explode("-",$new_tab[$newdon]);
                                $tab_new_return[$newdon] = array("an"=>$an, "semaine"=>$semaine, "effort"=>$rep_eff[0], "repetitions"=>$rep_eff[1]);
                        } else {
                                $tab_new_return[$newdon] = array("an"=>$an, "semaine"=>$semaine, "effort"=>"0", "repetitions"=>0);
                        }
                }
               
                return $tab_new_return;
                    // semaine
                        // outils1
                            // exos1
                                // total
                            // exos2
                                // total
        }
        public function semaine_tot($semaine) {
                $where["utilisateur_id"]=$this->session->user['user_id'];
                $where["semaine"]=$semaine;
                $select=$this->db->select("semaine")
                ->select_sum("repetitions")
                ->from("prepa_physique")
                ->where($where)
                ->group_by("CONCAT(an, semaine)")
                ->order_by("YEARWEEK(date)", "DESC")
                ->get();
                $tableaudedonnees=$select->result();
                return $tableaudedonnees;
        }
        
        public function insert_entry() {
                
		//unset($this->input->post('btnsubmit'));
                $user_id=$this->session->user["user_id"];
                $ndate=explode("-",$this->input->post('date')); // a-m-j
                $nombre_post=$this->input->post('repetitions');
                
                $data= array('date'=>$this->input->post('date'), 'exercice_id'=>$this->input->post('exercice_id'),
                             'outils_id'=>$this->input->post('outils_id'), "utilisateur_id"=>$user_id,
                             "mois"=>$ndate["1"], "an"=>$ndate["0"], "repetitions"=>$this->input->post("repetitions"),
                             "effort"=>$this->input->post("effort"),
                             "commentaire"=>$this->input->post('commentaire'));
               
                $nombre_old=$this->Prepa_physique_model->si_existe_ce_jr($data);
                if(isset($nombre_old['0']->repetitions)) {
                        // 1. verif si nb de rep deja ce jr
                                // 2. modif si ok
                                // 2. insert si non
                        // recup nb précédent et ajoute nv nombre
                        $nombre_nv=round($nombre_old['0']->repetitions+$nombre_post);
                        $this->db->where('id', $nombre_old['0']->id);
                        $this->db->update('prepa_physique', array('repetitions'=>$nombre_nv));
                }               
                else { 
                        $data["semaine"]= round(date('W', strtotime(date($this->input->post('date')))));
                        // $data["semaine"]= round(strftime("%W", mktime(0,0,0,$ndate[1],$ndate[2],$ndate[0]))+1);  // m,j,a   
                        $data["repetitions"]=$nombre_post; 
                        $data["temps"]=$this->input->post('temps');
                        $this->db->insert('prepa_physique', $data);
                }
        }                      

        public function update_entry() { // update directement
                
                $user_id = $this->session->user["user_id"];
                
                foreach($_POST as $id=>$valeur) {
                        foreach($valeur as $type=>$val) {
                                /*echo $id."=".$type.$val." "; */
                                $semaine = round(date('W', strtotime(date($valeur["date"])))); 
                                $this->db->where('id', $id);
                                $this->db->update('prepa_physique', array( 'date'=>$valeur["date"], 'semaine'=>$semaine,
                                'exercice_id'=>$valeur['exercice_id'], 'outils_id'=>$valeur['outils_id'],
                                "repetitions"=>$valeur["repetitions"], "effort"=>$valeur["effort"], "commentaire"=>$valeur['commentaire']));
                        }
                }
                /*
                $this->date    = $this->input->post('date');
                //$this->repetitions    = $this->input->post('repetitions');
                //$this->temps    = $this->input->post('temps');
                $this->exercice_id    = $this->input->post('exercice_id');
                $this->outils_id   = $this->input->post('outils_id');
                $this->effort   = $this->input->post('effort');
                $ndate=explode("-",$this->input->post('date')); // a-m-j
                
                $this->db->where('id', $this->input->post('id'));
                $this->db->update('prepa_physique', array('id' => $this->input->post('id'), 'date' => $this->input->post('date'),
                        'exercice_id'=>$this->input->post('exercice_id'), 'outils_id'=>$this->input->post('outils_id'),
                        //'repetitions'=> $this->input->post('repetitions'), 'temps'=> $this->input->post('temps'),
                        //"semaine"=>round(strftime("%W", mktime(0,0,0,$ndate[1],$ndate[2],$ndate[0]))+1), "an"=>$ndate["0"],
                        'effort'=>$this->input->post('effort'))); // m,j,a
                
                */
        }
        public function sel_edit($date) {
                $query = $this->db->get_where('prepa_physique', array('date'=>$date));
                return $query->result();
        }

}