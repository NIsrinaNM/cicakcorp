<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_dashboard extends CI_Controller {

	public function __construct()
        {
            parent::__construct();
            
            $this->load->model('Home_model');
            if (!$this->session->userdata('masukin')) {
            	redirect('Home/login');
            }
        }

    public function index(){
        $this->load->view('home/navigasilogin');
        $this->load->view('home/profiluser');
        $this->load->view('home/footer');
    }

        public function chgpass($username){
        $this->form_validation->set_rules('npassword','New Password','required|matches[cpassword]|min_length[5]');
        $this->form_validation->set_rules('cpassword','Confirm Password','required');
        $opass = md5("1Qaz" . $this->input->post('opassword') . "-Pl,");
        $npass = md5("1Qaz" . $this->input->post('npassword') . "-Pl,");
        $data['password'] = $npass;

        $do = $this->Home_model->getColomn($username);
        if ($do[0]->password == $opass) {
            if ($this->form_validation->run()) {
                if (!$this->Home_model->updateData($username,$data)) {
                    $this->session->set_flashdata('success','Password successfully updated');
                }else{
                    $this->session->set_flashdata('error','can\'t update password right now');
                }
            }else{$data = validation_errors();
                $this->session->set_flashdata('error',''.validation_errors().'');}
        }else{$this->session->set_flashdata('error','Old Password is wrong');}
        redirect('Home_Dashboard/profiluser');
    }

    public function chgProfile(){
        $config['upload_path'] = './assets/fotouser/';
        $config['allowed_types'] = 'jpg|png';
        $config['max_size'] = '10240';
        $config['max_width'] = '10240';
        $config['max_height'] = '7560';
        $this->upload->initialize($config);

        $this->form_validation->set_rules('nama','Nama','required');
        $this->upload->do_upload('image');
        $username = $this->session->userdata('masukin')['user'];
        $ambilprop = $this->Home_model->ambilprop($this->input->post('prop'));
        $ambilkota = $this->Home_model->ambilkota($this->input->post('kotkab'));
        $ambilkec = $this->Home_model->ambilkec($this->input->post('kec'));
        $data = array(
            'nama'=> $this->input->post('nama'),
            'alamat'=> $this->input->post('alamat'),
            'noTelp' => $this->input->post('notelp'),
            'prop' => $ambilprop[0]->name,
            'kotkab' => $ambilkota[0]->name,
            'kec' => $ambilkec[0]->name,
            'kodepos' => $this->input->post('kodepos'),
            'foto' => 'assets/fotouser/'.$this->upload->data('file_name')
            );
        $data1= array('email' => $this->input->post('email'));
        $sessEdit = array(
            'user'=>$this->session->userdata('masukin')['user'],
            'nama'=>$this->input->post('nama')
            );
        if ($this->form_validation->run()) {
            $this->Home_model->updateData($username, $data1);
            $this->Home_model->updateProfil($username, $data);
            $this->session->set_userdata('masukin',$sessEdit);
            $this->session->set_flashdata('success','Profil telah diubah');
        }else{
            $this->session->set_flashdata('error','Maaf, cek kembali kelengkapan profil Anda');
        }
        redirect('Home_Dashboard/profiluser');
    }

    public function profiluser() {
        if (empty($this->session->userdata('masukin'))) {
            redirect('Home/login');
        } else {
            $var['title'] = 'Profile '.$this->session->userdata('masukin')['user'];
            $detiluser = $this->Home_model->ambildetiluser($this->session->userdata('masukin')['user']);
            $data = array(
                'username'=>$this->session->userdata('masukin')['user'],
                'nama'=>$this->session->userdata('masukin')['nama'],
                'alamat'=>$detiluser[0]->alamat,
                'notelp'=>$detiluser[0]->noTelp,
                'foto'=>$detiluser[0]->foto,
                'prop'=>$detiluser[0]->prop,
                'email'=>$detiluser[0]->email,
                'kotkab'=>$detiluser[0]->kotkab,
                'kec'=>$detiluser[0]->kec,
                'kodepos' => $detiluser[0]->kodepos,
                'order' => $this->Home_model->getOrderJasa()
                );
            $data['provinsi'] = $this->Home_model->provinsi();
            $this->load->view('home/navigasilogin');
            $this->load->view('home/profiluser', $data);
        }
    }

    public function ambil_data(){
        $modul = $this->input->post('modul');
        $id = $this->input->post('id');

        if($modul=="kabupaten"){
            echo $this->Home_model->kabupaten($id);
        }
        else if($modul=="kecamatan"){
            echo $this->Home_model->kecamatan($id);
        }
    }

}