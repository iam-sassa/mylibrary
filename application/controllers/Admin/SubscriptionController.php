<?php

class SubscriptionController extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Subscription');
		$this->load->model('auth_model');
		if(!$this->auth_model->current_user()){
			redirect('auth/login');
		}
	}
	public function index()
	{
		$data['current_user'] = $this->auth_model->current_user();
		$data['subscriptions'] = $this->Subscription->get();
		$this->load->view('admin/subscription_list.php', $data);
	}

	public function create()
	{
		$data['current_user'] = $this->auth_model->current_user();
		if ($this->input->method() === 'post') {

			$datasubscription = [
				'id' => $id,
				'title' => $this->input->post('title'),
				'month' => $this->input->post('month'),
				'price' => $this->input->post('price'),
				'is_active' => $this->input->post('is_active'),
				'created_at' => $this->input->post('created_at')
			];

			$saved = $this->Subscription->insert($datasubscription);

			if ($saved) {
				$this->session->set_flashdata('message', 'New Subscription was created');
				return redirect('admin/subscription');
			}
		}

		$this->load->view('admin/subscription_create.php', $data);
	}

	public function edit($id = null)
	{
		$data['current_user'] = $this->auth_model->current_user();
		$data['subscriptions'] = $this->Subscription->find($id);

		if (!$data['subscriptions'] || !$id) {
			show_404();
		}

		if ($this->input->method() === 'post') {
			// TODO: lakukan validasi data seblum simpan ke model
			$datasubscription = [
				'id' => $id,
				'title' => $this->input->post('title'),
				'month' => $this->input->post('month'),
				'price' => $this->input->post('price'),
				'is_active' => $this->input->post('is_active'),
				'updated_at' => $this->input->post('updated_at')
				
			];
			$updated = $this->Subscription->update($datasubscription);
			if ($updated) {
				$this->session->set_flashdata('message', 'Subscription data was updated');
				redirect('admin/subscription');
			}
		}

		$this->load->view('admin/subscription_edit.php', $data);
	}

	public function delete($id = null)
	{
		if (!$id) {
			show_404();
		}

		$deleted = $this->Subscription->delete($id);
		if ($deleted) {
			$this->session->set_flashdata('message', 'Subscription data was deleted');
			redirect('admin/subscription');
		}
	}
}