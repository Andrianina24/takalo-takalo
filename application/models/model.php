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

    public function inscription($nom, $mail, $mdp)
    {
        $sql = "insert into Utilisateur(nom,email,mdp) values(%s,%s,%s)";
        $sql = sprintf($sql, $this->db->escape($nom), $this->db->escape($mail), $this->db->escape($mdp));
        $query = $this->db->query($sql);
    }

    public function details()
    {
        $sql = "select Objet.id_objet,Objet.nom_objet,Objet.prix,Objet.id_proprietaire,Objet.descri,Objet.stat,
        Details.img from Objet join Details on Objet.id_objet = Details.id_objet";
        $query = $this->db->query($sql);
        $liste = array();
        foreach ($query->result_array() as $row) {
            $liste[] = $row;
        }
    }
}
?>