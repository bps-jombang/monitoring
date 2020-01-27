<?php

class Admin extends CI_Controller
{

    public function __construct() 
    { 
        parent::__construct(); 
        $this->load->library('form_validation');
        $this->load->model(['Model_admin' => 'modeladmin','Model_login' => 'modellogin']);
        $this->load->helper('admin_helper');

        if (!$this->session->userdata('username')) {
            redirect(base_url('loginadmin'));
        }
    }

    public function index() // DONE
    {
        $title['judul']     = "BPS";
        $data['sumtarget']  = $this->db->select('SUM(target)')->get('kegiatan_detail')->row_array();
        $data['sumseksi']   = $this->db->select('COUNT(nama_seksi)')->get('seksi')->row_array();
        $data['listmenu']   = getMenuLink(); // array di helper   
          $data['hadeh']   = getMenuLink(); // array di helper 
        // $menu   = getMenuLink(); // array di helper   
        // print_r(array_values($data['listmenu']));die;
        $this->load->view('template_admin/header',$title);
        $this->load->view('template_admin/sidebar',$data);
        $this->load->view('template_admin/navbar');
        $this->load->view('admin/index');
        $this->load->view('template_admin/footer');
    }

    public function dataKegiatan()
    {
        $title['judul'] = "List Kegiatan | BPS";

        // $data['semuakegiatan'] = $this->db->get('kegiatan')->result_array();
        // $data['listmitra'] = $this->db->get('mitra')->result_array();
        $data['semuakegiatan'] = $this->modeladmin->getData('kegiatan',0);
        $data['listmitra'] = $this->modeladmin->getData('mitra',0);
        //SELECT k.nama_kecamatan,u.nama_user FROM user as u INNER JOIN kecamatan as k ON k.id_kecamatan = u.id_kecamatan
        $this->db->select('u.id_user,k.nomor_kecamatan,k.nama_kecamatan,u.nama_user');
        $this->db->join('kecamatan as k','k.id_kecamatan = u.id_kecamatan');
        $data['listuser'] = $this->db->get('user as u')->result_array();

        $listuser = $this->db->get('user as u')->result_array();
        // echo $listuser[0]["nama_user"];die;
        // echo json_encode($listuser);die;
        // $nama = json_encode(array('data' => $listuser));
        // echo $nama['nama_user'];die;
        
        // $data['kegiatan_detail'] = $this->db->get('kegiatan_detail')->result_array();
        
        $data['kegiatan_detail'] = $this->modeladmin->getData('kegiatan_detail',0);

        $this->db->select('j.id_jabatan,j.nama_jabatan,s.nama_seksi,p.nama_user,p.id_pejabat');
        $this->db->join('jabatan as j','j.id_jabatan = p.id_jabatan');
        $this->db->join('seksi as s','s.id_seksi = p.id_seksi');
        $this->db->group_by('p.id_pejabat');
        $data['listpejabat'] = $this->db->get('pejabat as p')->result_array();
        // $data['mitra']= $this->db->get('mitra')->result_array();
        // $this->db->group_by('id_user');
        // $data['sortuser'] = $this->db->get('kegiatan_detail')->result_array();

        // $data['mitra'] = $this->db->get('mitra')->result_array();
        $data['listmenu']   = getMenuLink(); // array di helper   
        $data['menuform'] = getMenuForm();// array class
        $this->load->view('template_admin/header',$title);
        $this->load->view('template_admin/sidebar',$data);
        $this->load->view('template_admin/navbar');
        $this->load->view('admin/dataKegiatan');
        $this->load->view('template_admin/footer');
    }

