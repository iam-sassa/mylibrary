<?php

class MemberController extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Member');
		$this->load->model('auth_model');
		if(!$this->auth_model->current_user()){
			redirect('auth/login');
		}
	}

	public function index()
	{
		$data['current_user'] = $this->auth_model->current_user();
		$data['members'] = $this->Member->get();
		$this->load->view('admin/member_list.php', $data);
	}

	public function create()
	{
		$data['current_user'] = $this->auth_model->current_user();
		if ($this->input->method() === 'post') {
			// TODO: Lakukan validasi sebelum menyimpan ke model

			$datamember = [
				'id' => $id,
				'nik' => $this->input->post('nik'),
				'full_name' => $this->input->post('full_name'),
				'phone' => $this->input->post('phone'),
				'address' => $this->input->post('address'),
				'born_place' => $this->input->post('born_place'),
				'born_date' => $this->input->post('born_date'),
				'gender' => $this->input->post('gender'),
				'country' => $this->input->post('country'),
				'nationality' => $this->input->post('nationality'),
				'is_active' => $this->input->post('is_active'),
				'created_at' => $this->input->post('created_at')
			];

			$saved = $this->Member->insert($datamember);

			if ($saved) {
				$this->session->set_flashdata('message', 'New Member was created');
				return redirect('admin/member');
			}
		}

		$this->load->view('admin/member_create.php', $data);
	}

	public function edit($id = null)
	{
		$data['current_user'] = $this->auth_model->current_user();
		$data['members'] = $this->Member->find($id);

		if (!$data['members'] || !$id) {
			show_404();
		}

		if ($this->input->method() === 'post') {
			// TODO: lakukan validasi data seblum simpan ke model
			$datamember = [
				'id' => $id,
				'nik' => $this->input->post('nik'),
				'full_name' => $this->input->post('full_name'),
				'phone' => $this->input->post('phone'),
				'address' => $this->input->post('address'),
				'born_place' => $this->input->post('born_place'),
				'born_date' => $this->input->post('born_date'),
				'gender' => $this->input->post('gender'),
				'country' => $this->input->post('country'),
				'nationality' => $this->input->post('nationality'),
				'is_active' => $this->input->post('is_active'),
				'updated_at' => $this->input->post('updated_at')
				
			];
			$updated = $this->Member->update($datamember);
			if ($updated) {
				$this->session->set_flashdata('message', 'Member data was updated');
				redirect('admin/member');
			}
		}

		$this->load->view('admin/member_edit.php', $data);
	}

	public function delete($id = null)
	{
		if (!$id) {
			show_404();
		}

		$deleted = $this->Member->delete($id);
		if ($deleted) {
			$this->session->set_flashdata('message', 'Member data was deleted');
			redirect('admin/member');
		}
	}
}