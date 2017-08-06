<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Devicetoken_model extends CI_Model
{
	public $table_name = 'devicetoken';

	public function addToken($token)
	{
		$this->db->set('token',$token);
		$this->db->insert($this->table_name);
	}

	public function is_registered($token)
	{
		$this->db->where('token',$token);
		$query = $this->db->get($this->table_name);
		$result = $query->result_array();

		if (count($result)>0) {
			return true;
		}
		return false;
	}

	public function getTokens()
	{
		$query = $this->db->get($this->table_name);
		$result = $query->result_array();
		return $result;
	}
}