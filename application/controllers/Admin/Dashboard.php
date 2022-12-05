<?php

class Dashboard extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('auth_model');
		if(!$this->auth_model->current_user()){
			redirect('auth/login');
		}
	}

	public function index()
	{
		$this->load->model('Member');
		$this->load->model('Feedbacks');
        $this->load->model('Book');
		$this->load->model('Subscription');
		
		$data = [
			"current_user" => $this->auth_model->current_user(),
			"member_count" => $this->Member->count(),
			"feedback_count" => $this->Feedbacks->count(),
            "book_count" => $this->Book->count(),
			"subscription_count" => $this->Subscription->count()
		];

		$this->load->view('admin/dashboard.php', $data);
	}
}