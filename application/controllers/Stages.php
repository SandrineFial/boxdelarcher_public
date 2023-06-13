<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stages extends CI_Controller {

	public function __construct() {
        parent::__construct();
		$this->load->helper(array('url', 'date', 'form', 'html'));    
		$this->load->library(array('session', 'form_validation'));
		$this->load->database();
		$this->load->model('Stages_model', '', TRUE);
		$this->load->model('Common_model', '', TRUE);
	}
	
	public function index() {
		
		if($this->session->user==NULL) {
			$data['title'] = "Connexion";
			$pagevue='connexion/identification';  
		} else {       
			$data['title'] = "Stages";
			$pagevue='stages/liste';
            $user_id = $_SESSION['user']['user_id'];
			$data['droit_user']=$this->Common_model->return_droit_user($user_id);
		}
		
		$dt["liste"]= array();
		$dt['month'] = $this->Common_model->month();
		$dt["type"]=$this->Stages_model->type_liste();
		foreach($dt['month'] as $m) {
			$mois=$m["mois_chiffre"];    
			$dt["liste"][$mois]= $this->Stages_model->select_stages("",$mois);
		}
		if(isset($_GET["a"])) {
			$dt['msg_ok'] = "L'élément a bien été ajouté ou mis à jour.";
		}
		elseif(isset($_GET["s"])) {
			$dt['msg_ok'] = "L'élément a bien été supprimé.";
		}
		else {}
		
		if(isset($_SESSION['user'])) {
			$where["id"]=$this->session->user['user_id'];
			$us_dn=$this->db->select("photo, nom, prenom, telephone, email, club_id, licence, arme_id, categorie_id")
				->from("utilisateur")
				->where($where)
				->get();
			$user=$us_dn->result();
			$dt["user"]=$user["0"];
			$user_id = $_SESSION['user']['user_id'];
		} else {
			$dt["user"] = (object) array("nom"=>"", "prenom"=>"", "telephone"=>"", "email"=>"", "club_id"=>"",
											  "licence"=>"", "categorie_id"=>"", "arme_id"=>"");
		}
		
		$this->load->view('templates/header', $data);
		$this->load->view('pages/'.$pagevue, $dt);
		$this->load->view('templates/footer');
	}   
	public function add() { //============== Ajout / edit ==========
		if($this->session->user==NULL) {
			redirect('/');  
		} else {
			$id_modif=$this->input->get("id");
			if($id_modif==FALSE) {
				$data['title'] = "Ajouter un stage";
			}
			else {
				$data['title'] = "Modifier un stage";
				$dt["stage"]=$this->Stages_model->sel_ce_stage($id_modif);
			}           
			$pagevue='stages/add';
			// verif droit user admin pour cette page
            $user_id = $_SESSION['user']['user_id'];
			$droit=$this->Common_model->return_droit_user($user_id);
			if($droit!=3) {
				redirect('/stages');  
			} else {}
		}
		
		if ($this->form_validation->run('stages') == FALSE) { // form validé dans config/form_validation
		}
		else {
			$sinom_photo=NULL;
			if(!empty($_FILES["mandat"]["name"])) {
				// verif si upload une photo
				
				$config['upload_path']          = path_img_stages;
				$config['allowed_types']        = 'gif|jpg|png|pdf|doc|docx';
				$config['max_width']            = 2048;
				$config['max_height']           = 1152;
	
				$this->load->library('upload', $config);
	
				if ( ! $this->upload->do_upload('mandat')) {
					$error = array('error' => $this->upload->display_errors());
					$dt["error"] = $error;
				}
				else {
					$data = array('upload_data' => $this->upload->data());
					$sinom_photo = $data['upload_data']["file_name"];
				}
			} else {}  
			                             
			$id_modif=$this->input->post("id");
			if($id_modif==NULL) { $this->Stages_model->insert_entry($sinom_photo); }
			else {
				$this->Stages_model->update_entry($sinom_photo, $id_modif); } 
			
				redirect('/stages/?a');
		}
		
		$dt["type"]=$this->Stages_model->type_liste();
		$this->load->view('templates/header', $data);
		$this->load->view('pages/'.$pagevue, $dt);
		$this->load->view('templates/footer');
	}
	
	public function sinscrire($idstage) { // accessible sans connexion
		  
		$data['title'] = "Stages s'inscrire";
		$pagevue='stages/sinscrire';
		
		if(isset($_SESSION['user'])) {
			$where["id"]=$this->session->user['user_id'];
			$us_dn=$this->db->select("photo, nom, prenom, telephone, email, club_id, licence, arme_id, categorie_id")
				->from("utilisateur")
				->where($where)
				->get();
			$user=$us_dn->result();
			$dt["user"]=$user["0"];
			$user_id = $_SESSION['user']['user_id'];
		} else {
			$dt["user"] = (object) array("nom"=>"", "prenom"=>"", "telephone"=>"", "email"=>"", "club_id"=>"",
											  "licence"=>"", "categorie_id"=>"", "arme_id"=>"");
		}
		$dt["stage"]=$this->Stages_model->sel_ce_stage($idstage); 
		$dt["type"]=$this->Stages_model->type_liste();
		$dt["clubs"]=$this->Common_model->club_liste_var();
		$dt["armes"]=$this->Common_model->armes_liste();
		$dt["categories"]=$this->Common_model->categories_liste();
		
		$this->load->view('templates/header', $data);
		$this->load->view('pages/'.$pagevue, $dt);
		$this->load->view('templates/footer');
	
	}
	
}
