<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Accueil extends CI_Controller {

	public function __construct() {
        parent::__construct();    
		$this->load->database();
		$this->load->helper(array('url', 'date', 'form', 'html'));    
		//$this->load->library(array('session', 'form_validation'));
		$this->load->model('Common_model', '', TRUE);
		//$this->load->model('Prepa_physique_model', '', TRUE);
		//$this->load->model('Repetitions_model', '', TRUE);
		//$this->load->model('Scores_model', '', TRUE);
	}
	
	public function index() {
		
		$pagevue='accueil'; // tous 
		$data['title'] = "Tir à l'arc - tous les outils";
		$data['canonical'] = "";
		$data['description'] = "Un max d'outils pour l'archer. Des outils d'aide à l'entrainement, de la préparation physique, de la préparation mentale et du réglage matériel.";
		
		$this->load->view('templates/header', $data);
		$this->load->view('pages/'.$pagevue, $data);
		$this->load->view('templates/footer');
	}                
}
