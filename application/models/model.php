<?php
if (!defined('BASEPATH'))
    exit('No direct script acces allowed');

class Model extends CI_Model
{
    public function checkLogin($mail, $mdp)
    {
        $valiny = false;
        $query = $this->db->query('SELECT id_utilisateur,nom,email,mdp FROM Utilisateur');
        foreach ($query->result_array() as $row) {
            if ($mail == $row['email'] && $mdp == $row['mdp']) {
                $valiny = true;
            }
        }
        return $valiny;
    }
}
?>