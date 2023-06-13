<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Repetitions extends CI_Controller {
	
	public function __construct() {
        parent::__construct();
		$this->load->helper(array('url', 'date', 'form', 'html')); 
		$this->load->library(array('session', 'form_validation'));
		$this->load->database();
		$this->load->model('Repetitions_model', '', TRUE);
		$this->load->model('Common_model', '', TRUE);
	}
	
	public function index() {
		
        $data['title'] = "Répétitions";
		
		if($this->session->user==NULL) {
				redirect('/');
		}
		$formdon['week_tot'] = array();
		// liste toutes les répétitions du mois en cours
		$formdon["type"] = $this->Repetitions_model->select_rep_type();
		$formdon['month'] = $this->Common_model->month(); /*
		if(isset($_GET["an"])) { $an=$_GET["an"]; }
		else { $an = date("Y"); }*/
		foreach($formdon['month'] as $m) {
			$totalmois=$this->Repetitions_model->sum_month($m["mois_chiffre"], $m["ordre"]); 
			if(isset($totalmois["totjr"][$m["mois_chiffre"]]["total"])) {
				$formdon['month_tot'][$m["mois_chiffre"]] = $totalmois["totjr"][$m["mois_chiffre"]]["total"];
			}
			else {
				$formdon['month_tot'][$m["mois_chiffre"]] = 0;
			}
			$formdon["totjr"][$m["mois_chiffre"]]["jr"]=$totalmois["totjr"][$m["mois_chiffre"]]["jr"];             
			$formdon['week_tot'][$m["mois_chiffre"]] = $this->Repetitions_model->semaines_tot($m["mois_chiffre"], $this->session->user['user_id']);
		}
		if(isset($_GET["a"])) {
			$formdon['msg_ok'] = "L'élément a bien été ajouté.";
		}
		elseif(isset($_GET["e"])) {
			$formdon['msg_ok'] = "L'élément a bien été modifié.";
		}
		elseif(isset($_GET["s"])) {
			$formdon['msg_ok'] = "L'élément a bien été supprimé.";
		}
		else {}
		
		//print_r($tab['week_tot']);
		$query = $this->db->order_by('chiffre', 'ASC')->get('distance');
		$formdon['distance']=$query->result();
		$this->load->view('templates/header', $data);
		$this->load->view('pages/repetitions/liste', $formdon);
		$this->load->view('templates/footer');
	}
	public function add() {
		
        $data['title'] = "Ajout répétition";
		// si post insert

		if($this->session->user==NULL) {
				redirect('/');
		}
		if ($this->form_validation->run('repetitions') == FALSE) { // form validé dans config/form_validation
		}
		else {
			$this->Repetitions_model->insert_entry(); // appel le model
			// retour ? // msg
			redirect('/repetitions/?a');
		}
		$ateldate=date("Y-m-d"); $csem=explode("-", $ateldate); // ajourd'hui
		$formdon["totjr"] = $this->Repetitions_model->select_repetitions($ateldate);
		$formdon["type"]=$this->Repetitions_model->select_rep_type();
		$query = $this->db->order_by('chiffre', 'ASC')->get('distance');
		$formdon['distance']=$query;
		$cettesem = round(strftime("%W", mktime(0,0,0,$csem[1],$csem[2],$csem[0]))+1); //echo $csem[1]." ".$csem[2]." ".$csem[0]." ".$cettesem;  // m,j,a 
		$formdon['week_tot'] = $this->Repetitions_model->semaine_tot($cettesem);
		
		$this->load->view('templates/header', $data);
		$this->load->view('pages/repetitions/add', $formdon);
		$this->load->view('templates/footer');
	}
	public function edit() {
		
        $data['title'] = "Modif répétition";
		
		if($this->session->user==NULL) {
				redirect('/');
		}
		if($this->input->get("date")) {
			
			if(isset($_POST["post"])) {
				
				$this->Repetitions_model->update_entry(); // appel le model
				// retour ? // msg
				redirect('/repetitions/?e');
			}
			
			$date=$this->input->get("date");
			$data['repetitions']=$this->Repetitions_model->sel_edit($date);
			$data["type"]=$this->Repetitions_model->select_rep_type();
			$query = $this->db->order_by('chiffre', 'ASC')->get('distance');
			$data['distance']=$query;
		}
		else {
			redirect('/repetitions');
		}
		
		$this->load->view('templates/header', $data);
		$this->load->view('pages/repetitions/edit', $data);
		$this->load->view('templates/footer');
	}
	public function supp() {
		
        $data['title'] = "Supp répétition";
		
		if($this->session->user==NULL) {
				redirect('/');
		}
		$this->load->view('templates/header', $data);
		$this->load->view('pages/repetitions/supp');
		$this->load->view('templates/footer');
	}
}
