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
        $sql = "select Proposition.*,u.nom as client,u.id_utilisateur as c1,o.id_objet as id1,o.nom_objet as objet1,o.prix as p1,o.descri as d1,o.img as img1,o2.id_objet as id2,o2.nom_objet as objet2,o2.prix as p2,o2.descri as d2,o2.img as img2,u2.id_utilisateur as c2,u2.nom as nom2 from Proposition join Utilisateur u on Proposition.id_cible=u.id_utilisateur join Objet o on o.id_objet=Proposition.id_objet join Utilisateur u2 on Proposition.id_client=u2.id_utilisateur join Objet o2 on o2.id_objet=Proposition.id_objet_cible where u.email=%s and Proposition.stat=0";
        $sql = sprintf($sql, $this->db->escape($mail));
        $query = $this->db->query($sql);
        $data[] = array();
        foreach ($query->result_array() as $row) {
            $data[] = $row;
        }
        return $data;
    }
    public function personne($mail)
    {
        $sql = "select * from Utilisateur where email=%s";
        $sql = sprintf($sql, $this->db->escape($mail));
        $query = $this->db->query($sql);
        $row=$query->row_array();
        return $row;
    }
    
    public function accept($idp,$objet1,$objet2,$p1,$p2)
    {
        $sql = "update Proposition set stat=1 where id_proposition=%s";
        $sql = sprintf($sql, $this->db->escape($idp));
        $query = $this->db->query($sql);
        $sql = "update Objet set id_proprietaire=%s where id_objet=%s";
        $sql = sprintf($sql, $this->db->escape($p2),$this->db->escape($objet1));
        $query = $this->db->query($sql);
        $sql = "update Objet set id_proprietaire=%s where id_objet=%s";
        $sql = sprintf($sql, $this->db->escape($p1),$this->db->escape($objet2));
        $query = $this->db->query($sql);
    }
    public function decline($idp)
    {
        $sql = "update Proposition set stat=2 where id_proposition=%s";
        $sql = sprintf($sql, $this->db->escape($idp));
        $query = $this->db->query($sql);
    }
}
?>