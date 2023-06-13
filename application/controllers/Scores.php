<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Scores extends CI_Controller {
	
	public function __construct() {
        parent::__construct();
		$this->load->helper(array('url', 'date', 'form', 'html')); 
		$this->load->library(array('session', 'form_validation'));
		$this->load->database();
		$this->load->model('Scores_model', '', TRUE);
		$this->load->model('Common_model', '', TRUE);
	}
	public function index() {
		
        $data['title'] = "Scores";
		
		if($this->session->user==NULL) {
				redirect('/');
		}
		
		// liste toutes les scores
		$ateldate=date("Y-m-d");
		$formdon = $this->Scores_model->select_scores($ateldate, "1");
		$queryD = $this->db->order_by('chiffre', 'DESC')->get('distance');
		$formdon['distance']=$queryD->result();
		foreach($formdon['distance'] as $distance) {
			$score_tot=$this->Scores_model->meilleur_score_total($distance->chiffre);
			if($score_tot==0) {}
			else {
				$formdon['meilleur_score_total'][$distance->chiffre] = $score_tot;
			}
			$score_serie1=$this->Scores_model->meilleur_serie($distance->chiffre, "score1");  
			$score_serie2=$this->Scores_model->meilleur_serie($distance->chiffre, "score2");
			if($score_serie1==0) {}
			else {
				if($score_serie1>$score_serie2) {
					$formdon['meilleur_serie'][$distance->chiffre] = $score_serie1;
				}
				else {
					$formdon['meilleur_serie'][$distance->chiffre] = $score_serie2;
				}
			}
		}
		if(isset($_GET["a"])) {
			$formdon['msg_ok'] = "L'élément a bien été ajouté.";
		}
		elseif(isset($_GET["e"])) {
			$formdon['msg_ok'] = "L'élément a bien été modifié.";
		}
		elseif(isset($_GET["s"])) {
			$formdon['msg_ok'] = "L'élément a bien été supprimé.";
		}    /*
		elseif(isset($_GET["moyenne"])) {
			// boucles * les résultats pour faire la moyenne
			$get_moyenne=$this->db->select("id, distance_id, score1, score2, score_total")
			->from("score")
			->get();
			$moy=$get_moyenne->result_array();
			foreach($moy as $mn) {
				$moyenne=$this->Scores_model->moyenne($mn["distance_id"], $mn["score1"], $mn["score2"], $mn["score_total"]);
                $this->db->where(array("id"=>$mn["id"]));
                $this->db->update('score', array("moyenne"=>$moyenne));
			}
		}    */
		else {}
		
		$this->load->view('templates/header', $data);
		$this->load->view('pages/scores/liste', $formdon);
		$this->load->view('templates/footer');
	}
	public function add() {

		$id_modif=$this->input->get("id");
		if($id_modif==FALSE) {
			$data['title'] = "Ajouter un score";
		}
		else {
			$data['title'] = "Modifier un score";
			$data["score"]=$this->Scores_model->sel_ce_score($id_modif);
		}   
		
		if($this->session->user==NULL) {
				redirect('/');
		}
		if ($this->form_validation->run('scores') == FALSE) { // form validé dans config/form_validation
		}
		else {
			
			$id_modif=$this->input->post("id");
			if($id_modif==NULL) {
				$this->Scores_model->insert_entry();
				redirect('/scores/?a');
				}
			else {
				$this->Scores_model->update_entry($id_modif);
				redirect('/scores/?e');
			} 
			
		}
		$ateldate=date("Y-m-d"); // ajourd'hui
		//$data = $this->Scores_model->select_scores($ateldate);
		$queryD = $this->db->order_by('chiffre', 'ASC')->get('distance');
		$data['distance']=$queryD->result_array();
		$queryT = $this->db->order_by('type', 'ASC')->get('temps');
		$data['temps']=$queryT->result_array();
		$queryH = $this->db->order_by('id', 'ASC')->get('humeur');
		$data['humeur']=$queryH->result_array();
		
		$this->load->view('templates/header', $data);
		$this->load->view('pages/scores/add', $data);
		$this->load->view('templates/footer');
	}
}
