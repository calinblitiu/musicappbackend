<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Sample_model extends CI_Model
{
	public $table_name = 'samplesets';

	public function addNewSample($data)
	{
		$result = $this->db->insert($this->table_name,$data);
		return $result;
	}

	public function getLastRow()
	{
		$this->db->order_by('id','desc');
		$this->db->limit(1);
		$query = $this->db->get($this->table_name);
		$result = $query->result_array();
		return $result;
	}

	public function getSample($sample_id)
	{
		$this->db->where('id',$sample_id);
		$query =  $this->db->get($this->table_name);
		$result = $query->result_array();
		return $result[0];
	}

	public function getAllSample()
	{
		$this->db->order_by('id','asc');
		$query = $this->db->get($this->table_name);
		$result = $query->result_array();
		return  $result;
	}

	public function addKeyItem($id,$key_no,$item_id)
	{
		$this->db->where('id',$id);
		$this->db->set('key_'.$key_no,$item_id);
		$this->db->update($this->table_name);
	}

}