<?php
class Competitions_model extends CI_Model {
    
	public function type_liste() {
        
    	$liste=$this->db->select("*")
            ->from("competition_type")
            ->order_by("id", "ASC")
            ->get();
        return $liste->result_array();
    }
	
	public function sel_cette_compete($id) {
		$where['competition.id']=$id;
		$liste=$this->db->select("competition.*, competition_type.nom as type")
		->from("competition")
		->join("competition_type", "competition_type.id = competition.type_id")
		->where($where)
		->get();
		return $liste->result();
	}
	public function select_competitions($ateldate, $simois=NULL) { // annee en cours
		if($simois==NULL) { 
			$where['date']=$ateldate; }
		else { 
			$where['MONTH(date)'] = $simois;
		}
		
		$liste=$this->db->select("competition.*, competition_type.nom as type")
		->from("competition")
		->join("competition_type", "competition_type.id = competition.type_id")
		->where($where)
		->order_by("date", "ASC")
		->get();
		return $liste->result();
	}
    
    public function insert_entry($sinom_photo=NULL) {
        
        $data= array('date'=>$this->input->post('date'), 'lieu'=>$this->input->post('lieu'), 'type_id'=>$this->input->post('type_id'),
                     'description'=>$this->input->post('description')
                );
		
		if($sinom_photo==NULL) {}
		else { $data["mandat"]=$sinom_photo; }
		
        $this->db->insert('competition', $data);
    }
    public function update_entry($sinom_photo=NULL, $id) {
		
        $data= array('date'=>$this->input->post('date'), 'lieu'=>$this->input->post('lieu'), 'type_id'=>$this->input->post('type_id'),
                     'description'=>$this->input->post('description')
                );
		
		if($sinom_photo==NULL) {}
		else { $data["mandat"]=$sinom_photo; }
		$this->db->where(array("id"=>$id));
        $this->db->update('competition', $data);
    }
}