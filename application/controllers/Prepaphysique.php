<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PrepaPhysique extends CI_Controller {
	
	public function __construct() {
        parent::__construct();
		$this->load->database();
		$this->load->helper(array('url', 'date', 'form', 'html'));    
		//$this->load->library(array('session', 'form_validation'));
		$this->load->model('Prepa_physique_model', '', TRUE);
		$this->load->model('Common_model', '', TRUE);
	}

	public function index() {
		$data['title'] = "Préparation Physique";
		$pagevue='prepa_physique/index';
		$data['canonical'] = "index.php/prepaphysique";
		$data['description'] = "Des outils spécifiques pour avoir une meilleure condition physique en vue de développer sa performance au tir à l'arc.";

		$this->load->view('templates/header', $data);
		$this->load->view('pages/'.$pagevue, $data);
		$this->load->view('templates/footer');
	}

	public function liste() {
		
		if($this->session->user==NULL) {
			$data['title'] = "Connexion";
			$pagevue='connexion/identification';  
		} else { 
			$data['title'] = "Préparation Physique";
			$pagevue='prepa_physique/liste';
		}
		$formdon["exos"]=$this->Prepa_physique_model->sel_prepa_physique_exos();
		$formdon["type"] = $this->Prepa_physique_model->sel_prepa_physique_exos();
		$formdon['month'] = $this->Common_model->month();
		if(isset($_GET["an"])) { $sian=$this->input->get("an"); }
		else { $sian=date("Y"); }
		$ateldate=date("Y-m-d");
		foreach($formdon['month'] as $m) {
			$mois=$m["mois_chiffre"];
			$formdon["totjr"][$mois]["jr"]=$this->Prepa_physique_model->select_prepa_physique($ateldate, $sian, $mois);
			$totsem=$this->Prepa_physique_model->semaines_tot($mois);
			foreach($totsem as $ts) {   
				$formdon['week_tot'][$mois][$ts->semaine][$ts->exercice_id] = $ts->effort."-".$ts->repetitions;
			}
		}
		$formdon['ts_effort_color']=$this->Prepa_physique_model->sel_efforts_color();
		$formdon['efforts']=$this->Prepa_physique_model->sel_prepa_physique_efforts();
		
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
		
		$this->load->view('templates/header', $data);
		$this->load->view('pages/'.$pagevue, $formdon);
		$this->load->view('templates/footer');
	}    
	public function add() {
		
		if($this->session->user==NULL) {
			$data['title'] = "Connexion";
			$pagevue='connexion/identification';  
		} else { 
			$data['title'] = "Préparation Physique";
			$pagevue='prepa_physique/add';
		}
		
		if ($this->form_validation->run('prepaphysique') == FALSE) { // form validé dans config/form_validation
		}
		else {
			$this->Prepa_physique_model->insert_entry(); // appel le model
			redirect('/prepaphysique/?a');
		}
		$dt["rep"]=$this->Prepa_physique_model->select_prepa_physique(date("Y-m-d"));
		
		$dt["exos"]=$this->Prepa_physique_model->sel_prepa_physique_exos();
		$dt["outils"]=$this->Prepa_physique_model->sel_prepa_physique_outils();
		//$dt["efforts"]=$this->Prepa_physique_model->sel_prepa_physique_efforts();
		$dt['tb_effort']=$this->Prepa_physique_model->sel_efforts_liste_nom();
		
		$this->load->view('templates/header', $data);
		$this->load->view('pages/'.$pagevue, $dt);
		$this->load->view('templates/footer');
	}
	public function edit() {
		
        $data['title'] = "Modif prépa physique";
		
		if($this->session->user==NULL) {
				redirect('/');
		}
		if($this->input->get("date")) {
			
			if(isset($_POST["post"])) {
				
				$this->Prepa_physique_model->update_entry(); // appel le model
				redirect('/prepaphysique/?e');
			}
			
			$date=$this->input->get("date");
			$data['repetitions']=$this->Prepa_physique_model->sel_edit($date);
			$data["exos"]=$this->Prepa_physique_model->sel_prepa_physique_exos();
			$data["outils"]=$this->Prepa_physique_model->sel_prepa_physique_outils();
			$data['tb_effort']=$this->Prepa_physique_model->sel_efforts_liste_nom();
			$query = $this->db->order_by('chiffre', 'ASC')->get('distance');
			$data['distance']=$query;
		}
		else {
			redirect('/prepaphysique');
		}
		
		$this->load->view('templates/header', $data);
		$this->load->view('pages/prepa_physique/edit', $data);
		$this->load->view('templates/footer');
	}
}
