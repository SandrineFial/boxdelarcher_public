<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Outils extends CI_Controller {

	public function __construct() {
        parent::__construct();
		$this->load->helper(array('url', 'date', 'form', 'html'));   
		//$this->load->library(array('session', 'form_validation'));
		$this->load->database();
		$this->load->model('Common_model', '', TRUE);
	}
	
	public function index() {
		  
		$data['title'] = "Outils d'entrainement";
		$pagevue='outils/index';
		$data['canonical'] = "index.php/outils";
		$data['description'] = "Voici des outils pour l'archer, pour son entrainement, pour se préparer aux compétitions de tir à l'arc. Des applications mobiles ou des documents à imprimer (feuilles de marque, feuille de match...).";
		
		$this->load->view('templates/header', $data);
		$this->load->view('pages/'.$pagevue, $data);
		$this->load->view('templates/footer');
	}
	 
}