    public function detailKegiatanUser($id)
    {
        if (!$id) {
            redirect(base_url('listkegiatan'));
        }
        $title['judul']     = "Kegiatan Detail User | BPS";

        $data['listmenu']   = getMenuLink(); // array di helper   
        $data['menuform']   = getMenuForm();// array class

        $this->db->select('kd.id_kegiatan_detail,k.uraian_kegiatan,u.nama_user,kd.target,kd.realisasi,kd.target');
        $this->db->join('user as u','u.id_user = kd.id_user');
        $this->db->join('kegiatan as k','k.id_kegiatan = kd.id_kegiatan');
        $data['kegiatandetail']     = $this->db->get_where('kegiatan_detail as kd',["kd.id_user" => $id])->result_array();
        $this->db->select('k.nama_kecamatan,u.nama_user');
        $this->db->join('kecamatan as k','k.id_kecamatan = u.id_kecamatan');
        $data['userdetail']         = $this->db->get_where('user as u',["u.id_user" => $id])->result_array();

        if ($data['userdetail'] != NULL) {
            $this->load->view('template_admin/header',$title);
            $this->load->view('template_admin/sidebar',$data);
            $this->load->view('template_admin/navbar');
            $this->load->view('admin/detailuser');
            $this->load->view('template_admin/footer');
        } else {
            redirect(base_url('admin'));
        }
        
    }

    public function addseksi() // DONE
    {   
        $data['judul']          = "Tambah Seksi | BPS";

        $data['listmenu']       = getMenuLink(); // array di helper   
        $data['menuform']       = getMenuForm();// array class

        $data['listseksi']      = $this->modeladmin->getData('seksi',0);
        
        $this->form_validation->set_rules('nama_seksi','Nama Seksi','required'); // validation 

        if ($this->form_validation->run() == FALSE) { 
            // jika validation gagal maka dikembalikan ke halaman insert tadi
            $this->load->view('template_admin/header',$data);
            $this->load->view('template_admin/sidebar',$data);
            $this->load->view('template_admin/navbar');
            $this->load->view('admin/tambahdata/tambahseksi');
            $this->load->view('template_admin/footer',$data);
        }else{
            // jika validation sukses maka insert data
            $this->modeladmin->createData('seksi',1);
            $this->session->set_flashdata('pesan','Ditambah');
            redirect(base_url('seksi')); 
        } 
    }

    public function addmitra()// DONE
    {
        $title['judul']         = "Tambah Mitra  | BPS";

        $data['listmenu']       = getMenuLink(); // array di helper
        $data['menuform']       = getMenuForm();// array class

        $data['listmitra']      = $this->modeladmin->getData('mitra',0);
        
        $this->form_validation->set_rules('nama_mitra','Mitra','required'); // validation

        if ($this->form_validation->run() == FALSE) {
            // jika validation gagal maka dikembalikan ke halaman insert tadi
            $this->load->view('template_admin/header',$title);
            $this->load->view('template_admin/sidebar',$data);
            $this->load->view('template_admin/navbar');
            $this->load->view('admin/tambahdata/tambahmitra');
            $this->load->view('template_admin/footer');
        }else{
            // jika validation sukses maka insert data
            $this->modeladmin->createData('mitra',2);
            $this->session->set_flashdata('pesan','Ditambah');
            redirect(base_url('mitra')); 
        }
    }

    public function addjabatan() // DONE
    {
        $title['judul']         = "Tambah Jabatan | BPS";

        $data['listmenu']       = getMenuLink(); // array di helper
        $data['menuform']       = getMenuForm();// array class
        $data['listjabatan']    = $this->modeladmin->getData('jabatan',0);
        

        $this->form_validation->set_rules('nama_jabatan','Jabatan','required'); // validation

        if ($this->form_validation->run() == FALSE) {
            // jika validation gagal maka dikembalikan ke halaman insert tadi
            $this->load->view('template_admin/header',$title);
            $this->load->view('template_admin/sidebar',$data);
            $this->load->view('template_admin/navbar');
            $this->load->view('admin/tambahdata/tambahjabatan');
            $this->load->view('template_admin/footer');
        }else{
            // jika validation sukses maka insert data
            $this->modeladmin->createData('jabatan',3);
            $this->session->set_flashdata('pesan','Ditambah');
            redirect(base_url('jabatan')); 
        }
    }

