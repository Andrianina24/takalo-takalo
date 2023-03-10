<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('login');
	}
	public function login()
	{
		$mail = $this->input->post("mail");
		$mdp = $this->input->post("mdp");

		$this->load->model('Model');
		if ($this->Model->checkLogin($mail, $mdp)) {
			$_SESSION['mail'] = $mail;
			$this->session->set_userdata($mail, 'mail');
			redirect('welcome/objet');
		} else {
			redirect('welcome/index');
		}
	}

	public function inscription()
	{
		$nom = $this->input->post("nom");
		$mail = $this->input->post("mail");
		$mdp = $this->input->post("mdp");
		$this->load->model('Model');
		$this->Model->inscription($nom, $mail, $mdp);
		$_SESSION['mail'] = $mail;
		$this->session->set_userdata($mail, 'mail');
		redirect('welcome/objet');
	}

	public function inscri()
	{
		$this->load->view('inscri');
	}

	public function index2()
	{
		$this->load->view('objet');
	}

	public function objet_perso()
	{
		$this->load->model('Model');
		$data[] = array();
		$data['content'] = 'perso';
		$data['liste'] = $this->Model->perso($_SESSION['mail']);
		$this->load->view('objet', $data);
	}
	public function objet()
	{
		$this->load->model('Model');
		$data[] = array();
		$data['content'] = 'base';
		$this->load->model('Model');
		$data['liste'] = $this->Model->details();
		$this->load->view('template', $data);
	}
	public function proposition()
	{
		$this->load->model('Model');
		$data[] = array();
		$data['content'] = 'proposition';
		$this->load->model('Model');
		$data['liste'] = $this->Model->proposition($_SESSION['mail']);
		$this->load->view('objet', $data);
	}
	public function accept()
	{
		$idp = $_GET['idp'];
		$p1 = $_GET['p1'];
		$p2 = $_GET['p2'];
		$objet1 = $_GET['objet1'];
		$objet2 = $_GET['objet2'];
		$this->load->model('Model');
		$this->Model->accept($idp, $objet1, $objet2, $p2, $p1);
		redirect('welcome/objet');
	}

	public function decline()
	{
		$idp = $_GET['idp'];
		$this->load->model('Model');
		$this->Model->decline($idp);
		redirect('welcome/objet');
	}
	public function echange()
	{
		$p_cible = $_GET['personne'];
		$o_cible = $_GET['objet'];
		$this->load->model('Model');
        $client=$this->Model->personne($_SESSION['mail']);
        $objet=$this->Model->getobjet($_SESSION['mail']);
		$this->Model->echange($client['id_utilisateur'], $p_cible, $objet['id_objet'], $o_cible);
		redirect('welcome/objet');
	}
	public function deconnexion()
	{
		$this->session->sess_destroy();
		redirect('welcome/index');
	}


}