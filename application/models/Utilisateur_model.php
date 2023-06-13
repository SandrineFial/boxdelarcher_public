<?php
class Utilisateur_model extends CI_Model {
        
        public function update_entry($user_id, $sinom_photo) { // update directement
                
                $data = array(
                        'nom' => $this->input->post('nom'),
                        'prenom' => $this->input->post('prenom'),
                        'telephone' => $this->input->post('telephone'),
                        'email' => $this->input->post('email'),
                        'club_id' => $this->input->post('club_id'),
                        'licence' => $this->input->post('licence'),
                        'arme_id' => $this->input->post('arme_id'),
                        'categorie_id' => $this->input->post('categorie_id')
                );
                if($sinom_photo==NULL) {}
                else { $data["photo"]=$sinom_photo; }
                $this->db->where('id', $user_id);
                $this->db->update('utilisateur', $data);  
                $data["user_id"]=$user_id;
                $this->session_update($data);
        }
        
        public function session_update($row) {
                $newdata = array('user'=>
                        array(
                               'nom' => $row["nom"],
                               'prenom' => $row["prenom"],
                               'telephone' => $row["telephone"],
                               'email' => $row["email"],
                               'club_id' => $row["club_id"],
                               'user_id' => $row["user_id"],
                               //'photo' => $row["photo"],
                               'logged_in' => TRUE
               ));
                if(isset($row["photo"])) {
                        $newdata["user"]["photo"]=$row["photo"];
                } else {
                        $newdata["user"]["photo"]=$_SESSION['user']["photo"];
                }
               
               $this->session->set_userdata($newdata);
        }
}