    public function addkegiatan()
    {
        $title['judul']         = "Tambah Kegiatan | BPS";

        $data['listmenu']       = getMenuLink(); // array di helper
        $data['menuform']       = getMenuForm();// array class
        $data['listseksi']      = $this->modeladmin->getData('seksi',0);
        $data['listuser']       = $this->db->get_where('user',["nama_user !=" => NULL])->result_array();

        $this->form_validation->set_rules('nama_kegiatan','Kegiatan','required'); // validation

        if ($this->form_validation->run() == FALSE) {
            // jika validation gagal maka dikembalikan ke halaman insert tadi
            $this->load->view('template_admin/header',$title);
            $this->load->view('template_admin/sidebar',$data);
            $this->load->view('template_admin/navbar');
            $this->load->view('admin/tambahdata/tambahkegiatan');
            $this->load->view('template_admin/footer');
        }else{
            // jika validation sukses maka insert data
            $this->modeladmin->createData('kegiatan',5);
            $this->session->set_flashdata('pesan','Ditambah');
            redirect(base_url('kegiatan')); 
        }
    }

    public function addtargetuser()
    {
        $title['judul']         = "Tambah Targget User | BPS";

        $data['listmenu']       = getMenuLink(); // array di helper
        $data['menuform']       = getMenuForm();// array class
        $data['listuser']       = $this->db->get_where('user',["nama_user !=" => NULL])->result_array();
        $this->db->select('p.id_pejabat,s.nama_seksi,j.nama_jabatan,p.nama_user');
        $this->db->join('seksi as s','s.id_seksi = p.id_seksi');
        $this->db->join('jabatan as j','j.id_jabatan = p.id_jabatan');
        $data['listpejabat']        = $this->db->get('pejabat as p')->result_array();
        $data['listkegiatan']   = $this->db->get('kegiatan')->result_array();

        $this->form_validation->set_rules('input_target','Target','required'); // validation

        if ($this->form_validation->run() == FALSE) {
            // jika validation gagal maka dikembalikan ke halaman insert tadi
            $this->load->view('template_admin/header',$title);
            $this->load->view('template_admin/sidebar',$data);
            $this->load->view('template_admin/navbar');
            $this->load->view('admin/tambahdata/tambahtarget');
            $this->load->view('template_admin/footer');
        }else{
            // jika validation sukses maka insert data
            $this->modeladmin->createData('kegiatan_detail',7);
            $this->session->set_flashdata('pesan','Ditambah');
            redirect(base_url('targetuser')); 
        }
    }

    public function adduser() // DONE
    {
        $title['judul']         = "Tambah User | BPS";

        $data['listmenu']       = getMenuLink(); // array di helper
        $data['menuform']       = getMenuForm();// array class
        
        $data['listuser']       = $this->db->get_where('user',["nama_user !=" => NULL])->result_array();
        $data['listseksi']      = $this->modeladmin->getData('seksi',0);
        $data['listjabatan']    = $this->modeladmin->getData('jabatan',0);
        $data['listkecamatan']  = $this->modeladmin->getData('kecamatan',0);

        $this->form_validation->set_rules('nama_user','User','required'); // validation

        if ($this->form_validation->run() == FALSE) {
            // jika validation gagal maka dikembalikan ke halaman insert tadi
            $this->load->view('template_admin/header',$title);
            $this->load->view('template_admin/sidebar',$data);
            $this->load->view('template_admin/navbar');
            $this->load->view('admin/tambahdata/tambahuser');
            $this->load->view('template_admin/footer');
        }else{
            // jika validation sukses maka insert data
            $this->modeladmin->createData('user',4);
            $this->session->set_flashdata('pesan','Ditambah');
            redirect(base_url('user')); 
        }
    }

    public function addadmin() // DONE
    {
        
        if ($this->session->userdata('id_role') == 2) {
            redirect(base_url('admin'));
        }
        $title['judul']         = "Tambah Admin | BPS";

        $data['listmenu']       = getMenuLink(); // array di helper
        $data['menuform']       = getMenuForm(); // array di helper
        $data['listadmin']      = $this->modeladmin->getData('admin',0);
        // echo implode(" ",$data['hadeh']);die;
        $this->form_validation->set_rules('username','Username','required');

        if ($this->form_validation->run() == FALSE) {
            // jika validation gagal maka dikembalikan ke halaman insert tadi
            $this->load->view('template_admin/header',$title);
            $this->load->view('template_admin/sidebar',$data);
            $this->load->view('template_admin/navbar');
            $this->load->view('admin/tambahdata/tambahadmin', $data);
            $this->load->view('template_admin/footer');
        }else{
            // jika validation sukses maka insert data
            $data = $this->modeladmin->createData('admin',7);
            if ($data == true) {
                $this->session->set_flashdata('usernamesama','<div class="alert alert-danger" role="alert" dismiss="close">Username <strong>tidak boleh sama</strong></div>');
                redirect(base_url('addadmin'));
            }else{
                # code...
                $this->session->set_flashdata('pesan','Ditambah');
                redirect(base_url('addadmin'));
            }
        }
        
    }

