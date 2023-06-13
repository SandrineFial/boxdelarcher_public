<?php
class Repetitions_model extends CI_Model {

        public $date;
        public $nombre;
        public $type_id;
        public $distance_id;
/*
        public function liste() {
                $query = $this->db->get('repetition');
                return $query->result();
        }
        public function liste_user() {
                $user_id = $this->session->userdata('id');
                $query = $this->db->get_where('repetition', array("utilisateur_id"=>$user_id));
                return $query->result();
        } */
        
        public function si_existe_ce_jr($data) {
                $query = $this->db->get_where('repetition', $data, 1); // limit a 1 result
                return $query->result();
        }
        public function select_rep_type() {
		$query1 = $this->db->where(array("vue"=>1))->order_by('id', 'ASC')->get('repetition_type');
		return $query1->result();
        }
        
        public function sum_month($mois, $ordre) {
                // verif an+++++++++++++++++++++++
                $where["utilisateur_id"]=$this->session->user['user_id'];
                
                $an=$this->Common_model->an_en_cours($ordre, $mois);
                $where['an'] = $an; 
                $where['mois'] = $mois;
                
                $queryM = $this->db
                        ->select_sum("nombre")
                        ->from("repetition")
                        ->where($where)
                        ->get();
                        
		$formdon["totjr"][$mois]["total"] = $queryM->result_array();
                
		$ateldate = date("Y-m-d"); // ajourd'hui
		$formdon["totjr"][$mois]["jr"] = $this->Repetitions_model->select_repetitions($ateldate, $an, $mois);
                return $formdon;
        }
        
        public function select_repetitions($ateldate, $sian=NULL, $simois=NULL) { // annee en cours
                $where["utilisateur_id"]=$this->session->user['user_id'];
                if($sian==NULL) { 
                    $where['date']=$ateldate; }
                else { 
                    $where["mois"] = $simois;
                    $an=$this->Common_model->an_en_cours("", $simois);
                    $where['an'] = $an; 
                }
                $get_liste_jr = $this->db->select("repetition.*, repetition_type.nom_court, distance.chiffre")
			->from("repetition")
			->join("repetition_type", "repetition_type.id = repetition.type_id")
			->join("distance", "distance.id = repetition.distance_id")
			->where($where)
                        ->order_by('date', 'DESC')
                        ->order_by('distance_id', 'ASC')
			->get();
		$formdon = $get_liste_jr->result();
                return $formdon;
        }
        public function semaines_tot($mois, $user_id) {
                $where["utilisateur_id"]=$user_id;
                $where["mois"]=$mois;
                $an=$this->Common_model->an_en_cours("", $mois);
                $where['an'] = $an; 
                $select=$this->db->select("semaine, mois")
                ->select_sum("nombre")
                ->from("repetition")
                ->where($where)
		->group_by("CONCAT(an, semaine)")   
                ->order_by("date", "ASC")
                ->get();
                $tableaudedonnees=$select->result();
                return $tableaudedonnees;
        }
        public function semaine_tot($semaine) {
                $where["utilisateur_id"]=$this->session->user['user_id'];
                $where["semaine"]=$semaine;
                $an=date("Y");
                $where['an'] = $an; 
                $select=$this->db->select("semaine, travail_technique")
                ->select_sum("nombre")
                ->from("repetition")
                ->where($where)              
		->group_by("CONCAT(an, semaine)")
                ->order_by("date", "DESC")
                ->get();
                $tableaudedonnees=$select->result();
                return $tableaudedonnees;
        }
        
