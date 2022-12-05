<?php

class Member extends CI_Model
{

	private $table = 'members';

	public function get()
	{
		$query = $this->db->get($this->table);
		return $query->result();
	}

	public function get_active($limit = null, $offset = null)
	{
		if (!$limit && $offset) {
			$query = $this->db
				->get_where($this->table, ['is_active' => 1]);
		} else {
			$query =  $this->db
				->get_where($this->table, ['is_active' => 0], $limit, $offset);
		}
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

	public function insert($datamember)
	{
		return $this->db->insert($this->table, $datamember);
	}

	public function update($datamember)
	{
		if (!isset($datamember['id'])) {
			return;
		}

		return $this->db->update($this->table, $datamember, ['id' => $datamember['id']]);
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