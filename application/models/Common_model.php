<?php
class Common_model extends CI_Model {
        
        public function an_en_cours($ordre=NULL, $cemois=NULL) {  
                $mois_en_cours = round(date("m"));
                $an_en_cours = date("Y");
                if($ordre==NULL) {
                        $ordre=$this->month_ordre_dans_lannee($cemois);
                }
                else {}
                // si mois_en_cours > ordre 4
                        // an pour 1/2/3/4 = annee en cours - 1
                        // an pour > 4 = annee en cours
                // si mois_en_cours < ordre 4
                        // an pour 1/2/3/4 = annee en cours
                        // an pour > 4 = annee en cours + 1
                if($mois_en_cours <= 8) { // de janv à aout 
                        if($ordre <= 4) { // sept->dec  
                                $an = round($an_en_cours-1);
                        }
                        else {
                                $an = $an_en_cours;              
                        }
                } else {
                        if($ordre <= 4) { // sept->dec
                                $an = $an_en_cours;
                        }
                        else {
                                $an = round($an_en_cours+1);
                        }
                }
                return $an;
        }
        public function month() {
                $queryM = $this->db->order_by('ordre', 'ASC')->get('mois');
		$result = $queryM->result_array();
                $mois = array();
                foreach($result as $rs) {
                        $mois[$rs['mois_chiffre']]['mois_court']=$rs['mois_court'];
                        $mois[$rs['mois_chiffre']]['mois_long']=$rs['mois_long'];
                        $mois[$rs['mois_chiffre']]['mois_chiffre']=$rs['mois_chiffre'];
                        $mois[$rs['mois_chiffre']]['ordre']=$rs['ordre'];
                }
                return $mois;
        }
        public function month_ordre_dans_lannee($mois) {
                $queryM = $this->db->order_by('ordre', 'ASC')->where(array("mois_chiffre"=>$mois))->get('mois');
		$result = $queryM->result_array(); //print_r($result);
                return $result[0]['ordre'];
        }
        public function club_liste() {
                //$where='departement="83" OR departement="06"';
                $query=$this->db
                        ->select("*")->from("club")
                        //->where(array("departement"=>"83", "departement"=>"06"))
                        //->where($where)
                        ->order_by('ville', "ASC")
                        ->get();
		return $query;
        }
        public function club_liste_var() {
                $where='departement="83" OR departement="06"';
                $query=$this->db
                        ->select("*")->from("club")
                        //->where(array("departement"=>"83", "departement"=>"06"))
                        ->where($where)
                        ->order_by('ville', "ASC")
                        ->get();
		return $query;
        }
        public function club_trouve_nom($club_id){
                $query=$this->db
                        ->select("*")->from("club")
                        ->where("id",$club_id)
                        ->get();  
                $nom=$query->result_array();
		return $nom[0]["nom"];
        }
        public function armes_liste() {
                $query=$this->db
                        ->select("*")->from("arme")
                        ->order_by('nom_arme_long', "ASC")
                        ->get();
		return $query;
        }
        public function categories_liste() {
                $query=$this->db
                        ->select("*")->from("categorie")
                        ->order_by('id', "ASC")
                        ->get();
		return $query;
        }
        public function return_droit_user($user_id) {
                $query=$this->db
                        ->select("droit_id")
                        ->from("utilisateur")
                        ->where(array("id"=>$user_id))
                        ->get();
                $result=$query->result();
                if(isset($result[0])) {
                        return $result[0]->droit_id;
                }
                else {
                        return 0;
                }
        }
        public function archers($club_id) { // archers pour ce club
                $les_archers=$this->db->select("utilisateur.id, utilisateur.nom, utilisateur.prenom, utilisateur.club_id, arme.nom_arme_court,
                                               categorie.nom_categ_court")
			->from("utilisateur")
			->where(array('club_id'=>$club_id))
                        ->join("arme","arme.id = utilisateur.arme_id")
                        ->join("categorie","categorie.id = utilisateur.categorie_id")
			->order_by("utilisateur.nom", "ASC")
			->get();
		return $les_archers->result();
        }
        public function archers_ts() { // * les archers
                $les_archers=$this->db->select("utilisateur.id, utilisateur.nom, utilisateur.prenom, utilisateur.club_id, arme.nom_arme_court,
                                               categorie.nom_categ_court, club.ville")
			->from("utilisateur")
			->where(array('utilisateur.droit_id !='=>"0"))
                        ->join("arme","arme.id = utilisateur.arme_id")
                        ->join("categorie","categorie.id = utilisateur.categorie_id")
                        ->join("club","club.id = utilisateur.club_id")
			->order_by("utilisateur.nom", "ASC")
			->get();
		return $les_archers->result();
        }
}