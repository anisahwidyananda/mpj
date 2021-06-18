<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Web extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

	public function index()
	{
		$ceks = $this->session->userdata('login_session');
		if(!isset($ceks)) {
			redirect('web/login');
		}else{
			$cek_user  = $this->Mcrud->get_users_by_un($ceks);
			if ($cek_user->row()->level == "admin") {
					redirect('admin');
			}else{
					redirect('users');
			}
		}
	}


	public function daftar()
	{
		$ceks = $this->session->userdata('login_session');
		if(isset($ceks)) {
			$this->load->view('404_content');
		}else{
			$data['user']  = $this->Mcrud->get_users();
			$this->load->view('web/header');
			$this->load->view('web/daftar', $data);
			$this->load->view('web/footer');
		}
	}

	public function proses_daftar()
	{
	  if (isset($_POST['nama'])) {
			$nama 		= htmlentities(strip_tags($this->input->post('nrp2')));
			$email		= htmlentities(strip_tags($this->input->post('email')));
			$username	= htmlentities(strip_tags($this->input->post('username')));
			$password	= htmlentities(strip_tags($this->input->post('password')));
			$password2	= htmlentities(strip_tags($this->input->post('password2')));

			date_default_timezone_set('Asia/Jakarta');
			$tgl_masuk = date('Y-m-d H:m:s');

			if ($password != $password2) {
					$msg2 =
						'
						<div class="alert alert-warning alert-dismissible" role="alert">
							 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
								 <span aria-hidden="true">&times;&nbsp;</span>
							 </button>
							 <strong>Gagal!</strong> Password tidak cocok.
						</div>'
					;

					$status = "gagal";
					
			}else{
					
							$cek_un  = $this->Mcrud->get_users_by_un($username)->num_rows();

							if ($cek_un != 0) {

									$msg2=
										'
										<div class="alert alert-warning alert-dismissible" role="alert">
											 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
												 <span aria-hidden="true">&times;&nbsp;</span>
											 </button>
											 <strong>Gagal!</strong> Username "'.$username.'" sudah ada.
										</div>'
									;

									$status = "gagal";
							
										
								}else{

										$query = $this->Mcrud->save_user($data);

										if ($query){
												$data = array(
													'email' 	 => $email,
													'username'	 => $username,
													'password'	 => md5($password),
													'status'	 => 'proses',
													'tgl_daftar' => $tgl_masuk
												);
												// $this->Mcrud->update_user(array('id_user' => $id_user), $data);

												$msg2 =
													'
													<div class="alert alert-success alert-dismissible" role="alert">
														 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
															 <span aria-hidden="true">&times;&nbsp;</span>
														 </button>
														 <strong>Sukses!</strong> User berhasil didaftar, Silahkan hubungi admin untuk aktivasi akun.
													</div>'
												;

												$status = "sukses";
										}else{

												$msg2 =
													'
													<div class="alert alert-success alert-dismissible" role="alert">
														 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
															 <span aria-hidden="true">&times;&nbsp;</span>
														 </button>
														 <strong>Gagal!</strong> Ada kesalahan, silahkan cek koneksi lalu segarkan browser dan coba lagi.
													</div>'
												;

												$status = "gagal";
										}
								
										// redirect('web/daftar');
							// }
					}

			}

			echo json_encode(array("status" => $status, "pesan2" => $msg2));

		}else{
			redirect('web/daftar');
		}
	}


	public function login()
	{
		$ceks = $this->session->userdata('login_session');
		if(isset($ceks)) {
			$this->load->view('404_content');
		}else{
			$this->load->view('web/header');
			$this->load->view('web/login');
			$this->load->view('web/footer');

				if (isset($_POST['btnlogin'])){
						 $username = htmlentities(strip_tags($_POST['username']));
						 $pass	   = htmlentities(strip_tags(md5($_POST['password'])));

						 $query  = $this->Mcrud->get_users_by_un($username);
						 $cek    = $query->result();
						 $cekun  = $cek[0]->username;
						 $jumlah = $query->num_rows();

						 if($jumlah == 0) {
								 $this->session->set_flashdata('msg',
									 '
									 <div class="alert alert-danger alert-dismissible" role="alert">
									 		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
												<span aria-hidden="true">&times;&nbsp;</span>
											</button>
											<strong>Username "'.$username.'"</strong> belum terdaftar.
									 </div>'
								 );
								 redirect('web/login');
						 } else {
										 $row = $query->row();
										 $cekpass = $row->password;
										 if($cekpass <> $pass) {
												$this->session->set_flashdata('msg',
													 '<div class="alert alert-warning alert-dismissible" role="alert">
													 		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
																<span aria-hidden="true">&times;&nbsp;</span>
															</button>
															<strong>Username atau Password Salah!</strong>.
													 </div>'
												);
												redirect('web/login');
										 } else {

																$this->session->set_userdata('login_session', "$cekun");
																$this->session->set_userdata('id_user', "$row->id_user");
																
												 			 	redirect('web');
										 }
						 }
				}
		}
	}


	public function logout() {
     $this->session->unset_userdata('login_session');

        redirect('web/login');
  }

	function error_not_found(){
		$this->load->view('404_content');
	}

}
