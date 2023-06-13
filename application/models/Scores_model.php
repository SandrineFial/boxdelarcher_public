<?php
class Scores_model extends CI_Model {

        public $date;
        public $nombre;
        public $type_id;
        public $distance_id;

        public function liste() {
                $query = $this->db->get('score');
                return $query->result();
        }
        public function liste_user() {
                $user_id = $this->session->userdata('id');
                $query = $this->db->get_where('score', array("utilisateur_id"=>$user_id));
                return $query->result();
        }
        
        public function si_existe_ce_jr($data) {
                $query = $this->db->get_where('score', $data, 1); // limit a 1 result
                return $query->result();
        }
        /*
        public function select_score_dist() {
		$query1 = $this->db->order_by('id', 'ASC')->get('score_distance');
		return $query1->result();
        } */

        public function select_scores($ateldate, $distance=NULL) { // * les scores suivant la distance
                $where["utilisateur_id"]=$this->session->user['user_id'];
        
                if($distance==NULL) { // tel jr
                    $where['date']=$ateldate; }
                else { // * la liste des scores suivant distance
                    //$where['distance_id'] = $distance; 
                }
                $where['chiffre !='] = "0"; 
                $get_liste_jr=$this->db->select("score.*, distance.chiffre, temps.type, temps.icone as tps_icn,
                                                humeur.type as humeur, humeur.icone as hum_icn")
			->from("score")
			->join("distance", "distance.id = score.distance_id")
			->join("temps", "temps.id = score.temps_id")
			->join("humeur", "humeur.id = score.humeur_id")
			->where($where)
                        ->order_by('date', 'DESC')
                        ->order_by('distance_id', 'DESC')  
                        ->order_by('id', 'DESC')
			->get();
			$formdon["scores"] = $get_liste_jr->result();
                return $formdon;
        }
        public function semaine_tot_6_dernieres($where) { // * les scores des § dernieres sem de cet archer
        
			$get_liste_jr=$this->db->select("YEAR(date) as an, weekofyear(date) as semaine, GROUP_CONCAT(score_total,'-',distance_id SEPARATOR '_') as score_total")
			->from("score")
			->where($where)     
			->group_by("YEAR(date), weekofyear(date)")                
			->order_by("YEAR(date), weekofyear(date)", "DESC")
			->limit(10)
			->get();
			$tab_donnees = $get_liste_jr->result_array(); //print_r($tab_donnees);
			$new_tab = array();
			foreach($tab_donnees as $tab_don_new) {
					if(round($tab_don_new["semaine"])<10) { $sem="0".$tab_don_new["semaine"]; }
					else { $sem=$tab_don_new["semaine"]; }
					$new_tab[$tab_don_new["an"].$sem]=$tab_don_new["score_total"];
			} //print_r($new_tab);
			
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
                $tab_new_return = array(); //print_r($new_tab);
                foreach($donnees as $newdon => $tot) { 
                        $an=substr($newdon, 0, 4);
                        $semaine=substr($newdon, -2, 2);
						//if(isset($new_tab[$an.$semaine])) {
                        if(array_key_exists($newdon, $new_tab) === true) {
                                $tab_new_return[$newdon] = array("an"=>$an, "semaine"=>$semaine, "score_total"=>$new_tab[$an.$semaine]);
                        } else {
                                $tab_new_return[$newdon] = array("an"=>$an, "semaine"=>$semaine, "score_total"=>"");
                        } 
                        //echo $an.$semaine." / ";
                }
			//print_r($tab_new_return);
                return $tab_new_return;
        }
        public function meilleur_score_total($distance) {
                $where["utilisateur_id"]=$this->session->user['user_id'];
                $where["distance_id"]=$distance;
                $meilleur_score=$this->db->select_max("score.score_total")
                        ->from("score")
			->join("distance", "distance.id = score.distance_id")
			->where($where)
                        ->get();
                $tot=$meilleur_score->result_array();
                if(isset($tot["0"])) {
                        return $tot["0"]["score_total"];
                }
                else { return 0; }
        }
        public function meilleur_serie($distance, $score1ou2) {
                $where["utilisateur_id"]=$this->session->user['user_id'];
                $where["distance_id"]=$distance;
                $meilleur_score=$this->db->select_max("score.".$score1ou2)
                        ->from("score")
			->join("distance", "distance.id = score.distance_id")
			->where($where)
                        ->get();
                $tot=$meilleur_score->result_array();
                if(isset($tot["0"])) {
                        return $tot["0"][$score1ou2];
                }
                else { return 0; }
        }
        
        public function insert_entry() {
                
                $score1=$this->input->post('score1');
                $score2=$this->input->post('score2');
                $user_id=$this->session->user["user_id"];
                $vmini=$this->input->post('volee_mini');
                $vmaxi=$this->input->post('volee_maxi');
				$distance=$this->input->post('distance_id');
				$scoretotal=round($score1+$score2);
				$moyenne=$this->moyenne($distance, $score1, $score2, $scoretotal);
                
                $data= array('date'=>$this->input->post('date'),"utilisateur_id"=>$user_id, 'distance_id'=>$distance,
                        'score1'=>$score1, 'score2'=>$score2, 'score_total'=>$scoretotal,
                        'volee_mini'=>$vmini, 'volee_maxi'=>$vmaxi, 'volee_ecart'=>round($vmaxi-$vmini), 'moyenne'=>$moyenne,
                        'temps_id'=>$this->input->post('temps_id'), 'humeur_id'=>$this->input->post('humeur_id'),
                        'commentaire'=>$this->input->post('commentaire'), 'lieu'=>$this->input->post('lieu')
                        );
               
                $this->db->insert('score', $data);
        }    
        public function update_entry($id) {
                    
                $score1=$this->input->post('score1');
                $score2=$this->input->post('score2');
                $user_id=$this->session->user["user_id"];
                $vmini=$this->input->post('volee_mini');
                $vmaxi=$this->input->post('volee_maxi');
				
				$distance=$this->input->post('distance_id');
				$scoretotal=round($score1+$score2);
				$moyenne=$this->moyenne($distance, $score1, $score2, $scoretotal);
				
                $data= array('date'=>$this->input->post('date'),"utilisateur_id"=>$user_id, 'distance_id'=>$this->input->post('distance_id'),
                            'score1'=>$score1, 'score2'=>$score2, 'score_total'=>round($score1+$score2),
                            'volee_mini'=>$vmini, 'volee_maxi'=>$vmaxi, 'volee_ecart'=>round($vmaxi-$vmini), 'moyenne'=>$moyenne,
                            'temps_id'=>$this->input->post('temps_id'), 'humeur_id'=>$this->input->post('humeur_id'),
                            'commentaire'=>$this->input->post('commentaire'), 'lieu'=>$this->input->post('lieu')
                            );
                        
                $this->db->where(array("id"=>$id));
                $this->db->update('score', $data);
        }
		
		public function moyenne($distance, $score1, $score2, $scoretotal) {
			switch($distance) { // MOYENNE 
					case "18":
					case "25":
						if($score2 >1) { $moyenne= round($scoretotal/60, 2); }
						else { $moyenne= round($score1/30, 2); }
						break;
					case "20":
					case "30":
					case "40":
					case "50":
					case "60":
					case "70":
						if($score2 >1) { $moyenne= round($scoretotal/72, 2); }
						else { $moyenne= round($score1/36, 2); }
						break;
					default : $moyenne="";
				}
				return $moyenne;
		}
		
	public function sel_ce_score($id) {
		$where['score.id']=$id;
		$liste=$this->db->select("score.*")
		->from("score")
		->where($where)
		->get();
		return $liste->result();
	}   

}