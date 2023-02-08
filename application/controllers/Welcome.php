<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

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

		$this->load->model('model');
		if($this->model->checkLogin($mail,$mdp))
		{
			$_SESSION['mail'] = $mail;
			$this->session->set_userdata($mail,'mail');
			redirect('welcome/index1');
		}else{
			redirect('welcome/index');
		}
	}

	public function inscription()
	{
		$nom = $this->input->post("nom");
		$mail = $this->input->post("mail");
		$mdp = $this->input->post("mdp");
		$this->load->model('model');
		$this->model->inscription($nom,$mail, $mdp);
		$_SESSION['mail'] = $mail;
		$this->session->set_userdata($mail,'mail');
		redirect('welcome/index1');
	}

	public function inscri()
	{
		$this->load->view('inscri');
	}	

	public function index1()
	{
		$this->load->view('template');
	}
	public function index2()
	{
		$this->load->view('objet');
	}		
}
