<?php

class Book extends CI_Model
{

	private $table = 'books';

	public function get()
	{
		$query = $this->db->get($this->table);
		return $query->result();
	}

	public function find_by_id($slug)
	{
		if (!$slug) {
			return;
		}
		$query = $this->db->get_where($this->table, ['id' => $slug]);
		return $query->row();
	}

	public function find($id)
	{
		if (!$id) {
			return;
		}

		$query = $this->db->get_where($this->table, array('id' => $id));
		return $query->row();
	}

	public function insert($databook)
	{
		return $this->db->insert($this->table, $databook);
	}

	public function update($databook)
	{
		if (!isset($databook['id'])) {
			return;
		}

		return $this->db->update($this->table, $databook, ['id' => $databook['id']]);
	}

	public function delete($id)
	{
		if (!$id) {
			return;
		}

		return $this->db->delete($this->table, ['id' => $id]);
	}

	public function count(){
		return $this->db->count_all($this->table);
	}
}