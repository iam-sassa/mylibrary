<?php

class Feedbacks extends CI_Model
{
	private $table = "feedback";

	public function insert($feedback)
	{
		if(!$feedback){
			return;
		}

		return $this->db->insert($this->table, $feedback);
	}

    public function get()
	{
		$query = $this->db->get($this->table);
		return $query->result();
	}

	public function delete($id)
	{
		if(!$id){
			return;
		}

		$this->db->delete($this->table, ['id' => $id]);
	}

    public function count(){
        return $this->db->count_all($this->table);
    }
}