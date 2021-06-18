<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mcrud extends CI_Model {

	var $tbl_users			= 'tbl_user';
	var $project		 	= 'project';
	var $progress			= 'progress';
	var $progress_bulan		= 'progress_bulan';


	public function get_users()
	{
		$this->db->from($this->tbl_users);
		$query = $this->db->get();

		return $query;
	}

	public function get_edit_user($id){
		$this->db->from($this->tbl_users);
		$this->db->where('id_user',$id);
		$query = $this->db->get();

		return $query;
	}

	// public function get_users_daftar()
	// {
	// 	$this->db->from($this->tbl_users);
	// 	$this->db->where('status','terdaftar');
	// 	$query = $this->db->get();

	// 	return $query;
	// }

	public function get_level_users()
	{
		$this->db->from($this->tbl_users);
		$this->db->where('level', 'user');
		
		$query = $this->db->get();

		return $query;
	}

	public function get_countproject()
	{
		$this->db->from($this->project);
		$query = $this->db->get();

		return $query->num_rows();
	}

	public function get_countprogress()
	{
		$this->db->from($this->progress);
		$query = $this->db->get();

		return $query->num_rows();
	}

	public function get_countprogressbulan()
	{
		$this->db->from($this->progress_bulan);
		$query = $this->db->get();

		return $query->num_rows();
	}

	public function get_users_by_un($id)
	{
		$this->db->from($this->tbl_users);
		$this->db->where('username',$id);
		$query = $this->db->get();

		return $query;
	}

	public function get_level_users_by_id($id)
	{
			$this->db->from($this->tbl_users);
			$this->db->where('tbl_user.level', 'user');
			$this->db->where('tbl_user.id_user', $id);
			$query = $this->db->get();

			return $query->row();
	}

	public function save_user($data)
	{
		$this->db->insert($this->tbl_users, $data);
		return $this->db->insert_id();
	}

	public function update_user($where, $data)
	{
		$this->db->update($this->tbl_users, $data, $where);
		return $this->db->affected_rows();
	}

	public function delete_user_by_id($id)
	{
		$this->db->where('id_user', $id);
		$this->db->delete($this->tbl_users);
	}
	
	public function get_progress()
	{
		$this->db->from($this->progress);
		$query = $this->db->get();

		return $query;
	}

	public function get_edit_progress($id)
	{
		$this->db->from($this->progress);
		$this->db->where('progress_id',$id);
		$query = $this->db->get();

		return $query->row();
	}

	public function save_progress($data)
	{
		$this->db->insert($this->progress, $data);
		return $this->db->insert_id();
	}

	public function update_progress($where, $data)
	{
		$this->db->update($this->progress, $data, $where);
		return $this->db->affected_rows();
	}

	public function delete_progress_by_id($id)
	{
		$this->db->where('progress_id', $id);
		$this->db->delete($this->progress);
	}

	public function save_project($data)
	{
		$this->db->insert($this->project, $data);
		return $this->db->insert_id();
	}

	public function update_project($where, $data)
	{
		$this->db->update($this->project, $data, $where);
		return $this->db->affected_rows();
	}

	public function delete_project_by_id($id)
	{
		$this->db->where('project_id', $id);
		$this->db->delete($this->project);
	}

	public function get_progress_bulan()
	{
		$this->db->from($this->progress_bulan);
		$query = $this->db->get();

		return $query;
	}
	
	public function save_progress_bulan($data)
	{
		$this->db->insert($this->progress_bulan, $data);
		return $this->db->insert_id();
	}

	public function update_progress_bulan($where, $data)
	{
		$this->db->update($this->progress_bulan, $data, $where);
		return $this->db->affected_rows();
	}

	public function delete_progress_bulan_by_id($id)
	{
		$this->db->where('progress_bulan_id', $id);
		$this->db->delete($this->progress_bulan);
	}

}
