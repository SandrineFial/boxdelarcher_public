<?php
class Stages_model extends CI_Model {
    
	public function type_liste() {
        
    	$liste=$this->db->select("*")
            ->from("stage_type")
            ->order_by("id", "ASC")
            ->get();
        return $liste->result_array();
    }
    
	public function sel_ce_stage($id) {
		$where['stage.id']=$id;
		$liste=$this->db->select("stage.*, stage_type.nom as type")
		->from("stage")
		->join("stage_type", "stage_type.id = stage.type_id")
		->where($where)
		->get();
		return $liste->result();
	}
	public function select_stages($ateldate, $simois=NULL) { // annee en cours
		if($simois==NULL) { 
			$where['date']=$ateldate; }
		else { 
			$where['MONTH(date)'] = $simois;
		}
		
		$liste=$this->db->select("stage.*, stage_type.nom as type")
		->from("stage")
		->join("stage_type", "stage_type.id = stage.type_id")
		->where($where)
		->order_by("date", "ASC")
		->get();
		return $liste->result();
	}
    public function insert_entry() {
        
        // si mandat upoad et insert nom
        $chemin_mandat=$this->input->post('mandat');
        $data= array('date'=>$this->input->post('date'), 'lieu'=>$this->input->post('lieu'), 'type_id'=>$this->input->post('type_id'),
                     'mandat'=>$chemin_mandat, 'description'=>$this->input->post('description')
                );
        $this->db->insert('stage', $data);
    }
    public function update_entry($sinom_photo=NULL, $id) {
		
        $data= array('date'=>$this->input->post('date'), 'lieu'=>$this->input->post('lieu'), 'type_id'=>$this->input->post('type_id'),
                     'description'=>$this->input->post('description')
                );
		
		if($sinom_photo==NULL) {}
		else { $data["mandat"]=$sinom_photo; }
		$this->db->where(array("id"=>$id));
        $this->db->update('stage', $data);
    }
}