        public function semaine_tot_6_dernieres($where) {
		// select 6 dernières de semaines de répétitions
		
		$totsemaine=$this->db->select("an, semaine, GROUP_CONCAT(travail_technique SEPARATOR ' ') as travail_technique")
			->select_sum("nombre")
			->from("repetition")
                        ->where($where)               
			->group_by("CONCAT(an, semaine)")
                        ->order_by("YEARWEEK(date)", "DESC")
			->limit(8)
			->get();
                $tab_donnees= $totsemaine->result_array();
                $new_tab = array();
                foreach($tab_donnees as $tab_don_new) {
                        if(round($tab_don_new["semaine"])<=9) { $sem="0".$tab_don_new["semaine"]; }
                        else { $sem=$tab_don_new["semaine"]; } // echo $sem."./.";
                        $new_tab[$tab_don_new["an"].$sem]=$tab_don_new["nombre"].'_'.$tab_don_new["travail_technique"];
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
                for($n=$ansem_moins_6; $n<=$ansem_en_cours; $n++) { // recree le tableau vide avec nvl semaine
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
                                $travail_nb=explode("_", $new_tab[$newdon]);
                                $tab_new_return[$newdon] = array("an"=>$an, "semaine"=>$semaine, "nombre"=>$travail_nb["0"],
                                                                 "travail_technique"=>$travail_nb["1"]);
                        } else {
                                $tab_new_return[$newdon] = array("an"=>$an, "semaine"=>$semaine, "nombre"=>"0", "travail_technique"=>"");
                        }
                        //echo $an.$semaine." / ";
                }
               
                return $tab_new_return;
        }
        public function insert_entry() {
                $nombre_post=$this->input->post('nombre');
                $user_id=$this->session->user["user_id"];
                $ndate=explode("-",$this->input->post('date')); // a-m-j
                
                $data = array('date'=>$this->input->post('date'), 'type_id'=>$this->input->post('type_id'),
                             'distance_id'=>$this->input->post('distance_id'), "utilisateur_id"=>$user_id, "an"=>$ndate["0"]);
               
                $nombre_old = $this->Repetitions_model->si_existe_ce_jr($data);
                if(isset($nombre_old['0']->nombre)) {
                        // 1. verif si nb de rep deja ce jr
                                // 2. modif si ok
                                // 2. insert si non
                        // recup nb précédent et ajoute nv nombre
                        $old_txt_ttechniq = $nombre_old['0']->travail_technique;
                        $nv_txt_ttechniq = $old_txt_ttechniq."<br/>".$this->input->post('travail_technique');
                        $nombre_nv=round($nombre_old['0']->nombre+$nombre_post);
                        $this->db->where('id', $nombre_old['0']->id);
                        $this->db->update('repetition', array('nombre'=>$nombre_nv,
                                                              "travail_technique"=>$nv_txt_ttechniq));
                }               
                else {        
                        $data["nombre"]=$nombre_post;
                        $data["semaine"]= round(date('W', strtotime(date($this->input->post('date'))))); // round(strftime("%W", mktime(0,0,0,$ndate[1],$ndate[2],$ndate[0]))+1);  // m,j,a       
                        $data["mois"]=$ndate["1"];
                        $data["travail_technique"]=$this->input->post('travail_technique');
                        $this->db->insert('repetition', $data);
                }
        }                      

        public function update_entry() { // update par date
                $user_id = $this->session->user["user_id"];
                
                foreach($_POST as $id=>$valeur) {
                        foreach($valeur as $type=>$val) {
                                /*echo $id."=".$type.$val." "; */
                                $ndate=explode("-", $valeur['date']); // a-m-j
                                $semaine = round(date('W', strtotime(date($valeur["date"])))); 
                                $this->db->where('id', $id);
                                $this->db->update('repetition', array( 'date'=>$valeur["date"], 'nombre'=>$valeur["nombre"], 'semaine'=>$semaine,
                                        'mois'=>$ndate["1"], 'type_id' => $valeur["type_id"], 'distance_id' => $valeur["distance_id"],
                                        'travail_technique' => $valeur["travail_technique"]));
                        }
                }
                
        }

        public function sel_edit($date) {
                $user_id = $this->session->user["user_id"];
                $query = $this->db->get_where('repetition', array('date'=>$date, 'utilisateur_id'=>$user_id));
                return $query->result();
        }
}