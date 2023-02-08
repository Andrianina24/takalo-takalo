<?php
if (!defined('BASEPATH'))
    exit('No direct script acces allowed');

class Model extends CI_Model
{
    public function checkLogin($mail, $mdp)
    {
        $valiny = false;
        $query = $this->db->query('SELECT id_Utilisateur,nom,email,mdp FROM Utilisateur');
        foreach ($query->result_array() as $row) {
            if ($mail == $row['email'] && $mdp == $row['mdp']) {
                $valiny = true;
            }
        }
        return $valiny;
    }

    public function inscription($nom, $mail, $mdp)
    {
        $sql = "insert into Utilisateur(nom,email,mdp) values(%s,%s,%s)";
        $sql = sprintf($sql, $this->db->escape($nom), $this->db->escape($mail), $this->db->escape($mdp));
        $query = $this->db->query($sql);
    }

    public function details()
    {
        $sql = "select * from Objet";
        $query = $this->db->query($sql);
        $data[] = array();
        foreach ($query->result_array() as $row) {
            $data[] = $row;
        }
        return $data;
    }
    public function perso($mail)
    {
        $sql = "select * from Objet join Utilisateur on Objet.id_proprietaire=Utilisateur.id_Utilisateur where Utilisateur.email=%s";
        $sql = sprintf($sql, $this->db->escape($mail));
        $query = $this->db->query($sql);
        $data[] = array();
        foreach ($query->result_array() as $row) {
            $data[] = $row;
        }
        return $data;
    }
}
?>