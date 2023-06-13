<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Accueil extends CI_Controller {

	public function __construct() {
        parent::__construct();    
		$this->load->database();
		$this->load->helper(array('url', 'date', 'form', 'html'));    
		$this->load->library(array('session', 'form_validation'));
		$this->load->model('Common_model', '', TRUE);
		$this->load->model('Prepa_physique_model', '', TRUE);
		$this->load->model('Repetitions_model', '', TRUE);
		$this->load->model('Scores_model', '', TRUE);
	}
	
	public function index() {
		$data["droit_user"] = $droit_user = 0;
		$where = array();
		
		if($this->session->user==NULL) {
			$data['title'] = "Connexion";
			$pagevue='connexion/identification';  
		} else {     
			$data['title'] = "Dashboard";
            $user_id = $_SESSION['user']['user_id'];
			$data['droit_user']=$droit_user=$this->Common_model->return_droit_user($user_id);
			if(isset($_GET["entraineur"]) AND $droit_user=="2") { // entraineur de ce club
				$pagevue='accueil_entraineur';
				$club_id=$this->session->user['club_id']; 
				$data["archers"]=$this->Common_model->archers($club_id); //print_r($data["archers"]);
			}
			elseif(isset($_GET["entraineur"]) AND $droit_user=="3") { // si Sandrine voir * les inscrits
				$pagevue='accueil_entraineur';
				$club_id=$this->session->user['club_id']; 
				$data["archers"]=$this->Common_model->archers_ts();
			}
			else {
				$pagevue='accueil'; // Archer 
				$where["utilisateur_id"]=$user_id;        
				$data["week_tot"]=$this->Repetitions_model->semaine_tot_6_dernieres($where);  
				$mois=date("m");
				$totsem=$this->Prepa_physique_model->semaines_tot_par_exos($mois, $where);
				foreach($totsem as $ts) {   
					$data['graph_exos'][$ts->exos_nom] = $ts->effort;
				} 
			} 
			
		}
		
		$this->load->view('templates/header', $data);
		$this->load->view('pages/'.$pagevue, $data);
		$this->load->view('templates/footer');
	}                
}
