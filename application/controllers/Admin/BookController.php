<?php

class BookController extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Book');
		$this->load->model('auth_model');
		if(!$this->auth_model->current_user()){
			redirect('auth/login');
		}
	}

	public function index()
	{
		$data['current_user'] = $this->auth_model->current_user();
		$data['books'] = $this->Book->get();
		$this->load->view('admin/book_list.php', $data);
	}

	public function create()
	{
		$data['current_user'] = $this->auth_model->current_user();
		if ($this->input->method() === 'post') {
			$dataBook = [
				'id' => $id,
				'isbn' => $this->input->post('isbn'),
				'title' => $this->input->post('title'),
				'synopsis' => $this->input->post('synopsis'),
				'author' => $this->input->post('author'),
				'publisher' => $this->input->post('publisher'),
				'category' => $this->input->post('category'),
				'language' => $this->input->post('language'),
				'created_at' => $this->input->post('created_at')
			];

			$saved = $this->Book->insert($dataBook);

			if ($saved) {
				$this->session->set_flashdata('message', 'New Book was created');
				return redirect('admin/book');
			}
		}

		$this->load->view('admin/book_create.php', $data);
	}

	public function edit($id = null)
	{
		$data['current_user'] = $this->auth_model->current_user();
		$data['books'] = $this->Book->find($id);

		if (!$data['books'] || !$id) {
			show_404();
		}

		if ($this->input->method() === 'post') {
			// TODO: lakukan validasi data seblum simpan ke model
			$databook = [
				'id' => $id,
				'isbn' => $this->input->post('isbn'),
				'title' => $this->input->post('title'),
				'synopsis' => $this->input->post('synopsis'),
				'author' => $this->input->post('author'),
				'publisher' => $this->input->post('publisher'),
				'category' => $this->input->post('category'),
				'language' => $this->input->post('language'),
				'updated_at' => $this->input->post('updated_at')
				
			];
			$updated = $this->Book->update($databook);
			if ($updated) {
				$this->session->set_flashdata('message', 'Book data was updated');
				redirect('admin/book');
			}
		}

		$this->load->view('admin/book_edit.php', $data);
	}

	public function delete($id = null)
	{
		if (!$id) {
			show_404();
		}

		$deleted = $this->Book->delete($id);
		if ($deleted) {
			$this->session->set_flashdata('message', 'Book data was deleted');
			redirect('admin/book');
		}
	}
}