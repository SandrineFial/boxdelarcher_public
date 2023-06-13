<?php
class Connexion_model extends CI_Model {

        public $nom;
        public $prenom;
        public $login;
        public $password;
        public $photo;
        public $club_id;
        public $licence;
        public $droit_id;

        
        public function si_existe($data) { /*
		$login=$this->input->post("login");
		$password=$this->encryption->encrypt($this->input->post("password"));
                $query = $this->db->get_where('utilisateur', array("login"=>$login, "password"=>$password), 1); // limit a 1 result
		return $query->result();*/
        }   
        public function si_existe_login($data) {
		$login=$this->input->post("login");
                $query = $this->db->get_where('utilisateur', array("login"=>$login), 1); // limit a 1 result
		return $query->result();
        }     
        public function insert_entry($donnees) {
                $this->db->insert('utilisateur', $donnees);
                return $this->db->insert_id();
        } 
        
        public function session_insertion($row) {
                if(is_array($row)) { $row=(object) $row; } else {}
                $newdata = array('user'=>
                        array(
                               'nom' => $row->nom,
                               'prenom' => $row->prenom,
                               'telephone' => $row->telephone,
                               'email' => $row->email,
                               'user_id' => $row->id,
                               'club_id' => $row->club_id,
                               'photo' => $row->photo,
                               'logged_in' => TRUE
               ));
               
               $this->session->set_userdata($newdata);
        }

}