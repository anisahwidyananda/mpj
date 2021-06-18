<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function index()
	{
		$ceks = $this->session->userdata('login_session');
		if(!isset($ceks)) {
			redirect('web/login');
		}else{
			$data['user']  		  = $this->Mcrud->get_users_by_un($ceks);
			$data['level_users']  = $this->Mcrud->get_level_users();
			$data['jml_proyek']   = $this->db->get('project')->num_rows();
			$data['jml_progress'] = $this->Mcrud->get_countprogress();
			// $data['users']  	  = $this->Mcrud->get_users_daftar();
			$data['proyek']	      = $this->db->get('project');

			if ($data['user']->row()->level == "admin") {
					$this->load->view('admin/header', $data);
					$this->load->view('admin/beranda', $data);
					$this->load->view('admin/footer');
			}else{
					$this->load->view('404_content');
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
			$data['jml_proyek']   = $this->db->get('project');
			$data['jml_progress'] = $this->Mcrud->get_countprogress();
			$data['users']  	  = $this->Mcrud->get_users_daftar();

			if ($data['user']->row()->level == "admin") {
					$this->load->view('admin/header', $data);
					$this->load->view('admin/profile', $data);
					$this->load->view('admin/footer');

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
									redirect('admin/profile');
					}
			}else{
					$this->load->view('404_content');
			}

		}
	}


	public function lihat_users($aksi='', $id='')
	{
		$ceks = $this->session->userdata('login_session');
		if(!isset($ceks)) {
			redirect('web/login');
		}else{
			$data['user']  		  = $this->Mcrud->get_users_by_un($ceks);
			$data['level_users']  = $this->Mcrud->get_level_users();

			if ($data['user']->row()->level == "admin") {

					if ($aksi == "t") {
						$this->db->order_by('nama','ASC');
						$data['user']  = $this->Mcrud->get_users($id);
						$this->load->view('admin/header', $data);
						$this->load->view('admin/tambah_users', $data);
						$this->load->view('admin/footer');

						if (isset($_POST['btnsimpan'])) {
							$nama 	  = htmlentities(strip_tags($this->input->post('nama')));
							$username = htmlentities(strip_tags($this->input->post('username')));
							$email 	  = htmlentities(strip_tags($this->input->post('email')));

							if ($this->db->get_where('tbl_user', array('username' => $username))->num_rows() != 0) {
								$this->session->set_flashdata('msg',
									'
									<div class="alert alert-warning alert-dismissible" role="alert">
										 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
											 <span aria-hidden="true">&times;&nbsp;</span>
										 </button>
										 <strong>Gagal!</strong> Username "'.$username.' sudah ada".
									</div>'
								);
								redirect('admin/lihat_users/t');
							}else{
								$data = array(
									'nama'				=> $nama,
									'username'			=> $username,
									'password'			=> md5($username),
									'email'				=> $email,
									'level' 			=> 'user'
								);
								$this->Mcrud->save_user($data);
								$this->session->set_flashdata('msg',
									'
									<div class="alert alert-success alert-dismissible" role="alert">
										 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
											 <span aria-hidden="true">&times;&nbsp;</span>
										 </button>
										 <strong>Sukses!</strong> User berhasil ditambah.
									</div>'
								);
								redirect('admin/lihat_users');
							}
						}
							

					}elseif ($aksi == "p") {
							$data['p_user']  = $this->Mcrud->get_edit_user($id)->row();

							$this->load->view('admin/header', $data);
							$this->load->view('admin/detail_users', $data);
							$this->load->view('admin/footer');
					}elseif ($aksi == "e") {
							$data['e_user']  = $this->Mcrud->get_edit_user($id)->row();

							$data['user']  = $this->Mcrud->get_users();
							$this->load->view('admin/header', $data);
							$this->load->view('admin/edit_users', $data);
							$this->load->view('admin/footer');

							if (isset($_POST['btnupdate'])) {
								$nama 	  = htmlentities(strip_tags($this->input->post('nama')));
								$username = htmlentities(strip_tags($this->input->post('username')));
								$email 	  = htmlentities(strip_tags($this->input->post('email')));
								$password = htmlentities(strip_tags($this->input->post('password')));

								date_default_timezone_set('Asia/Jakarta');
								$tgl_masuk = date('Y-m-d H:m:s');

								if ($password == '') {
									$cek_data_user = $this->db->get_where('tbl_user', array('id_user' => $id));
								   	$pass = $cek_data_user->row()->password;
								}else{
									$pass = md5($password);
								}

								$data = array(
										'nama'	    => $nama,
										'email' 	=> $email,
										'username'	=> $username,
										'password'  => $pass
										);
								$this->Mcrud->update_user(array('id_user' => $id), $data);
								$this->session->set_flashdata('msg',
									'
									<div class="alert alert-success alert-dismissible" role="alert">
										 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
											 <span aria-hidden="true">&times;&nbsp;</span>
										 </button>
										 <strong>Sukses!</strong> User berhasil diupdate.
									</div>'
								);
								redirect('admin/lihat_users');

							}
										

					}elseif ($aksi == "h") {

							$h_user = $this->db->get_where("tbl_user", "id_user='$id'");
							$this->Mcrud->delete_user_by_id($id);
							$this->session->set_flashdata('msg',
								'
								<div class="alert alert-success alert-dismissible" role="alert">
									 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
										 <span aria-hidden="true">&times;&nbsp;</span>
									 </button>
									 <strong>Sukses!</strong> User berhasil dihapus.
								</div>'
							);
							redirect('admin/lihat_users');

					}else{
							$this->load->view('admin/header', $data);
							$this->load->view('admin/lihat_users', $data);
							$this->load->view('admin/footer');
					}

			}else{
					$this->load->view('404_content');
			}

		}
	}


	public function ip()
	{
		$ceks = $this->session->userdata('login_session');
		if(!isset($ceks)) {
			redirect('web/login');
		}else{
				$data['user']  			 = $this->Mcrud->get_users_by_un($ceks);

				if ($data['user']->row()->level == "admin") {

							$this->load->view('admin/header', $data);
							$this->load->view('admin/proyek', $data);
							$this->load->view('admin/footer');

									if (isset($_POST['btnsimpan'])) {
											$name = $_POST['project_nama'];

											$result = array();
											foreach($name AS $key => $val){
												$result[] = array(
													"project_nama"   => $_POST['project_nama'][$key],
													"project_nilai"  => $_POST['project_nilai'][$key],
													"project_dp" 	 => $_POST['project_dp'][$key],
													"project_status" => $_POST['project_status'][$key]
												);
											}

											$simpan = $this->db->insert_batch('project', $result); 

											if ($simpan){
													$this->session->set_flashdata('msg',
														'
														<div class="alert alert-success alert-dismissible" role="alert">
															 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
																 <span aria-hidden="true">&times;&nbsp;</span>
															 </button>
															 <strong>Sukses!</strong> Proyek berhasil disimpan.
														</div>'
													);
													redirect('admin/t_ip');
											}else{
													$this->session->set_flashdata('msg',
														'
														<div class="alert alert-warning alert-dismissible" role="alert">
															 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
																 <span aria-hidden="true">&times;&nbsp;</span>
															 </button>
															 <strong>Gagal</strong> di simpan.
														</div>'
													);
													redirect('admin/ip');
											}

									}
				}else{
						$this->load->view('404_content');
				}
		}
	}

	public function t_ip($aksi='',$id='')
	{
		$ceks = $this->session->userdata('login_session');
		if(!isset($ceks)) {
			redirect('web/login');
		}else{
				$data['user']  			  = $this->Mcrud->get_users_by_un($ceks);
				$this->db->order_by('project_id', 'ASC');
				$data['project']  			= $this->db->get('project')->result();

				if ($data['user']->row()->level == "admin") {
	
						if ($aksi == "ep") {
							$data['ep']  = $this->db->get_where('project', array('project_id' => $id));

							if ($data['ep']->num_rows() == 0) {
									$this->session->set_flashdata('msg',
										'
										<div class="alert alert-warning alert-dismissible" role="alert">
											 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
												 <span aria-hidden="true">&times;&nbsp;</span>
											 </button>
											 <strong>Gagal</strong> Proyek tidak ada.
										</div>'
									);
									redirect('admin/t_ip');
							}

							$this->load->view('admin/header', $data);
							$this->load->view('admin/edit_perproyek', $data);
							$this->load->view('admin/footer');

							if (isset($_POST['btnupdate'])) {
										$updateData = array(
										'project_nama'	 => $this->input->post('project_nama'),
										'project_nilai'	 => $this->input->post('project_nilai'),
										'project_dp'	 => $this->input->post('project_dp'),
										'project_status' => $this->input->post('project_status')
												);
												$this->db->update('project', $updateData, array('project_id' => $id));

													$this->session->set_flashdata('msg',
														'
														<div class="alert alert-success alert-dismissible" role="alert">
															 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
																 <span aria-hidden="true">&times;&nbsp;</span>
															 </button>
															 <strong>Sukses!</strong> Proyek berhasil diupdate.
														</div>'
													);

											redirect('admin/t_ip');
							}
						}elseif ($aksi == "h") {

								$this->db->delete('project', array('project_id' => $id));
								$this->session->set_flashdata('msg',
									'
									<div class="alert alert-success alert-dismissible" role="alert">
										 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
											 <span aria-hidden="true">&times;&nbsp;</span>
										 </button>
										 <strong>Sukses!</strong> Proyek berhasil dihapus.
									</div>'
								);
								redirect('admin/t_ip');

						}else{
							$this->load->view('admin/header', $data);
							$this->load->view('admin/tabel_proyek', $data);
							$this->load->view('admin/footer');

						}
				}else{
						$this->load->view('404_content');
				}
		}
	}

	

	public function tabel_jk($id='')
	{
		$ceks = $this->session->userdata('login_session');
		if(!isset($ceks)) {
			redirect('web/login');
		}else{
			$data['user']  			  = $this->Mcrud->get_users_by_un($ceks);
			$data['level_users']  	  = $this->Mcrud->get_level_users();
			$data['progress_bulan']	  = $this->db->get('progress_bulan')->result();
			$data['progress']	  	  = $this->db->get('progress')->result();
			
			if ($data['user']->row()->level == "admin") {
						if ($id == "") {

							$this->db->order_by('project_nama', 'ASC');
							$data['project']	  = $this->db->get('project')->result();

							$this->load->view('admin/header', $data);
							$this->load->view('admin/tabel_jk', $data);
							$this->load->view('admin/footer');
					}else{
							// $this->db->order_by('project_nama', 'ASC');
							// $data['project']	  = $this->db->get('project')->result();
							
							$this->db->select("*");
							$this->db->from("progress");
							$this->db->join('progress_bulan', 'progress.progress_bulan_id=progress_bulan.progress_bulan_id');
							$this->db->join('project', 'progress_bulan.project_id=project.project_id');
							$this->db->where('project.project_id', $id);
							$this->db->order_by('progress_id', 'ASC');

							$data['progress']	= $this->db->get()->result();	
							$data['project_id'] = $id;

							// echo json_encode($data['progress']);die();

							// $data['project']	 		= $this->db->get('project');
							// $data['progress_bulan']	 	= $this->db->get('progress_bulan');

							// $data['progress_bulan']	= $progress_bulan_id;
								

							$this->load->view('admin/header', $data);
							$this->load->view('admin/tabel_jk_detail', $data);
							$this->load->view('admin/footer');
				}

			}else{
					$this->load->view('404_content');
			}

		}
	}

	public function tambah_progress($id='')
	{
		$ceks = $this->session->userdata('login_session');
		if(!isset($ceks)) {
			redirect('web/login');
		}else{
				$data['user']  		  = $this->Mcrud->get_users_by_un($ceks);
				$data['progress']	  = $this->db->get('progress')->result();
				$data['project_id']	  = $id;

				if ($data['user']->row()->level == "admin") {

							$this->load->view('admin/header', $data);
							$this->load->view('admin/tambah_progress', $data);
							$this->load->view('admin/footer');

									if (isset($_POST['btnsimpan'])) {
											$name = $_POST['progress_nama'];
											$month = DATE("n", strtotime($_POST['progress_tanggal_mulai']));
											$year = DATE("Y", strtotime($_POST['progress_tanggal_mulai']));

											$this->db->where(array(
												"MONTH(progress_bulan_bulan)"=>$month,
												"YEAR(progress_bulan_bulan)"=>$year
											));
											$query = $this->db->get("progress_bulan");
											$result_bulan = $query->row();
											$check_bulan = $query->num_rows();

											if ($check_bulan<=0) {
												$data_bulan = array(
													"project_id"			=> $_POST['project_id'],
													"progress_bulan_bulan"	=> $_POST['progress_tanggal_mulai'],
													"progress_bulan_plan"	=> $_POST['progress_plan'],
													"progress_bulan_actual"	=> $_POST['progress_actual']
												);
												$this->db->insert('progress_bulan', $data_bulan);
												$bulan_id = $this->db->insert_id();
											}else{
												$bulan_id = $result_bulan->progress_bulan_id;
											}

											$data = array(
												"progress_bulan_id" 	 => $bulan_id,
												"progress_nama"  		 => $_POST['progress_nama'],
												"progress_tanggal_mulai" => $_POST['progress_tanggal_mulai'],
												"progress_tanggal_akhir" => $_POST['progress_tanggal_akhir'],
												"progress_plan"   		 => $_POST['progress_plan'],
												"progress_actual"   	 => $_POST['progress_actual'],
												"progress_status" 		 => $_POST['progress_status']
											);

											$simpan = $this->db->insert('progress', $data);

											if ($simpan){
												if ($check_bulan>0) {
													$this->db->where(array(
														"progress_bulan_id"=>$bulan_id
													));
													$result_progress = $this->db->get("progress")->result();
													$data_actual = 0;
													$data_plan = 0;
													foreach ($result_progress as $key => $value) {
														$data_actual = $data_actual + $value->progress_actual;
														$data_plan = $data_plan + $value->progress_plan;
													}

													$data_bulan_update = array(
														"progress_bulan_plan"	=> $data_plan,
														"progress_bulan_actual" => $data_actual
													);
													$this->db->where(array("progress_bulan_id"=>$bulan_id));
													$this->db->update("progress_bulan", $data_bulan_update);
												}

												$this->session->set_flashdata('msg',
													'
													<div class="alert alert-success alert-dismissible" role="alert">
														 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
															 <span aria-hidden="true">&times;&nbsp;</span>
														 </button>
														 <strong>Sukses!</strong> Progress berhasil disimpan.
													</div>'
												);
												redirect('admin/tabel_jk/'.$_POST['project_id']);
											}else{
												$this->session->set_flashdata('msg',
													'
													<div class="alert alert-warning alert-dismissible" role="alert">
														 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
															 <span aria-hidden="true">&times;&nbsp;</span>
														 </button>
														 <strong>Gagal</strong> di simpan.
													</div>'
												);
												redirect('admin/tambah_progress/'.$_POST['project_id']);
											}

									}
				}else{
						$this->load->view('404_content');
				}
		}
	}
 

	public function tabel_jk_detail($aksi='',$id='')
	{
		$ceks = $this->session->userdata('login_session');
		if(!isset($ceks)) {
			redirect('web/login');
		}else{
				$data['user']  			  = $this->Mcrud->get_users_by_un($ceks);
				$this->db->order_by('progress_id', 'ASC');
				$data['progress']  			= $this->db->get('progress')->result();

				if ($data['user']->row()->level == "admin") {
	
						if ($aksi == "ep") {
							$this->db->select("project_id");
							$this->db->from("progress");
							$this->db->join('progress_bulan', 'progress.progress_bulan_id=progress_bulan.progress_bulan_id');
							$this->db->where('progress_id', $id);
							$data['project_id']	= $this->db->get()->row()->project_id;	

							$data['ep']  = $this->db->get_where('progress', array('progress_id' => $id));

							if ($data['ep']->num_rows() == 0) {
									$this->session->set_flashdata('msg',
										'
										<div class="alert alert-warning alert-dismissible" role="alert">
											 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
												 <span aria-hidden="true">&times;&nbsp;</span>
											 </button>
											 <strong>Gagal</strong> Progress tidak ada.
										</div>'
									);
									redirect('admin/tabel_jk/'.$data['project_id']);
							}

							$this->load->view('admin/header', $data);
							$this->load->view('admin/edit_progress', $data);
							$this->load->view('admin/footer');

							if (isset($_POST['btnupdate'])) {

								$progress_id = $this->input->post('progress_id');
								$progress_bulan_id = $this->input->post('progress_bulan_id');
								$project_id = $this->input->post('project_id');
								$updateData = array(
									'progress_nama'	 			 => $this->input->post('progress_nama'),
									'progress_tanggal_mulai'	 => $this->input->post('progress_tanggal_mulai'),
									'progress_tanggal_akhir'	 => $this->input->post('progress_tanggal_akhir'),
									'progress_plan' 			 => $this->input->post('progress_plan'),
									'progress_actual' 			 => $this->input->post('progress_actual'),
									'progress_status' 			 => $this->input->post('progress_status')
								 );
								$this->db->update('progress', $updateData, array('progress_id' => $progress_id));

								$this->db->where(array(
									"progress_bulan_id"=>$progress_bulan_id
								));
								$result_progress = $this->db->get("progress")->result();
								$data_actual = 0;
								$data_plan = 0;
								foreach ($result_progress as $key => $value) {
									$data_actual = $data_actual + $value->progress_actual;
									$data_plan = $data_plan + $value->progress_plan;
								}

								$data_bulan_update = array(
									"progress_bulan_plan"	=> $data_plan,
									"progress_bulan_actual" => $data_actual
								);
								$this->db->where(array("progress_bulan_id"=>$progress_bulan_id));
								$this->db->update("progress_bulan", $data_bulan_update);

								$this->session->set_flashdata('msg',
									'
									<div class="alert alert-success alert-dismissible" role="alert">
										 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
											 <span aria-hidden="true">&times;&nbsp;</span>
										 </button>
										 <strong>Sukses!</strong> Progress berhasil diupdate.
									</div>'
								);

								redirect('admin/tabel_jk/'.$project_id);
							}
						}elseif ($aksi == "h") {

								# Get Project Id
								$this->db->select("project_id, progress.progress_bulan_id");
								$this->db->from("progress");
								$this->db->join('progress_bulan', 'progress.progress_bulan_id=progress_bulan.progress_bulan_id');
								$this->db->where('progress_id', $id);
								$query	= $this->db->get()->row();
								$progress_bulan_id = $query->progress_bulan_id;
								$project_id = $query->project_id;

								# Delete Data
								$this->db->delete('progress', array('progress_id' => $id));

								# Update Progress Bulan
								$this->db->where(array(
									"progress_bulan_id"=>$progress_bulan_id
								));
								$result_progress = $this->db->get("progress")->result();
								$data_actual = 0;
								$data_plan = 0;
								foreach ($result_progress as $key => $value) {
									$data_actual = $data_actual + $value->progress_actual;
									$data_plan = $data_plan + $value->progress_plan;
								}

								$data_bulan_update = array(
									"progress_bulan_plan"	=> $data_plan,
									"progress_bulan_actual" => $data_actual
								);
								$this->db->where(array("progress_bulan_id"=>$progress_bulan_id));
								$this->db->update("progress_bulan", $data_bulan_update);

								$this->session->set_flashdata('msg',
									'
									<div class="alert alert-success alert-dismissible" role="alert">
										 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
											 <span aria-hidden="true">&times;&nbsp;</span>
										 </button>
										 <strong>Sukses!</strong> Progress berhasil dihapus.
									</div>'
								);
								redirect('admin/tabel_jk/'.$project_id);

						}else{
							$this->load->view('admin/header', $data);
							$this->load->view('admin/tabel_jk_detail', $data);
							$this->load->view('admin/footer');

						}
				}else{
						$this->load->view('404_content');
				}
		}
	} 

	public function tabel_bln($id='')
	{
		$ceks = $this->session->userdata('login_session');
		if(!isset($ceks)) {
			redirect('web/login');
		}else{
			$data['user']  			  = $this->Mcrud->get_users_by_un($ceks);
			$data['level_users']  	  = $this->Mcrud->get_level_users();
			$data['progress_bulan']	  = $this->db->get('progress_bulan')->result();
			
			if ($data['user']->row()->level == "admin") {
						if ($id == "") {

							$this->db->order_by('project_nama', 'ASC');
							$data['project']	  = $this->db->get('project')->result();

							$this->load->view('admin/header', $data);
							$this->load->view('admin/tabel_bln', $data);
							$this->load->view('admin/footer');
					}else{
							$this->db->select("*");
							$this->db->from("progress_bulan");
							$this->db->join('project', 'progress_bulan.project_id=project.project_id');
							$this->db->where('project.project_id', $id);
							$this->db->order_by('progress_bulan_id', 'ASC');

							$data['progress_bulan']	= $this->db->get()->result();	
							$data['project_id'] = $id;

							$this->load->view('admin/header', $data);
							$this->load->view('admin/tabel_bln_detail', $data);
							$this->load->view('admin/footer');
				}

			}else{
					$this->load->view('404_content');
			}

		}
	}

	public function tabel_bln_detail($aksi='',$id='')
	{
		$ceks = $this->session->userdata('login_session');
		if(!isset($ceks)) {
			redirect('web/login');
		}else{
				$data['user']  			  = $this->Mcrud->get_users_by_un($ceks);
				$this->db->order_by('progress_bulan_id', 'ASC');
				$data['progress_bulan']   = $this->db->get('progress_bulan')->result();

				if ($data['user']->row()->level == "admin") {
	
						if ($aksi == "ep") {
											
							// $data['project_id']	= $this->db->get()->row()->project_id;	
													
							$data['ep']  = $this->db->get_where('progress_bulan', array('progress_bulan_id' => $id));

							if ($data['ep']->num_rows() == 0) {
									$this->session->set_flashdata('msg',
										'
										<div class="alert alert-warning alert-dismissible" role="alert">
											 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
												 <span aria-hidden="true">&times;&nbsp;</span>
											 </button>
											 <strong>Gagal</strong> Progress tidak ada.
										</div>'
									);
									redirect('admin/tabel_bln/'.$data['project_id']);
							}

							$this->load->view('admin/header', $data);
							$this->load->view('admin/edit_progress_bln', $data);
							$this->load->view('admin/footer');

							if (isset($_POST['btnupdate'])) {

								$progress_bulan_id = $this->input->post('progress_bulan_id');
								$project_id = $this->input->post('project_id');
								$updateData = array(
									'progress_bulan_bulan'	 	 => $this->input->post('progress_bulan_bulan'),
									'progress_bulan_plan' 		 => $this->input->post('progress_bulan_plan'),
									'progress_bulan_actual' 	 => $this->input->post('progress_bulan_actual'),
									'progress_bulan_pembayaran'  => $this->input->post('progress_bulan_pembayaran'),
									'progress_bulan_status' 	 => $this->input->post('progress_bulan_status')
								 );
								$this->db->update('progress_bulan', $updateData, array('progress_bulan_id' => $progress_bulan_id));

														
								$this->session->set_flashdata('msg',
									'
									<div class="alert alert-success alert-dismissible" role="alert">
										 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
											 <span aria-hidden="true">&times;&nbsp;</span>
										 </button>
										 <strong>Sukses!</strong> Progress berhasil diupdate.
									</div>'
								);

								redirect('admin/tabel_bln/'.$project_id);
							}
						}elseif ($aksi == "h") {
								
								$this->db->delete('progress', array('progress_bulan_id' => $id));
								$this->db->delete('progress_bulan', array('progress_bulan_id' => $id));
								// $this->db->where(array("progress_bulan_id"=>$progress_bulan_id));
								
								$this->session->set_flashdata('msg',
									'
									<div class="alert alert-success alert-dismissible" role="alert">
										 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
											 <span aria-hidden="true">&times;&nbsp;</span>
										 </button>
										 <strong>Sukses!</strong> Progress berhasil dihapus.
									</div>'
								);
								redirect('admin/tabel_bln/'.$project_id);

						}else{
							$this->load->view('admin/header', $data);
							$this->load->view('admin/tabel_bln_detail', $data);
							$this->load->view('admin/footer');

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

			if ($data['user']->row()->level == "admin") {

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

					$this->load->view('admin/header', $data);
					$this->load->view('admin/grafik', $data);
					$this->load->view('admin/footer');

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

			if ($data['user']->row()->level == "admin") {

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

					$this->load->view('admin/header', $data);
					$this->load->view('admin/grafik_mgg', $data);
					$this->load->view('admin/footer');

			}else{
					$this->load->view('404_content');
			}

		}
	} 

}
