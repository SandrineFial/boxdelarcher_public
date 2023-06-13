<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Utilisateur extends CI_Controller {

	public function __construct() {
        parent::__construct();
		$this->load->helper(array('url', 'date', 'form', 'html'));   
		$this->load->library(array('session', 'form_validation'));
		$this->load->database();
		$this->load->model('Common_model', '', TRUE);
		$this->load->model('Utilisateur_model', '', TRUE);
	}

	public function index() {
		
		if($this->session->user==NULL) {
			$data['title'] = "Connexion";
			$pagevue='connexion/identification';  
		} else {       
			$data['title'] = "Mon profil";
			$pagevue='utilisateur/index';
		}
		
		$user_id = $_SESSION['user']['user_id'];
		$droit_user = $this->Common_model->return_droit_user($user_id);
		$data["droit_user"] = $d["droit_user"] = $droit_user;
		
		if($droit_user=="2") {
			$club_id=$this->session->user['club_id']; 
			$data["archers"]=$this->Common_model->archers($club_id);
		} else {}
		
		if ($this->form_validation->run('utilisateur') == FALSE) { // form validé dans config/form_validation
		}
		else {                                        
			$user_id = $_SESSION['user']['user_id'];  $sinom_photo=NULL;
			if(!empty($_FILES["photo"]["name"])) {
				// verif si upload une photo
				
				$config['upload_path']          = path_img_user;
				$config['allowed_types']        = 'gif|jpg|png';
				$config['max_width']            = 2048;
				$config['max_height']           = 1152;
	
				$this->load->library('upload', $config);
	
				if ( ! $this->upload->do_upload('photo')) {
					$error = array('error' => $this->upload->display_errors());
					$dt["error"] = $error;
				}
				else {
					$data = array('upload_data' => $this->upload->data());
					$sinom_photo = $data['upload_data']["file_name"];
				}
			} else {}       
			$this->Utilisateur_model->update_entry($user_id, $sinom_photo); // bd et modif session
			$data["success"]="Modification bien enregistrée";
		}
		$where["id"]=$this->session->user['user_id'];
		$us_dn=$this->db->select("photo, nom, prenom, telephone, email, club_id, licence, arme_id, categorie_id")
			->from("utilisateur")
			->where($where)
			->get();
		$dt["user"]=$us_dn->result();
		$dt["clubs"]=$this->Common_model->club_liste_var();
		$data["armes"]=$this->Common_model->armes_liste();
		$data["categories"]=$this->Common_model->categories_liste();
		
		$this->load->view('templates/header', $data);
		$this->load->view('pages/'.$pagevue, $dt);
		$this->load->view('templates/footer');
	}                
}
