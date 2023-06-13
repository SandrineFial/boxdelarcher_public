<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PrepaMentale extends CI_Controller {

	public function __construct() {
        parent::__construct();
		$this->load->helper(array('url', 'date', 'form', 'html'));    
		//$this->load->library(array('session', 'form_validation'));
		$this->load->model('Common_model', '', TRUE);
	}
	
	public function index() {
		    
		$data['title'] = "Préparation mentale";
		$pagevue='prepa_mentale/index';
		$data['canonical'] = "index.php/prepamentale";
		$data['description'] = "Un petit aperçu de ce qu'est la préparation mentale pour l'archer. A quoi ça peut bien servir ?";
		
		$this->load->view('templates/header', $data);
		$this->load->view('pages/'.$pagevue, $data);
		$this->load->view('templates/footer');
	}  
	public function visualisation() {
		      
		$data['title'] = "Visualisation";
		$pagevue='prepa_mentale/visualisation';
		$data['canonical'] = "index.php/prepamentale/visualisation";
		$data['description'] = "La visualisation aide l'archer à visualiser son meilleur tir avant de tirer sa flèche. Je vous explique comment bien faire travailler son imagerie mentale au service de sa performance.";
		
		$this->load->view('templates/header', $data);
		$this->load->view('pages/'.$pagevue, $data);
		$this->load->view('templates/footer');
	}               
}
