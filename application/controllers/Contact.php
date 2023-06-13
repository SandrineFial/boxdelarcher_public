<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller {

	public function __construct() {
        parent::__construct();    
		$this->load->database();
		$this->load->helper(array('url', 'date', 'form', 'html'));    
		//$this->load->library(array('session', 'form_validation'));
		$this->load->model('Common_model', '', TRUE);
	}
	
	public function index() {
		
		$pagevue='contact/index'; // tous 
		$data['title'] = "Contact";
		$data['canonical'] = "index.php/contact";
		$data['description'] = "Vous avez envie de partager vos outils pour performer au tir à l'arc ou pour toute autre info. N'hésitez pas ! Contactez-moi.";
		
		$this->load->view('templates/header', $data);
		$this->load->view('pages/'.$pagevue, $data);
		$this->load->view('templates/footer');
	}                
}
