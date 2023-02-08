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
    public function proposition($mail)
    {
        $sql = "select Proposition.*,u.nom as client,o.nom_objet as objet1,o.prix as p1,o.descri as d1,o.img as img1,o2.nom_objet as objet2,o2.prix as p2,o2.descri as d2,o2.img as img2 from Proposition join Utilisateur u on Proposition.id_cible=u.id_utilisateur join Objet o on o.id_objet=Proposition.id_objet join Utilisateur u2 on Proposition.id_client=u2.id_utilisateur join Objet o2 on o2.id_objet=Proposition.id_objet_cible where u.email=%s";
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