<?php

class Page extends CI_Controller
{
	public function index()
	{
		$data['meta'] = [
			'title' => 'MyLibrary',
		];

		$this->load->view('home', $data);
	}

	public function about()
	{
		$data['meta'] = [
			'title' => 'About MyLibrary',
		];

		$this->load->view('about', $data);
	}

	public function contact()
{
  $data['meta'] = [
    'title' => 'Contact Us',
  ];

  if ($this->input->method() === 'post') {
    $this->load->model('Feedbacks');

    // @TODO: lakukan validasi di sini sebelum insert ke model

    $feedback = [
      'name' => $this->input->post('name'),
      'email' => $this->input->post('email'),
      'message' => $this->input->post('message')
    ];

    $feedback_saved = $this->Feedbacks->insert($feedback);

    if ($feedback_saved) {
      return $this->load->view('contact_thanks');
    }
  }

  $this->load->view('contact', $data);
}
}
