<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Connexion extends CI_Controller {

	public function __construct() {
        parent::__construct();
		$this->load->library(array('session', 'form_validation', 'encryption', 'email'));
		$this->load->helper(array('url', 'date', 'form', 'html'));   
		$this->load->database();
		$this->load->model('Connexion_model', '', TRUE);
		$this->load->model('Common_model', '', TRUE);
	}
	
	public function index() {
			
		$data['title'] = "Connexion";         
		$incorrect="Identifiants incorrects";
		$msg['msg']="";
		
		if ($this->form_validation->run('connexion') == FALSE) { // form validé dans config/form_validation
		}
		else {
			if($this->session->user==NULL) { } // si connecté va à l'accueil
			else { redirect('/'); }
			
			// connexion si user existe deja
			// post connexion
			$login=$this->input->post("login");
			$password=$this->input->post("password");
			$password_code=password_hash($password, PASSWORD_DEFAULT);
			$query = array("login"=>$login, "password"=>$password);
			$row = $this->Connexion_model->si_existe_login(array($query)); //print_r($password);
			if(isset($row['0'])) {
				// print_r($row['0']);
				//echo $password." + ".$this->encryption->decrypt($row['0']->password);
				if(password_verify($password, $row['0']->password)) {
					$this->Connexion_model->session_insertion($row['0']);
					redirect('/');
				} else { }
			}
			else {
				$msg["msg"]=$incorrect;
			}
			
		}  
		$this->load->view('templates/header', $data);
		$this->load->view('pages/connexion/identification', $msg);
		$this->load->view('templates/footer');
	}         
			
	public function insert_user() {
		// bd + session
			
		$login=$this->input->post("login");
		$password=password_hash($this->input->post("password"), PASSWORD_DEFAULT);
		$nom=$this->input->post("nom");
		$prenom=$this->input->post("prenom");
		$club=$this->input->post("club_id");
		$licence=$this->input->post("licence"); 
		$categ=$this->input->post("categorie_id");
		$arme=$this->input->post("arme_id");
		$row=array('login'=>$login, 'password'=>$password, 'nom'=>$nom, 'prenom'=>$prenom, 'email'=>$login,
					'club_id'=>$club, 'licence'=>$licence, 'categorie_id'=>$categ, 'arme_id'=>$arme);
		$insert_id=$this->Connexion_model->insert_entry($row);
		$row["id"]=$insert_id;
		$this->Connexion_model->session_insertion($row);
	}
	
	public function enregistrement() {
			
        $data['title'] = "S'inscrire";
		$incorrect="Identifiants incorrects";
		$data["msg"]="";
		$data["clubs"]=$this->Common_model->club_liste();
		$data["armes"]=$this->Common_model->armes_liste();
		$data["categories"]=$this->Common_model->categories_liste();
				
		if ($this->form_validation->run('connexion/enregistrement') == FALSE) { // form validé dans config/form_validation
			/*
			if($this->session->user==NULL) {
			}
			else { // si deja connecté
				redirect('/');
			} */
			$this->session->sess_destroy();
		}
		else {
				// connexion si user existe deja
				// post connexion
				
				$siexiste=$this->Connexion_model->si_existe_login($this->input->post("login"));
				if(isset($siexiste['0'])) {
					// si existe
					// redirect('/');    
					$data["msg"]="Cet identifiant existe déjà. Veuillez vous enregistrer avec une autre adresse email.";  
					$this->session->sess_destroy();
				}
				else {
					// verif si login = mail   
					// insert dans la bd + dans la session
					$insert_id=$this->insert_user();
					// mail nvl user
					
				}
				// retour ? // msg
				redirect("/");
			}
			
			$this->load->view('templates/header', $data);
			$this->load->view('pages/connexion/enregistrement', $data);
			$this->load->view('templates/footer');
	}
	
	public function mp_perdu() {
				
			$data['title'] = "Mot de passe perdu";
			$incorrect="Identifiants incorrects";
			$data["msg"]="";  
			$this->load->view('templates/header', $data);
			$this->load->view('pages/connexion/mp_perdu', $data);
			$this->load->view('templates/footer');
	}
	
	public function biographie() {
				
			$data['title'] = "Le développeur - Sandrine Fialon";
			$this->load->view('templates/header', $data);
			$this->load->view('pages/connexion/biographie', $data);
			$this->load->view('templates/footer');
	}
	public function logout() {
		$this->load->helper(array('url'));   
		$this->load->library(array('session'));
		$this->session->sess_destroy();
		redirect('/connexion/');
	}
}
