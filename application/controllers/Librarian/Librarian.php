<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Librarian extends CI_Controller
{

    public const CONFIG_UPLOAD = [
        'upload_path' => FCPATH . "/assets/imgAvatar/",
        'allowed_types' => 'png|jpg|jpeg',
        'upload_max_filesize' => '1M',
        'overwrite' => true
    ];

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Librarian/Librarian_model', 'lib_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = 'SHOW LIBRARIAN';
        $data['lib'] = $this->lib_model->getAllValues();
        $this->load->view('templatePerpus/header', $data);
        $this->load->view('Perpustakaan/Librarian/Librarian', $data);
        $this->load->view('templatePerpus/footer');
    }

    public function addDirect()
    {
        $data['title'] = 'ADD LIBRARIAN';
        $this->load->view('templatePerpus/header', $data);
        $this->load->view('Perpustakaan/Librarian/addLibrarian');
        $this->load->view('templatePerpus/footer');
    }

    public function addLibrarian()
    {
        $this->form_validation->set_rules('username', 'USERNAME', 'required');
        $this->form_validation->set_rules('name', 'NAME', 'required');
        $this->form_validation->set_rules('email', 'EMAIL', 'required');
        $this->form_validation->set_rules('password', 'PASSWORD', 'required');
        $this->load->library('upload', array_merge(self::CONFIG_UPLOAD, ['file_name' => md5(time())]));
        if (isset($_FILES['avatar']) && !$this->upload->do_upload('avatar')) {
            $this->upload->display_errors();
        } else {
            $file_name = $this->upload->data();
        }
        if ($this->form_validation->run() == TRUE) {
            $data['username'] = $this->input->post('username');
            $data['name'] = $this->input->post('name');
            $data['email'] = $this->input->post('email');
            $data['password'] =  password_hash($this->input->post('password'), PASSWORD_DEFAULT);
            $data['avatar'] = $file_name['file_name'];
            $this->lib_model->insertData($data);
            redirect('Librarian/');
        } else {
            echo "<script>
                alert('TAMBAH GAGAL!!');
                </script>";
            $data['title'] = 'ADD LIBRARIAN';
            $this->load->view('templatePerpus/header', $data);
            $this->load->view('Perpustakaan/Librarian/addLibrarian');
            $this->load->view('templatePerpus/footer');
        }
    }

    public function editDirect($id)
    {
        $date = new DateTime();
        $data['date'] = $date->format('Y-m-d H:i:s');
        $data['title'] = 'EDIT LIBRARIAN';
        $data['lib'] = $this->lib_model->getByID($id);
        $this->load->view('templatePerpus/header', $data);
        $this->load->view('Perpustakaan/Librarian/editLibrarian', $data);
        $this->load->view('templatePerpus/footer');
    }

    public function editLibrarian()
    {
        $this->form_validation->set_rules('username', 'USERNAME', 'required');
        $this->form_validation->set_rules('name', 'NAME', 'required');
        $this->form_validation->set_rules('email', 'EMAIL', 'required');
        $this->form_validation->set_rules('password', 'PASSWORD', 'required');
        $this->form_validation->set_rules('updated', 'UPDATED', 'required');
        if ($_FILES['avatar']['name'] == "") {
            if ($this->form_validation->run() == TRUE) {
                $id = $this->input->post('id');
                $data['username'] = $this->input->post('username');
                $data['name'] = $this->input->post('name');
                $data['email'] = $this->input->post('email');
                $data['password'] =  password_hash($this->input->post('password'), PASSWORD_DEFAULT);
                $data['updated_at'] = $this->input->post('updated');
                $this->lib_model->updateSaveData($data, $id);
                redirect('Librarian/');
            } else {
                echo "<script>
                alert('EDIT GAGAL!!');
                </script>";
                $data['title'] = 'SHOW LIBRARIAN';
                $data['lib'] = $this->lib_model->getAllValues();
                $this->load->view('templatePerpus/header', $data);
                $this->load->view('Perpustakaan/Librarian/Librarian', $data);
                $this->load->view('templatePerpus/footer');
            }
        } else {
            $this->load->library('upload', array_merge(self::CONFIG_UPLOAD, ['file_name' => md5(time())]));
            if (isset($_FILES['avatar']) && !$this->upload->do_upload('avatar')) {
                $this->upload->display_errors();
            } else {
                $file_name = $this->upload->data();
            }

            if ($this->form_validation->run() == TRUE) {
                $id = $this->input->post('id');
                $data['username'] = $this->input->post('username');
                $data['name'] = $this->input->post('name');
                $data['email'] = $this->input->post('email');
                $data['password'] =  password_hash($this->input->post('password'), PASSWORD_DEFAULT);
                $data['avatar'] = $file_name['file_name'];
                $data['updated_at'] = $this->input->post('updated');
                $this->lib_model->updateSaveData($data, $id);
                redirect('Librarian/');
            } else {
                echo "<script>
                alert('EDIT GAGAL!!');
                </script>";
                $data['title'] = 'SHOW LIBRARIAN';
                $data['lib'] = $this->lib_model->getAllValues();
                $this->load->view('templatePerpus/header', $data);
                $this->load->view('Perpustakaan/Librarian/Librarian', $data);
                $this->load->view('templatePerpus/footer');
            }
        }
    }

    public function deleteData($id)
    {
        $getId = $this->lib_model->getByID($id);
        $path = "./assets/imgAvatar/$getId->avatar";
        $this->lib_model->deleteData($id);
        if (unlink($path)) {
            echo "<script>
            alert('DELETE SUCCESSFULL!!');
            window.location.href = '" . base_url('Librarian/') . "'
            </script>";
        } else {
            echo "<script>
            alert('DELETE FAILED!!');
            window.location.href = '" . base_url('Librarian/') . "'
            </script>";
        }
    }
}


// $data = [
//     'id' => $this->input->post('id'),
//     'username' => $this->input->post('username'),
//     'name' => $this->input->post('name'),
//     'email' => $this->input->post('email'),
//     'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
//     'avatar' => $this->input->post('avatar'),
//     'updated_at' => $this->input->post('updated_at')
// ];
// $this->lib_model->updateSaveData($data);
// redirect('Librarian/');

// $this->lib_model->updateSaveData($id, [
//     'username' => $this->input->post('username'),
//     'name' => $this->input->post('name'),
//     'email' => $this->input->post('email'),
//     'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
//     'avatar' => $this->input->post('avatar'),
//     'updated_at' => $this->input->post('updated_at')
// ]);

        // if (isset($_FILES['avatar']) && !$this->upload->do_upload('avatar')) {
        //     $data['avatar'] = $this->upload->display_errors();
        // } else {
        //     $data['avatar'] = $this->upload->data();
        // }
        // if(!$this->upload->do_upload('berkas'))