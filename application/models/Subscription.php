<?php

class Subscription extends CI_Model
{

	private $table = 'subscriptions';

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

	public function insert($datasubscription)
	{
		return $this->db->insert($this->table, $datasubscription);
	}

	public function update($datasubscription)
	{
		if (!isset($datasubscription['id'])) {
			return;
		}

		return $this->db->update($this->table, $datasubscription, ['id' => $datasubscription['id']]);
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