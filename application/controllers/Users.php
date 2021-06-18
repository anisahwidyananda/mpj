<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

	public function index()
	{
		$ceks = $this->session->userdata('login_session');
		$id_user = $this->session->userdata('id_user');
		if(!isset($ceks)) {
			redirect('web/login');
		}else{
			$data['user']  = $this->Mcrud->get_users_by_un($ceks);
			$data['users']  = $this->Mcrud->get_users();
			$data['jml_proyek']   = $this->db->get('project')->num_rows();
			$data['jml_progress'] = $this->Mcrud->get_countprogress();
			$data['jml_progressbulan'] = $this->Mcrud->get_countprogressbulan();


			if ($data['user']->row()->level == "admin") {
					$this->load->view('404_content');
			}else{

					$this->load->view('users/header', $data);
					$this->load->view('users/beranda', $data);
					$this->load->view('users/footer');
				}
			}
	}

	public function profile()
	{
		$ceks = $this->session->userdata('login_session');
		if(!isset($ceks)) {
			redirect('web/login');
		}else{
			$data['user']  		  = $this->Mcrud->get_users_by_un($ceks);
			$data['level_users']  = $this->Mcrud->get_level_users();
			$data['jml_proyek']   = $this->Mcrud->get_countproject();
			$data['jml_progress'] = $this->Mcrud->get_countprogress();
			$data['jml_progressbulan'] = $this->Mcrud->get_countprogressbulan();
			$data['users']  	  = $this->Mcrud->get_users();

			if ($data['user']->row()->level == "user") {
					$this->load->view('users/header', $data);
					$this->load->view('users/profile', $data);
					$this->load->view('users/footer');

					if (isset($_POST['btnupdate'])) {
						$password 	= htmlentities(strip_tags($this->input->post('password')));

									$data = array(
										'password'	=> md5($password)
									);
									$this->Mcrud->update_user(array('username' => $ceks), $data);

									$this->session->set_flashdata('msg',
										'
										<div class="alert alert-success alert-dismissible" role="alert">
											 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
												 <span aria-hidden="true">&times;&nbsp; &nbsp;</span>
											 </button>
											 <strong>Sukses!</strong> Berhasil disimpan.
										</div>'
									);
									redirect('users/profile');
					}
			}else{
					$this->load->view('404_content');
			}

		}
	}

	public function t_ip_user($aksi='',$id='')
	{
		$ceks = $this->session->userdata('login_session');
		if(!isset($ceks)) {
			redirect('web/login');
		}else{
				$data['user']  			  = $this->Mcrud->get_users_by_un($ceks);
				$data['level_users']  	  = $this->Mcrud->get_level_users();
				$this->db->order_by('project_id', 'ASC');
				$data['project']  			= $this->db->get('project')->result();
				$data['users']  	  = $this->Mcrud->get_users();

				if ($data['user']->row()->level == "user") {

							$this->load->view('users/header', $data);
							$this->load->view('users/tabel_proyek', $data);
							$this->load->view('users/footer');

							}
				else{
						$this->load->view('404_content');
				}
			}
		
	}
	

	
	public function tabel_jk_user($id='')
{
		$ceks = $this->session->userdata('login_session');
		if(!isset($ceks)) {
			redirect('web/login');
		}else{
			$data['user']  			  = $this->Mcrud->get_users_by_un($ceks);
			$data['level_users']  	  = $this->Mcrud->get_level_users();
			$data['progress_bulan']	  = $this->db->get('progress_bulan')->result();
			$data['progress']	  	  = $this->db->get('progress')->result();
			
			if ($data['user']->row()->level == "user") {
						if ($id == "") {

							$this->db->order_by('project_nama', 'ASC');
							$data['project']	  = $this->db->get('project')->result();

							$this->load->view('users/header', $data);
							$this->load->view('users/tabel_jk_user', $data);
							$this->load->view('users/footer');
					}else{

							$this->db->select("*");
							$this->db->from("progress");
							$this->db->join('progress_bulan', 'progress.progress_bulan_id=progress_bulan.progress_bulan_id');
							$this->db->join('project', 'progress_bulan.project_id=project.project_id');
							$this->db->where('project.project_id', $id);
							$this->db->order_by('progress_id', 'ASC');

							$data['progress']	= $this->db->get()->result();	
							$data['project_id'] = $id;
								

							$this->load->view('users/header', $data);
							$this->load->view('users/tabel_jk_dtl', $data);
							$this->load->view('users/footer');
				}

			}else{
					$this->load->view('404_content');
			}

		}
	}


	public function tabel_bln_user($id='')
	{
		$ceks = $this->session->userdata('login_session');
		if(!isset($ceks)) {
			redirect('web/login');
		}else{
			$data['user']  			  = $this->Mcrud->get_users_by_un($ceks);
			$data['level_users']  	  = $this->Mcrud->get_level_users();
			$data['progress_bulan']	  = $this->db->get('progress_bulan')->result();
			
			if ($data['user']->row()->level == "user") {
						if ($id == "") {

							$this->db->order_by('project_nama', 'ASC');
							$data['project']	  = $this->db->get('project')->result();

							$this->load->view('users/header', $data);
							$this->load->view('users/tabel_bln_user', $data);
							$this->load->view('users/footer');
					}else{
							$this->db->select("*");
							$this->db->from("progress_bulan");
							$this->db->join('project', 'progress_bulan.project_id=project.project_id');
							$this->db->where('project.project_id', $id);
							$this->db->order_by('progress_bulan_id', 'ASC');

							$data['progress_bulan']	= $this->db->get()->result();	
							$data['project_id'] = $id;

							$this->load->view('users/header', $data);
							$this->load->view('users/tabel_bln_dtl', $data);
							$this->load->view('users/footer');
				}

			}else{
					$this->load->view('404_content');
			}

		}
	}

	public function grafik($id='')
	{
		$ceks = $this->session->userdata('login_session');
		if(!isset($ceks)) {
			redirect('web/login');
		}else{

			$data['user']  			    = $this->Mcrud->get_users_by_un($ceks);
			$data['level_users']  	    = $this->Mcrud->get_level_users();
			$data['users']  		    = $this->Mcrud->get_users();
			$data['project']     		= $this->db->get('project');
			$data['get_progress_bulan'] = $this->Mcrud->get_progress_bulan();

			if ($data['user']->row()->level == "user") {

					if (isset($_POST['btncek'])) {

						$projek = htmlentities(strip_tags($this->input->post('project')));
						$bulan = htmlentities(strip_tags($this->input->post('bulan')));
						$tahun = htmlentities(strip_tags($this->input->post('tahun')));

						$this->db->select("*");
						$this->db->from("project");
						$this->db->join('progress_bulan', 'progress_bulan.project_id=project.project_id AND YEAR(progress_bulan.progress_bulan_bulan) = '.$tahun);
						$this->db->where('project.project_id', $projek);
						$this->db->order_by('progress_bulan_id', 'ASC');
						$data['data']	= $this->db->get()->result();
					}

					$this->load->view('users/header', $data);
					$this->load->view('users/grafik', $data);
					$this->load->view('users/footer');

			}else{
					$this->load->view('404_content');
			}

		}
	} 

	public function grafik_mgg($id='')
	{
		$ceks = $this->session->userdata('login_session');
		if(!isset($ceks)) {
			redirect('web/login');
		}else{

			$data['user']  			    = $this->Mcrud->get_users_by_un($ceks);
			$data['level_users']  	    = $this->Mcrud->get_level_users();
			$data['users']  		    = $this->Mcrud->get_users();
			$data['project']     		= $this->db->get('project');
			$data['get_progress']		= $this->Mcrud->get_progress();

			if ($data['user']->row()->level == "user") {

					if (isset($_POST['btncek'])) {

						$projek = htmlentities(strip_tags($this->input->post('project')));
						$minggu = htmlentities(strip_tags($this->input->post('minggu')));
						$tahun = htmlentities(strip_tags($this->input->post('tahun')));

						$this->db->select("*");
						$this->db->from("project");
						$this->db->join('progress_bulan', 'progress_bulan.project_id=project.project_id AND YEAR(progress_bulan.progress_bulan_bulan) = '.$tahun);
						$this->db->join('progress', 'progress.progress_bulan_id=progress_bulan.progress_bulan_id');
						$this->db->where('project.project_id', $projek);
						$this->db->order_by('progress_id', 'ASC');
						$data['data']	= $this->db->get()->result();
					}

					$this->load->view('users/header', $data);
					$this->load->view('users/grafik_mgg', $data);
					$this->load->view('users/footer');

			}else{
					$this->load->view('404_content');
			}

		}
	} 

}
