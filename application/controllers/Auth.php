<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends My_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('auth_model');
    }

    //===============================================
    //                LOGIN ADMIN
    //===============================================

    public function index()
    {
        //SESSION
        if ($this->session->userdata('id')) {
            redirect('dashboard');
        }

        //title
        $data['title'] = 'Warma CIC | Login';

        //form validation setrules
        $this->form_validation->set_rules('username', 'username', 'required');
        $this->form_validation->set_rules('password', 'password', 'required');

        //jika validasi salah
        if ($this->form_validation->run() == false) {
            $this->load->view('auth/admin/login_admin', $data);
        } else {
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $admin = $this->db->select('*')
                ->from('admin')
                ->where('username_admin', $username)
                ->or_where('email_admin', $username)
                ->get()->row_array();

            //jika user ada
            if ($admin) {
                //cek password
                if (password_verify($password, $admin['password_admin'])) {
                    $data = [
                        'id' => $admin['id_admin'],
                        'nama' => $admin['nama_admin'],
                        'email' => $admin['email_admin'],
                        'id_level' => $admin['id_level'],
                        'foto' => $admin['foto_admin']
                    ];
                    $this->session->set_userdata($data);
                    redirect('dashboard');
                } else {
                    $this->session->set_flashdata('message', '<div class="flash-data" data-passworderror="Periksa kembali password anda"></div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="flash-data" data-loginadmin="Periksa kembali email atau username anda"></div>');
                redirect('auth');
            }
        }
    }

    //logout admin
    public function logout_admin()
    {
        $this->session->unset_userdata('id');
        $this->session->unset_userdata('nama');
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('foto');
        $this->session->unset_userdata('id_level');
        redirect('auth');
    }

    //lupa password admin
    public function lupa_password_admin()
    {
        $data['title'] = 'Warma CIC | Lupa Password';

        //validasi set rules
        $this->form_validation->set_rules('email', 'email', 'required|trim|valid_email');

        //jika salah
        if ($this->form_validation->run() == false) {
            $this->load->view('auth/admin/lupa_password', $data);
        } else {
            $email = $this->input->post('email');
            $admin = $this->db->get_where('admin', ['email_admin' => $email])->row_array();

            if ($admin) {
                $token = base64_encode(random_bytes(32));
                $user_token = [
                    'email' => $email,
                    'token' => $token,
                    'date_created' => time()
                ];

                $this->db->insert('user_token', $user_token);
                $this->_sendEmail($token, 'forgot_admin');
                $this->session->set_flashdata('message', '<div class="flash-data" data-sendemail="Cek email untuk mereset password"></div>');
                redirect('auth/lupa_password_admin');
            } else {
                $this->session->set_flashdata('message', '<div class="flash-data" data-emailerror="Harap periksa kembali email anda"></div>');
                redirect('auth/lupa_password_admin');
            }
        }
    }

    //reset password admin
    public function reset_password_admin()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');
        $admin = $this->db->get_where('admin', ['email_admin' => $email])->row_array();

        if ($admin) {
            $user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();
            if ($user_token) {
                $this->session->set_userdata('reset_email', $email);
                $this->ubah_password_admin();
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" align="center" role="alert">Token salah</div>');
                redirect('auth/lupa_password_admin');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" align="center" role="alert">Gagal mereset password</div>');
            redirect('auth/lupa_password_admin');
        }
    }

    //ubah password admin
    public function ubah_password_admin()
    {
        // cek session
        if (!$this->session->userdata('reset_email')) {
            redirect('auth');
        }

        $data['title'] = 'Warma CIC | Ubah Password';

        //form validasi
        $this->form_validation->set_rules('password1', 'password', 'required|min_length[3]', [
            'required' => 'Password tidak boleh kosong',
            'min_length' => 'Password di isi minimal 3 karakter'
        ]);
        $this->form_validation->set_rules('password2', 'password', 'required|min_length[3]|matches[password1]', [
            'required' => 'Konfirmasi password tidak boleh kosong',
            'matches' => 'Password tidak sama',
            'min_length' => 'Konfirmasi password minimal 3 karakter'
        ]);

        //jika form validasi salah
        if ($this->form_validation->run() == false) {
            $this->load->view('auth/admin/ubah_password', $data);
        } else {
            $password = password_hash($this->input->post('password1'), PASSWORD_DEFAULT);
            $email = $this->session->userdata('reset_email');

            $this->db->set('password_admin', $password);
            $this->db->where('email_admin', $email);
            $this->db->update('admin');

            $this->session->unset_userdata('reset_email');
            $this->session->set_flashdata('message', '<div class="flash-data" data-ubahpassword="Password berhasil diubah"></div>');
            redirect('auth');
        }
    }

    //konfigurasi email
    private function _sendEmail($token, $type)
    {
        $config = [
            'protocol'  => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_user' => 'bkmcic.official@gmail.com',
            'smtp_pass' => 'bkmendas2019',
            'smtp_port' => 465,
            'mailtype'  => 'html',
            'charset'   => 'utf-8',
            'newline'   => "\r\n"
        ];

        $this->email->initialize($config);
        $this->email->from('bkmcic.oficial@gmail.com', 'Waroeng Mahasiswa UCIC');
        $this->email->to($this->input->post('email'));

        if ($type == 'forgot_admin') {
            $this->email->subject('Reset Password');
            $this->email->message('Klik untuk mereset password : <a href="' . base_url() . 'auth/reset_password_admin?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Reset Password</a>');
        } else if ($type == 'forgot_mahasiswa') {
            $this->email->subject('Reset Password');
            $this->email->message('Klik untuk mereset password : <a href="' . base_url() . 'auth/reset_password_mahasiswa?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Reset Password</a>');
        } else if ($type == 'forgot_umum') {
            $this->email->subject('Reset Password');
            $this->email->message('Klik untuk mereset password : <a href="' . base_url() . 'auth/reset_password_umum?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Reset Password</a>');
        } else if ($type == 'verify') {
            $this->email->subject('Aktivasi akun');
            $this->email->message('Klik untuk mengaktifkan akun : <a href="' . base_url() . 'auth/verify?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Aktifkan akun</a>');
        }

        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            die;
        }
    }

    //===============================================
    //                LOGIN MAHASISWA
    //===============================================

    public function login_mahasiswa()
    {
        //SESSION
        if ($this->session->userdata('id')) {
            redirect('dashboard/pembeli');
        }

        //title
        $data['title'] = 'Warma CIC | Login Mahasiswa';

        //form validation setrules
        $this->form_validation->set_rules('nim', 'nim', 'required|numeric', [
            'required' => 'Form ini tidak boleh kosong',
            'numeric'  => 'Harus di isi dengan angka'
        ]);
        $this->form_validation->set_rules('password', 'password', 'required|min_length[3]', [
            'required' => 'Form ini tidak boleh kosong',
            'min_length'  => 'Minimal di isi dengan 3 karakter'
        ]);

        //jika validasi salah
        if ($this->form_validation->run() == false) {
            $this->paggingFrontend('auth/mahasiswa/login_mahasiswa', $data);
        } else {
            $nim = $this->input->post('nim');
            $password = $this->input->post('password');
            $mahasiswa = $this->db->get_where('akun_mahasiswa', ['nim' => $nim])->row_array();

            //jika user ada
            if ($mahasiswa) {

                //cek akun aktif
                if ($mahasiswa['status_aktif'] == 1) {

                    //cek password
                    if (password_verify($password, $mahasiswa['password_mahasiswa'])) {

                        $master = $this->db->get_where('mahasiswa', ['nim' => $nim])->row_array();

                        $data = [
                            'id' => $mahasiswa['id_mahasiswa'],
                            'email' => $mahasiswa['email_mahasiswa'],
                            'foto' => $mahasiswa['foto_mahasiswa'],
                            'nama' => $master['nama_mahasiswa'],
                            'tipe' => $mahasiswa['tipe']
                        ];
                        $this->session->set_userdata($data);
                        $this->session->set_flashdata('message', '<div class="flash-data" data-loginsuccess="Silahkan berbelanja!"></div>');
                        redirect('beranda');
                    } else {
                        $this->session->set_flashdata('message', '<div class="flash-data" data-passworderror="Periksa kembali password anda"></div>');
                        redirect('auth/login_mahasiswa');
                    }
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" align="center" role="alert">Akun anda tidak aktif</div>');
                    redirect('auth/login_mahasiswa');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="flash-data" data-nimempty="Periksa kembali NIM anda"></div>');
                redirect('auth/login_mahasiswa');
            }
        }
    }

    //buat akun mahasiswa
    public function buat_akun_mahasiswa()
    {
        //title
        $data['title'] = 'Warma CIC | Buat Akun';

        //form validation setrules
        $this->form_validation->set_rules('nim', 'nim', 'required|numeric|is_unique[akun_mahasiswa.nim]', [
            'required' => 'Form ini tidak boleh kosong',
            'numeric'  => 'Harus di isi dengan angka',
            'is_unique'  => 'NIM sudah terdaftar',
        ]);
        $this->form_validation->set_rules('email', 'email', 'required|valid_email|is_unique[akun_mahasiswa.email_mahasiswa]', [
            'required' => 'Form ini tidak boleh kosong',
            'valid_email'  => 'Email tidak valid',
            'is_unique'  => 'Email sudah terdaftar',
        ]);
        $this->form_validation->set_rules('telepon', 'telepon', 'required|numeric|is_unique[akun_mahasiswa.telepon_mahasiswa]', [
            'required' => 'Form ini tidak boleh kosong',
            'numeric'  => 'Harus di isi dengan angka',
            'is_unique' => 'Nomor telepon sudah terdaftar'
        ]);
        $this->form_validation->set_rules('alamat', 'alamat', 'required|trim', [
            'required' => 'Form ini tidak boleh kosong'
        ]);
        $this->form_validation->set_rules('password1', 'password1', 'required|min_length[3]', [
            'required' => 'Form ini tidak boleh kosong',
            'min_length'  => 'Minimal di isi dengan 3 karakter'
        ]);
        $this->form_validation->set_rules('password2', 'password2', 'required|min_length[3]|matches[password1]', [
            'required' => 'Form ini tidak boleh kosong',
            'min_length'  => 'Minimal di isi dengan 3 karakter',
            'matches' => 'Password tidak sama'
        ]);

        //jika validasi salah
        if ($this->form_validation->run() == false) {
            $this->paggingFrontend('auth/mahasiswa/buat_akun_mahasiswa', $data);
        } else {
            $nim = $this->input->post('nim');
            $mahasiswa = $this->db->get_where('mahasiswa', ['nim' => $nim])->row_array();

            if (!$mahasiswa) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" align="center" role="alert">Anda tidak terdaftar sebagai mahasiswa UCIC</div>');
                redirect('auth/buat_akun_mahasiswa');
            } else {
                //input ke table akun mahasiswa
                $this->auth_model->buatAkun_mahasiswa();
                $this->session->set_flashdata('message', '<div class="flash-data" data-registrasi="Silahkan login!"></div>');
                redirect('auth/login_mahasiswa');
            }
        }
    }

    //logout mahasiswa
    public function logout_mahasiswa()
    {
        $this->session->unset_userdata('id');
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('foto');
        $this->session->unset_userdata('nama');
        redirect('beranda');
    }

    //lupa password umum
    public function lupa_password_mahasiswa()
    {
        $data['title'] = 'Warma CIC | Lupa Password';

        //validasi set rules
        $this->form_validation->set_rules('email', 'email', 'required|trim|valid_email', [
            'required' => 'Form ini tidak boleh kosong',
            'valid_email' => 'Email tidak valid'
        ]);

        //jika salah
        if ($this->form_validation->run() == false) {
            $this->paggingFrontend('auth/mahasiswa/lupa_password_mahasiswa', $data);
        } else {
            $email = $this->input->post('email');
            $mahasiswa = $this->db->get_where('akun_mahasiswa', ['email_mahasiswa' => $email])->row_array();

            if ($mahasiswa) {
                $token = base64_encode(random_bytes(32));
                $user_token = [
                    'email' => $email,
                    'token' => $token,
                    'date_created' => time()
                ];

                $this->db->insert('user_token', $user_token);
                $this->_sendEmail($token, 'forgot_mahasiswa');
                $this->session->set_flashdata('message', '<div class="flash-data" data-sendemail="Cek email untuk mereset password"></div>');
                redirect('auth/lupa_password_mahasiswa');
            } else {
                $this->session->set_flashdata('message', '<div class="flash-data" data-emailerror="Harap periksa kembali email anda"></div>');
                redirect('auth/lupa_password_mahasiswa');
            }
        }
    }

    //reset password mahasiswa
    public function reset_password_mahasiswa()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');
        $mahasiswa = $this->db->get_where('akun_mahasiswa', ['email_mahasiswa' => $email])->row_array();

        if ($mahasiswa) {
            $user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();
            if ($user_token) {
                $this->session->set_userdata('reset_email', $email);
                $this->ubah_password_mahasiswa();
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" align="center" role="alert">Token salah</div>');
                redirect('auth/lupa_password_mahasiswa');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" align="center" role="alert">Gagal mereset password</div>');
            redirect('auth/lupa_password_mahasiswa');
        }
    }

    //ubah password mahasiswa
    public function ubah_password_mahasiswa()
    {
        // cek session
        if (!$this->session->userdata('reset_email')) {
            redirect('auth/login_mahasiswa');
        }

        $data['title'] = 'Warma CIC | Ubah Password';

        //form validasi
        $this->form_validation->set_rules('password1', 'password', 'required|min_length[3]', [
            'required' => 'Password tidak boleh kosong',
            'min_length' => 'Password di isi minimal 3 karakter'
        ]);
        $this->form_validation->set_rules('password2', 'password', 'required|min_length[3]|matches[password1]', [
            'required' => 'Ulangi password tidak boleh kosong',
            'matches' => 'Password tidak sama',
            'min_length' => 'Minimal di isi dengan 3 karakter'
        ]);

        //jika form validasi salah
        if ($this->form_validation->run() == false) {
            $this->paggingFrontend('auth/mahasiswa/ubah_password_mahasiswa', $data);
        } else {
            $password = password_hash($this->input->post('password1'), PASSWORD_DEFAULT);
            $email = $this->session->userdata('reset_email');

            $this->db->set('password_mahasiswa', $password);
            $this->db->where('email_mahasiswa', $email);
            $this->db->update('akun_mahasiswa');

            $this->session->unset_userdata('reset_email');
            $this->session->set_flashdata('message', '<div class="flash-data" data-ubahpassword="Password berhasil diubah"></div>');
            redirect('auth/login_mahasiswa');
        }
    }


    //===============================================
    //                LOGIN UMUM
    //===============================================

    public function login_umum()
    {
        //title
        $data['title'] = 'Warma CIC | Login Umum';

        //form validation setrules
        $this->form_validation->set_rules('username', 'username', 'required', [
            'required' => 'Form ini tidak boleh kosong'
        ]);
        $this->form_validation->set_rules('password', 'password', 'required|min_length[3]', [
            'required' => 'Form ini tidak boleh kosong',
            'min_length'  => 'Minimal di isi dengan 3 karakter'
        ]);

        //jika validasi salah
        if ($this->form_validation->run() == false) {
            $this->paggingFrontend('auth/umum/login_umum', $data);
        } else {
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $umum = $this->db->select('*')
                ->from('akun_umum')
                ->where('username', $username)
                ->or_where('email', $username)
                ->get()->row_array();

            //jika user ada
            if ($umum) {

                //cek akun aktif
                if ($umum['status_aktif'] == 1) {

                    //cek password
                    if (password_verify($password, $umum['password'])) {
                        $data = [
                            'id' => $umum['id_umum'],
                            'email' => $umum['email'],
                            'foto' => $umum['foto'],
                            'nama' => $umum['username'],
                            'tipe' => $umum['tipe']
                        ];
                        // unset($umum['password_umum']);
                        $this->session->set_userdata($data);
                        $this->session->set_flashdata('message', '<div class="flash-data" data-loginsuccess="Silahkan berbelanja!"></div>');
                        redirect('beranda');
                    } else {
                        $this->session->set_flashdata('message', '<div class="flash-data" data-passworderror="Periksa kembali password anda"></div>');
                        redirect('auth/login_umum');
                    }
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" align="center" role="alert">Akun anda tidak aktif</div>');
                    redirect('auth/login_umum');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="flash-data" data-loginadmin="Periksa kembali email atau username anda"></div>');
                redirect('auth/login_umum');
            }
        }
    }

    //buat akun umum
    public function buat_akun_umum()
    {
        //title
        $data['title'] = 'Warma CIC | Buat Akun';

        //form validation setrules
        $this->form_validation->set_rules('email', 'email', 'required|valid_email|is_unique[akun_umum.email]', [
            'required' => 'Form ini tidak boleh kosong',
            'valid_email'  => 'Email tidak valid',
            'is_unique' => 'Email sudah terdaftar'
        ]);
        $this->form_validation->set_rules('username', 'username', 'required|trim', [
            'required' => 'Form ini tidak boleh kosong'
        ]);
        $this->form_validation->set_rules('telepon', 'telepon', 'required|trim|numeric|is_unique[akun_umum.telepon]', [
            'required' => 'Form ini tidak boleh kosong',
            'numeric' => 'Harus di isi dengan angka',
            'is_unique' => 'Nomor telepon sudah terdaftar'
        ]);
        $this->form_validation->set_rules('password1', 'password1', 'required|min_length[3]', [
            'required' => 'Form ini tidak boleh kosong',
            'min_length'  => 'Minimal di isi dengan 3 karakter'
        ]);
        $this->form_validation->set_rules('password2', 'password2', 'required|min_length[3]|matches[password1]', [
            'required' => 'Form ini tidak boleh kosong',
            'min_length'  => 'Minimal di isi dengan 3 karakter',
            'matches' => 'Password tidak sama'
        ]);

        //jika validasi salah
        if ($this->form_validation->run() == false) {
            $this->paggingFrontend('auth/umum/buat_akun_umum', $data);
        } else {
            //input ke table umum
            $this->auth_model->buatAkun_umum();
            $this->session->set_flashdata('message', '<div class="flash-data" data-registrasi="Silahkan login!"></div>');
            redirect('auth/login_umum');
        }
    }

    //logout umum
    public function logout_umum()
    {
        $this->session->unset_userdata('id');
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('foto');
        redirect('beranda');
    }

    //lupa password umum
    public function lupa_password_umum()
    {
        $data['title'] = 'Warma CIC | Lupa Password';

        //validasi set rules
        $this->form_validation->set_rules('email', 'email', 'required|trim|valid_email', [
            'required' => 'Form ini tidak boleh kosong',
            'valid_email' => 'Email tidak valid'
        ]);

        //jika salah
        if ($this->form_validation->run() == false) {
            $this->paggingFrontend('auth/umum/lupa_password_umum', $data);
        } else {
            $email = $this->input->post('email');
            $umum = $this->db->get_where('akun_umum', ['email' => $email])->row_array();

            if ($umum) {
                $token = base64_encode(random_bytes(32));
                $user_token = [
                    'email' => $email,
                    'token' => $token,
                    'date_created' => time()
                ];

                $this->db->insert('user_token', $user_token);
                $this->_sendEmail($token, 'forgot_umum');
                $this->session->set_flashdata('message', '<div class="flash-data" data-sendemail="Cek email untuk mereset password"></div>');
                redirect('auth/lupa_password_umum');
            } else {
                $this->session->set_flashdata('message', '<div class="flash-data" data-emailerror="Harap periksa kembali email anda"></div>');
                redirect('auth/lupa_password_umum');
            }
        }
    }

    //reset password umum
    public function reset_password_umum()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');
        $umum = $this->db->get_where('akun_umum', ['email' => $email])->row_array();

        if ($umum) {
            $user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();
            if ($user_token) {
                $this->session->set_userdata('reset_email', $email);
                $this->ubah_password_umum();
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" align="center" role="alert">Token salah</div>');
                redirect('auth/lupa_password_umum');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" align="center" role="alert">Gagal mereset password</div>');
            redirect('auth/lupa_password_umum');
        }
    }

    //ubah password umum
    public function ubah_password_umum()
    {
        // cek session
        if (!$this->session->userdata('reset_email')) {
            redirect('auth/login_umum');
        }

        $data['title'] = 'Warma CIC | Ubah Password';

        //form validasi
        $this->form_validation->set_rules('password1', 'password', 'required|min_length[3]', [
            'required' => 'Password tidak boleh kosong',
            'min_length' => 'Password di isi minimal 3 karakter'
        ]);
        $this->form_validation->set_rules('password2', 'password', 'required|min_length[3]|matches[password1]', [
            'required' => 'Ulangi password tidak boleh kosong',
            'matches' => 'Password tidak sama',
            'min_length' => 'Minimal di isi dengan 3 karakter'
        ]);

        //jika form validasi salah
        if ($this->form_validation->run() == false) {
            $this->paggingFrontend('auth/umum/ubah_password_umum', $data);
        } else {
            $password = password_hash($this->input->post('password1'), PASSWORD_DEFAULT);
            $email = $this->session->userdata('reset_email');

            $this->db->set('password', $password);
            $this->db->where('email', $email);
            $this->db->update('akun_umum');

            $this->session->unset_userdata('reset_email');
            $this->session->set_flashdata('message', '<div class="flash-data" data-ubahpassword="Password berhasil diubah"></div>');
            redirect('auth/login_umum');
        }
    }
}