    public function addpejabat() // DONE
    {
        $title['judul']     = "Tambah User | BPS";
        $data['listmenu']   = getMenuLink(); // array di helper
        $data['menuform']   = getMenuForm(); // array di helper

        $this->db->select('p.id_pejabat,s.nama_seksi,j.id_jabatan,j.nama_jabatan,p.id_seksi,p.nama_user');
        $this->db->join('seksi as s','s.id_seksi = p.id_seksi');
        $this->db->join('jabatan as j','j.id_jabatan = p.id_jabatan');
        $data['listpejabat']    = $this->db->get('pejabat as p')->result_array();

        $data['listseksi']      = $this->modeladmin->getData('seksi',0);
        $data['listjabatan']    = $this->modeladmin->getData('jabatan',0);

        $this->form_validation->set_rules('nama_user','Nama Anggota','required'); // validation

        if ($this->form_validation->run() == FALSE) {
            // jika validation gagal maka dikembalikan ke halaman insert tadi
            $this->load->view('template_admin/header',$title);
            $this->load->view('template_admin/sidebar',$data);
            $this->load->view('template_admin/navbar');
            $this->load->view('admin/tambahdata/tambahpejabat', $data);
            $this->load->view('template_admin/footer');
        }else{
            // jika validation sukses maka insert data
            $this->modeladmin->createData('pejabat',8);
            $this->session->set_flashdata('pesan','Ditambah');
            redirect(base_url('pejabat')); 
        }
    }

    /*  Fungsi edit
    1 = seksi, 2 = mitra, 3 = user, 4 = kegiatan, 5 = jabatan, 6 = admin, 7 = pejabat   */
    public function editseksi($id)
    {
        if (!$id) {
            redirect(base_url('seksi'));
        }
        $title['judul']     = "Edit Seksi  | BPS";
        $data['listmenu']   = getMenuLink(); // array di helper
        $data['menuform'] = getMenuForm();// array class
        $data['listseksi']  = $this->modeladmin->getData('seksi',$id);
        $data['allseksi']   = $this->modeladmin->getData('seksi',0);

        $this->form_validation->set_rules('nama_seksi','Nama seksi','required'); // validation

        if ($this->form_validation->run() == FALSE) {
            // jika validation gagal maka dikembalikan ke halaman insert tadi
            $this->load->view('template_admin/header',$title);
            $this->load->view('template_admin/sidebar',$data);
            $this->load->view('template_admin/navbar');
            $this->load->view('admin/editdata/editseksi', $data);
            $this->load->view('template_admin/footer');
        }else{
            // jika validation sukses maka insert data
            $this->modeladmin->updateData('seksi',1,$id);
            $this->session->set_flashdata('pesan','Diubah');
            redirect(base_url('seksi')); 
        }
    }

    public function editmitra($id) // DONE
    {
        if (!$id) {
            redirect(base_url('mitra'));
        }
        $title['judul']     = "Edit Mitra  | BPS";
        $data['listmenu']   = getMenuLink(); // array di helper
        $data['menuform'] = getMenuForm();// array class
        $data['listmitra']  = $this->modeladmin->getData('mitra',$id);
        $data['allmitra']   = $this->modeladmin->getData('mitra',0);

        $this->form_validation->set_rules('nama_mitra','Nama Mitra','required'); // validation

        if ($this->form_validation->run() == FALSE) {
            // jika validation gagal maka dikembalikan ke halaman insert tadi
            $this->load->view('template_admin/header',$title);
            $this->load->view('template_admin/sidebar',$data);
            $this->load->view('template_admin/navbar');
            $this->load->view('admin/editdata/editmitra', $data);
            $this->load->view('template_admin/footer');
        }else{
            // jika validation sukses maka insert data
            $this->modeladmin->updateData('mitra',2,$id);
            $this->session->set_flashdata('pesan','Diubah');
            redirect(base_url('mitra')); 
        }
        
    }

