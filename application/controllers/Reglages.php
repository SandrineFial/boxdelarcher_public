<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reglages extends CI_Controller {

	public function __construct() {
        parent::__construct();
		$this->load->helper(array('url', 'date', 'form', 'html'));    
		//$this->load->library(array('session', 'form_validation'));
		$this->load->database();
		$this->load->model('Reglages_model', '', TRUE);
		$this->load->model('Common_model', '', TRUE);
	}
	public function index() {
		/*
		if($this->session->user==NULL) {
			$data['title'] = "Connexion";
			$pagevue='connexion/identification';  
		} else {    */    
			$data['title'] = "Réglages matériels";
			$pagevue='reglages/index';
			$data['canonical'] = 'index.php/reglages';
			$data['description'] = "Régler son arc classique, oui mais comment ? A travers ce tuto complet, je vous explique comment régler son arc suivant des pré-requis précis.";
			
		//}
		
		$this->load->view('templates/header', $data);
		$this->load->view('pages/'.$pagevue, $data);
		$this->load->view('templates/footer');
	}    
	public function reglages_statiques() {
		/*
		if($this->session->user==NULL) {
			$data['title'] = "Connexion";
			$pagevue='connexion/identification';  
		} else {       */
			$data['title'] = "Réglages matériels statiques";
			$pagevue='reglages/reglages_statiques';
			$data['canonical'] = "index.php/".$pagevue;
			$data['description'] = "Les réglages de bases pour son arc classique. Je vous explique les alignements de base nécessaires avant le réglage du bouton de berger.";
			
		//}
		
		$this->load->view('templates/header', $data);
		$this->load->view('pages/'.$pagevue, $data);
		$this->load->view('templates/footer');
	}  
	public function reglages_dynamiques() {
		/*
		if($this->session->user==NULL) {
			$data['title'] = "Connexion";
			$pagevue='connexion/identification';  
		} else {    */   
			$data['title'] = "Réglages matériels dynamiques";
			$pagevue='reglages/reglages_dynamiques';
			$data['canonical'] = "index.php/".$pagevue;
			$data['description'] = "Les réglages en dynamique du bouton de berger. C'est la dernière phase du réglage de son arc classique après avoir tout aligné.";
		//}
		
		$this->load->view('templates/header', $data);
		$this->load->view('pages/'.$pagevue, $data);
		$this->load->view('templates/footer');
	}   
	public function mesreglages() {
		$userid=$this->session->user["user_id"];
		// verif si post
		if(isset($_POST['viseur_marque'])) {
			$this->Reglages_model->insert_reglages();
		} else {}
		
		if($this->session->user==NULL) {
			$data['title'] = "Connexion";
			$pagevue='connexion/identification';  
		} else {       
			$data['title'] = "Mes réglages";   
			$data['user_id']=$userid;
			$pagevue='reglages/mesreglages';
		}
		$selReg=$this->db->select("*")->from("reglage")->where(array("utilisateur_id"=>$userid))->get();
		$data["data"]=$selReg->result();
		
		$this->load->view('templates/header', $data);
		$this->load->view('pages/'.$pagevue);
		$this->load->view('templates/footer');
	}             
}
