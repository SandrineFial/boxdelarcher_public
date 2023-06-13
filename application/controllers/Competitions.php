<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Competitions extends CI_Controller {

	public function __construct() {
        parent::__construct();
		$this->load->helper(array('url', 'date', 'form', 'html'));   
		$this->load->library(array('session', 'form_validation'));
		$this->load->database();
		$this->load->model('Competitions_model', '', TRUE);
		$this->load->model('Common_model', '', TRUE);
	}
	
	public function index() {
		
		if($this->session->user==NULL) {
			$data['title'] = "Connexion";
			$pagevue='connexion/identification';  
		} else {       
			$data['title'] = "Compétitions";
			$pagevue='competitions/liste';
            $user_id = $_SESSION['user']['user_id'];
			$data['droit_user']=$this->Common_model->return_droit_user($user_id);
		}
		$dt["liste"]= array();
		$dt['month'] = $this->Common_model->month();
		foreach($dt['month'] as $m) {
			$mois=$m["mois_chiffre"];    
			$dt["liste"][$mois]= $this->Competitions_model->select_competitions("",$mois);
		}
		
		if(isset($_GET["a"])) {
			$dt['msg_ok'] = "L'élément a bien été ajouté ou mis à jour.";
		}
		elseif(isset($_GET["s"])) {
			$dt['msg_ok'] = "L'élément a bien été supprimé.";
		}
		else {}
		
		$this->load->view('templates/header', $data);
		$this->load->view('pages/'.$pagevue, $dt);
		$this->load->view('templates/footer');
	}
	 
	public function add() {  //============== Ajout / edit ==========
		// insert mandat dans /public/file
		if($this->session->user==NULL) {
			redirect('/');  
		} else {
			$id_modif=$this->input->get("id");
			if($id_modif==FALSE) {
				$data['title'] = "Ajouter une compétition";
			}
			else {
				$data['title'] = "Modifier une compétition";
				$dt["compete"]=$this->Competitions_model->sel_cette_compete($id_modif);
			}           
			$pagevue='competitions/add';
			// verif droit user admin pour cette page
            $user_id = $_SESSION['user']['user_id'];
			$droit=$this->Common_model->return_droit_user($user_id);
			if($droit!=3) {
				redirect('/competitions');  
			} else {}
		}
		
		if ($this->form_validation->run('competitions') == FALSE) { // form validé dans config/form_validation
		}
		else {
			$sinom_photo=NULL;
			if(!empty($_FILES["mandat"]["name"])) {
				// verif si upload une photo
				
				$config['upload_path']          = path_img_competitions;
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
			if($id_modif==NULL) {
				$this->Competitions_model->insert_entry($sinom_photo); }
			else {
				$this->Competitions_model->update_entry($sinom_photo, $id_modif);
			} 
			
			redirect('/competitions/?a');
		}
		
		$dt["type"]=$this->Competitions_model->type_liste();
		$this->load->view('templates/header', $data);
		$this->load->view('pages/'.$pagevue, $dt);
		$this->load->view('templates/footer');
	}
}