    public function edituser($id)
    {
        if (!$id) {
            redirect(base_url('user'));
        }
        $title['judul']     = "Edit User  | BPS";
        $data['listmenu']   = getMenuLink(); // array di helper
        $data['menuform'] = getMenuForm();// array class
        $data['listuser']  = $this->modeladmin->getData('user',$id);
        $data['listkec']   = $this->modeladmin->getData('kecamatan',0);
        // SELECT k.nama_kecamatan,u.nama_user  FROM user as u 
// inner join kecamatan as k 
// on k.id_kecamatan = u.id_kecamatan
// where u.id_user = 5
        $this->db->select('u.id_user,k.nama_kecamatan,u.nama_user');
        $this->db->join('kecamatan as k','k.id_kecamatan = u.id_kecamatan');
        $data['alluserkec'] = $this->db->get('user as u')->result_array();
        // $data['alluser']   = $this->modeladmin->getData('user',0);

        $this->form_validation->set_rules('nama_user','Nama user','required'); // validation

        if ($this->form_validation->run() == FALSE) {
            // jika validation gagal maka dikembalikan ke halaman insert tadi
            $this->load->view('template_admin/header',$title);
            $this->load->view('template_admin/sidebar',$data);
            $this->load->view('template_admin/navbar');
            $this->load->view('admin/editdata/edituser', $data);
            $this->load->view('template_admin/footer');
        }else{
            // jika validation sukses maka insert data
            $this->modeladmin->updateData('user',3,$id);
            $this->session->set_flashdata('pesan','Diubah');
            redirect(base_url('user')); 
        }
    }









    
    public function getData($id_kegiatan,$id_user)
    {
        // echo " ID kegiatan = $id , TOTAL relasisasi YAITU = ".implode(" ",total_realisasi($id));
        $data = target_user($id_kegiatan, $id_user);
        if ($data ==  false) {
            echo "data kosong";
        }
        // echo $data;
        echo json_encode(target_user($id_kegiatan, $id_user));
    }



    /*  Fungsi delete
    1 = seksi, 2 = mitra, 3 = user, 4 = kegiatan, 5 = jabatan, 6 = admin, 7 = pejabat   */
    public function deleteSeksi($id = null) // DONE
    {
        if ($id == null) {
            redirect(base_url('seksi'));
        }
        $this->modeladmin->deleteData('seksi',1,$id);
        $this->session->set_flashdata('pesan','Dihapus');
    }

    public function deleteMitra($id = null) // DONE
    {
        if ($id == null) {
            redirect(base_url('mitra'));
        }
        $this->modeladmin->deleteData('mitra',2,$id);
        $this->session->set_flashdata('pesan','Dihapus');
    }
    
    public function deleteUser($id = null) // DONE
    {
        if ($id == null) {
            redirect(base_url('user'));
        }
        $this->modeladmin->deleteData('user',3,$id);
        $this->session->set_flashdata('pesan','Dihapus');
    }

    public function deleteKegiatan($id = null)
    {
        if (!$id) {
            $data = array('status' => false , 'messages' => 'no results from database' );
            echo json_encode($data);
        }else{
            $data = $this->modeladmin->deleteData('kegiatan',4,$id);
            if ($data == true) {
                $this->session->set_flashdata('hapus','Berhasil dihapus');
                redirect(base_url('kegiatan'));
            }else{
                echo "data gagal dihapus";
            }
        }
    }

    public function deleteJabatan($id = null) // DONE
    {
        if ($id == null) {
            redirect(base_url('jabatan'));
        }
        $this->modeladmin->deleteData('jabatan',5,$id);
        $this->session->set_flashdata('pesan','Dihapus');
    }

    public function deleteAdmin($id = null) // DONE
    {
        if ($id == null) {
            redirect(base_url('addadmin'));
        }
        $this->modeladmin->deleteData('admin',6,$id);
        $this->session->set_flashdata('pesan','Dihapus');
    }

    public function deletePejabat($id = null) // DONE
    {
        if ($id == null) {
            redirect(base_url('pejabat'));
        }
        $this->modeladmin->deleteData('pejabat',7,$id);
        $this->session->set_flashdata('pesan','Dihapus');
    }

    
}
