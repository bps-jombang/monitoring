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
        $data['listmenu']   = getMenuLink();    

        $this->load->view('template_admin/header',$title);
        $this->load->view('template_admin/sidebar',$data);
        $this->load->view('template_admin/navbar');
        $this->load->view('admin/index');
        $this->load->view('template_admin/footer');
    }

    public function tes()
    {
        $title['judul'] = "List Kegiatan | BPS";

        $semuakegiatan          = $this->modeladmin->readData('kegiatan',0);
        $data['semuakegiatan']  = json_encode($semuakegiatan);

        $listuser               = getUserKecamatan(); // join 3 tabel
        $data['listuser']       = json_encode($listuser);
        
        $listpejabat            = getPejabatDetail();// join 3 tabel
        $data['listpejabat']    = json_encode($listpejabat);

        $data['listmitra']      = json_encode($this->modeladmin->readData('mitra',0));
        $data['listmenu']       = getMenuLink();    
        $data['menuform']       = getMenuForm();

        $this->load->view('template_admin/header',$title);
        $this->load->view('template_admin/sidebar',$data);
        $this->load->view('template_admin/navbar');
        $this->load->view('admin/tes');
        $this->load->view('template_admin/footer');
    }

    public function dataKegiatan()
    {
        $title['judul'] = "List Kegiatan | BPS";

        $data['semuakegiatan'] = $this->modeladmin->readData('kegiatan',0);
        $data['listmitra'] = $this->modeladmin->readData('mitra',0);
        //SELECT k.nama_kecamatan,u.nama_user FROM user as u INNER JOIN kecamatan as k ON k.id_kecamatan = u.id_kecamatan
        $this->db->select('u.id_user,k.nomor_kecamatan,k.nama_kecamatan,u.nama_user');
        $this->db->join('kecamatan as k','k.id_kecamatan = u.id_kecamatan');
        $data['listuser'] = $this->db->get('user as u')->result_array();

        $listuser = $this->db->get('user as u')->result_array();
        
        $data['kegiatan_detail'] = $this->modeladmin->readData('kegiatan_detail',0);

        $this->db->select('j.id_jabatan,j.nama_jabatan,s.nama_seksi,p.nama_user,p.id_pejabat');
        $this->db->join('jabatan as j','j.id_jabatan = p.id_jabatan');
        $this->db->join('seksi as s','s.id_seksi = p.id_seksi');
        $this->db->group_by('p.id_pejabat');
        $data['listpejabat'] = $this->db->get('pejabat as p')->result_array();

        // $data['mitra'] = $this->db->get('mitra')->result_array();
        $data['listmenu']   = getMenuLink();    
        $data['menuform'] = getMenuForm();
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

        $data['listmenu']   = getMenuLink();    
        $data['menuform']   = getMenuForm();

        $this->db->select('u.id_user,k.id_kegiatan,kd.id_kegiatan_detail,k.uraian_kegiatan,u.nama_user,kd.target,kd.realisasi,kd.target');
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

    /*Fungsi create
    1 = seksi, 2 = mitra, 3 = jabatan, 4 = user, 5 = kegiatan,  6 = kegiatan detail, 7 = admin, 8 = pejabat */
    public function addseksi() // DONE
    {   
        $data['judul']          = "Tambah Seksi | BPS";
        $data['listmenu']       = getMenuLink();       
        $data['menuform']       = getMenuForm();    

        $data['listseksi']      = $this->modeladmin->readData('seksi',0);
        
        $this->form_validation->set_rules('nama_seksi','Nama Seksi','required'); 

        if ($this->form_validation->run() == FALSE) { 
            $this->load->view('template_admin/header',$data);
            $this->load->view('template_admin/sidebar',$data);
            $this->load->view('template_admin/navbar');
            $this->load->view('admin/tambahdata/tambahseksi');
            $this->load->view('template_admin/footer',$data);
        }else{
            $this->modeladmin->createData('seksi',1);
            $this->session->set_flashdata('pesan','Ditambah');
            redirect(base_url('seksi')); 
        } 
    }

    public function addmitra()// DONE
    {
        $title['judul']         = "Tambah Mitra  | BPS";
        $data['listmenu']       = getMenuLink();       
        $data['menuform']       = getMenuForm();    

        $data['listmitra']      = $this->modeladmin->readData('mitra',0);
        
        $this->form_validation->set_rules('nama_mitra','Mitra','required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template_admin/header',$title);
            $this->load->view('template_admin/sidebar',$data);
            $this->load->view('template_admin/navbar');
            $this->load->view('admin/tambahdata/tambahmitra');
            $this->load->view('template_admin/footer');
        }else{
            $this->modeladmin->createData('mitra',2);
            $this->session->set_flashdata('pesan','Ditambah');
            redirect(base_url('mitra')); 
        }
    }

    public function addjabatan() // DONE
    {
        $title['judul']         = "Tambah Jabatan | BPS";
        $data['listmenu']       = getMenuLink();    
        $data['menuform']       = getMenuForm();    

        $data['listjabatan']    = $this->modeladmin->readData('jabatan',0);

        $this->form_validation->set_rules('nama_jabatan','Jabatan','required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template_admin/header',$title);
            $this->load->view('template_admin/sidebar',$data);
            $this->load->view('template_admin/navbar');
            $this->load->view('admin/tambahdata/tambahjabatan');
            $this->load->view('template_admin/footer');
        }else{
            $this->modeladmin->createData('jabatan',3);
            $this->session->set_flashdata('pesan','Ditambah');
            redirect(base_url('jabatan')); 
        }
    }

    public function adduser() // DONE
    {
        $title['judul']         = "Tambah User | BPS";
        $data['listmenu']       = getMenuLink();
        $data['menuform']       = getMenuForm();
        
        $data['listuser']       = $this->db->get_where('user',["nama_user !=" => NULL])->result_array();
        $data['listseksi']      = $this->modeladmin->readData('seksi',0);
        $data['listjabatan']    = $this->modeladmin->readData('jabatan',0);
        $data['listkecamatan']  = $this->modeladmin->readData('kecamatan',0);

        $this->form_validation->set_rules('nama_user','User','required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template_admin/header',$title);
            $this->load->view('template_admin/sidebar',$data);
            $this->load->view('template_admin/navbar');
            $this->load->view('admin/tambahdata/tambahuser');
            $this->load->view('template_admin/footer');
        }else{
            $this->modeladmin->createData('user',4);
            $this->session->set_flashdata('pesan','Ditambah');
            redirect(base_url('user')); 
        }
    }

    public function addkegiatan() // DONE
    {
        $title['judul']         = "Tambah Kegiatan | BPS";
        $data['listmenu']       = getMenuLink(); 
        $data['menuform']       = getMenuForm();

        $data['listseksi']      = $this->modeladmin->readData('seksi',0);
        $data['listkeg']        = $this->modeladmin->readData('kegiatan',0);
        $data['listuser']       = $this->db->get_where('user',["nama_user !=" => NULL])->result_array();
        
        $this->db->select('k.id_kegiatan,k.uraian_kegiatan,s.nama_seksi,k.vol,k.target_penyelesaian');
        $this->db->join('seksi as s','s.id_seksi = k.id_seksi');
        $this->db->order_by('k.id_kegiatan','ASC');
        $data['allkegsek'] = $this->db->get('kegiatan as k')->result_array();

        $this->form_validation->set_rules('nama_kegiatan','Kegiatan','required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template_admin/header',$title);
            $this->load->view('template_admin/sidebar',$data);
            $this->load->view('template_admin/navbar');
            $this->load->view('admin/tambahdata/tambahkegiatan');
            $this->load->view('template_admin/footer');
        }else{
            $this->modeladmin->createData('kegiatan',5);
            $this->session->set_flashdata('pesan','Ditambah');
            redirect(base_url('kegiatan')); 
        }
    }

    public function addtargetuser() // AS KEGIATAN DETAIL = DONE
    {
        $title['judul']         = "Tambah Targget User | BPS";
        $data['listmenu']       = getMenuLink(); 
        $data['menuform']       = getMenuForm();
        $data['listpejabat']    = getPejabatDetail();

        $data['listkecamatan']  = $this->modeladmin->readData('kecamatan',0);
        $this->db->select('u.id_user,k.nama_kecamatan,u.nama_user');
        $this->db->join('kecamatan as k','k.id_kecamatan = u.id_kecamatan');
        $data['userkec'] = $this->db->get_where('user as u',["u.nama_user !=" => NULL])->result_array();
        $data['listkegiatan']   = $this->modeladmin->readData('kegiatan',0);

        $this->load->view('template_admin/header',$title);
        $this->load->view('template_admin/sidebar',$data);
        $this->load->view('template_admin/navbar');
        $this->load->view('admin/tambahdata/tambahtarget');
        $this->load->view('template_admin/footer');
        
        if ($this->input->post()) {
            $this->modeladmin->createData('kegiatan_detail',6);
            $this->session->set_flashdata('pesan','Ditambah');
            redirect(base_url('targetuser'));
        }
    }

    public function addadmin() // DONE
    {
        if ($this->session->userdata('id_role') == 2) {
            redirect(base_url('admin'));
        }
        $title['judul']         = "Tambah Admin | BPS";
        $data['listmenu']       = getMenuLink(); 
        $data['menuform']       = getMenuForm(); 

        $data['listadmin']      = $this->modeladmin->readData('admin',0);

        $this->form_validation->set_rules('username','Username','required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template_admin/header',$title);
            $this->load->view('template_admin/sidebar',$data);
            $this->load->view('template_admin/navbar');
            $this->load->view('admin/tambahdata/tambahadmin', $data);
            $this->load->view('template_admin/footer');
        }else{
            $data = $this->modeladmin->createData('admin',7);
            if ($data == true) {
                $this->session->set_flashdata('usernamesama','<div class="alert alert-danger" role="alert" dismiss="close">Username <strong>tidak boleh sama</strong></div>');
                redirect(base_url('addadmin'));
            }else{
                $this->session->set_flashdata('pesan','Ditambah');
                redirect(base_url('addadmin'));
            }
        }
        
    }

    public function addpejabat() // DONE
    {
        $title['judul']         = "Tambah User | BPS";
        $data['listmenu']       = getMenuLink(); 
        $data['menuform']       = getMenuForm(); 
        $data['listpejabat']    = getPejabatDetail();

        $data['listseksi']      = $this->modeladmin->readData('seksi',0);
        $data['listjabatan']    = $this->modeladmin->readData('jabatan',0);

        // $data['allpejabat']     = getPejabatDetail();
        // $data['listpejabat']    = $this->modeladmin->readData('pejabat',$id);
        // $data['listseksi']      = $this->modeladmin->readData('seksi',0);
        // $data['listjabatan']    = $this->modeladmin->readData('jabatan',0);

        $this->form_validation->set_rules('nama_user','Nama Anggota','required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template_admin/header',$title);
            $this->load->view('template_admin/sidebar',$data);
            $this->load->view('template_admin/navbar');
            $this->load->view('admin/tambahdata/tambahpejabat', $data);
            $this->load->view('template_admin/footer');
        }else{
            $this->modeladmin->createData('pejabat',8);
            $this->session->set_flashdata('pesan','Ditambah');
            redirect(base_url('pejabat')); 
        }
    }


    /*  Fungsi edit
    1 = seksi, 2 = mitra, 3 = user, 4 = kegiatan, 5 = jabatan, 6 = Kegiatan Detail, 7 = pejabat, 8 = Admin   */
    public function updateseksi($id) // DONE 1 WITH MODAL BOOTSTRAP
    {
        if (is_numeric($id) == FALSE || !$id) {
            redirect(base_url('seksi'));
        }
        $query      =   $this->modeladmin->updateData('seksi',1,$id);
        if ($query) {
            $this->session->set_flashdata('pesan','Diubah');
            redirect(base_url('seksi'));
        }
    }

    public function updatemitra($id) // DONE 2 WITH MODAL BOOTSTRAP
    {
        if (is_numeric($id) == FALSE || !$id) {
            redirect(base_url('mitra'));
        }
        $query      =   $this->modeladmin->updateData('mitra',2,$id);
        if ($query) {
            $this->session->set_flashdata('pesan','Diubah');
            redirect(base_url('mitra'));
        }
    }

    public function edituser($id) // DONE
    {
        if (is_numeric($id) == FALSE || !$id) {
            redirect(base_url('user'));
        }
        $title['judul']     = "Edit User  | BPS";
        $data['listmenu']   = getMenuLink(); 
        $data['menuform']   = getMenuForm();
        $data['alluserkec'] = getUserKecamatan();

        $data['listuser']   = $this->modeladmin->readData('user',$id);
        $data['listkec']    = $this->modeladmin->readData('kecamatan',0);        

        $this->form_validation->set_rules('nama_user','Nama user','required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template_admin/header',$title);
            $this->load->view('template_admin/sidebar',$data);
            $this->load->view('template_admin/navbar');
            $this->load->view('admin/editdata/edituser', $data);
            $this->load->view('template_admin/footer');
        }else{
            $this->modeladmin->updateData('user',3,$id);
            $this->session->set_flashdata('pesan','Diubah');
            redirect(base_url('user')); 
        }
    }

    public function editkegiatan($id) // DONE
    {
        if (is_numeric($id) == FALSE || !$id) {
            redirect(base_url('kegiatan'));
        }
        $title['judul']         = "Edit Kegiatan  | BPS";
        $data['listmenu']       = getMenuLink(); 
        $data['menuform']       = getMenuForm();
        $data['allkegsek']      = getSeksiKegiatan();

        $data['listkegiatan']   = $this->modeladmin->readData('kegiatan',$id);
        $data['listseksi']      = $this->modeladmin->readData('seksi',0);
        $data['allkeg']         = $this->modeladmin->readData('kegiatan',0);


        $this->form_validation->set_rules('nama_kegiatan','Nama Kegiatan','required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template_admin/header',$title);
            $this->load->view('template_admin/sidebar',$data);
            $this->load->view('template_admin/navbar');
            $this->load->view('admin/editdata/editkegiatan', $data);
            $this->load->view('template_admin/footer');
        }else{
            $this->modeladmin->updateData('kegiatan',4,$id);
            $this->session->set_flashdata('pesan','Diubah');
            redirect(base_url('kegiatan')); 
        }
    }

    public function updatejabatan($id) // DONE 5 WITH MODAL BOOTSTRAP
    {
        if (is_numeric($id) == FALSE || !$id) {
            redirect(base_url('jabatan'));
        }
        $query      =   $this->modeladmin->updateData('jabatan',5,$id);
        if ($query) {
            $this->session->set_flashdata('pesan','Diubah');
            redirect(base_url('jabatan'));
        }
    }
    
    public function updatedetailuser($id) // DONE 6 AS KEGIATAN DETAIL WITH MODAL BOOTSTRAP
    {
        $id_user    =   $this->input->post('iduser');
        $query      =   $this->modeladmin->updateData('kegiatan_detail',6,$id);
        if ($query) {
            $this->session->set_flashdata('pesan','Diubah');
            redirect(base_url('detailkegiatan/'.$id_user));
        }
    }

    public function editpejabat($id)// DONE
    {
        if (is_numeric($id) == FALSE || !$id) {
            redirect(base_url('pejabat'));
        }
        $title['judul']         = "Edit Pejabat  | BPS";
        $data['listmenu']       = getMenuLink(); 
        $data['menuform']       = getMenuForm();
        $data['allpejabat']     = getPejabatDetail();

        $data['listpejabat']    = $this->modeladmin->readData('pejabat',$id);
        $data['listseksi']      = $this->modeladmin->readData('seksi',0);
        $data['listjabatan']    = $this->modeladmin->readData('jabatan',0);

        $this->form_validation->set_rules('nama_pejabat','Nama Pejabat','required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template_admin/header',$title);
            $this->load->view('template_admin/sidebar',$data);
            $this->load->view('template_admin/navbar');
            $this->load->view('admin/editdata/editpejabat', $data);
            $this->load->view('template_admin/footer');
        }else{
            $this->modeladmin->updateData('pejabat',7,$id);
            $this->session->set_flashdata('pesan','Diubah');
            redirect(base_url('pejabat'));
        }
    }

    public function editadmin($id) // PENDING
    {
        if (is_numeric($id) == FALSE || !$id) {
            redirect(base_url('addadmin'));
        }
        $title['judul']     = "Edit Admin  | BPS";
        $data['listmenu']   = getMenuLink(); 
        $data['menuform']   = getMenuForm();

        $data['listadmin']  = $this->modeladmin->readData('admin',$id);
        $data['alladmin']   = $this->modeladmin->readData('admin',0);

        $this->form_validation->set_rules('nama_seksi','Nama seksi','required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template_admin/header',$title);
            $this->load->view('template_admin/sidebar',$data);
            $this->load->view('template_admin/navbar');
            $this->load->view('admin/editdata/editadmin', $data);
            $this->load->view('template_admin/footer');
        }else{
            $this->modeladmin->updateData('admin',X,$id);
            $this->session->set_flashdata('pesan','Diubah');
            redirect(base_url('addadmin')); 
        }
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

    public function deleteKegiatan($id = null) // DONE
    {
        if ($id == null) {
            redirect(base_url('user'));
        }
        $this->modeladmin->deleteData('kegiatan',4,$id);
        $this->session->set_flashdata('pesan','Dihapus');
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
