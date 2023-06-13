<?php
class Reglages_model extends CI_Model {
        
        public function insert_reglages() {
                
                $user_id=$this->session->user["user_id"];
                
                $options= array();
                foreach($_POST as $key => $val) {
                        if($key=="btnsubmit") {}
                        else {
                                $options[$key] = $this->input->post($key);  
                        }
                }  
            
                $this->db->where('utilisateur_id', $user_id);
                $select = $this->db->get("reglage");
                $seltout = $select->result_array();
                if(isset($seltout['0'])) {
                        $this->db->where('utilisateur_id', $user_id);
                        $this->db->update('reglage', $options);
                } else {
                        $this->db->insert('reglage', $options);
                }
                
        }

}