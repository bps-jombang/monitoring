<?php
use PhpOffice\PhpSpreadsheet\Spreadsheet;

class Admin extends CI_Controller
{
    
    public function __construct() 
    { 
        parent::__construct(); 
        // ini_set('memory_limit', '2048M');
        
        $this->load->library('form_validation');
        $this->load->model(['Model_admin' => 'modeladmin','Model_login' => 'modellogin']);
        $this->load->helper(['admin_helper','download','date']);

        if (!$this->session->userdata('username')) {
            redirect(base_url('loginadmin'));
        }
    }

    public function index() // DONE
    {
        $title['judul']         = "BPS";
        $data['listmenu']       = getMenuLink(); 

        $data['sumtarget']      = $this->db->select('SUM(target)')->get('kegiatan_detail')->row_array();
        $data['sumvol']         = $this->db->select('SUM(vol)')->get('kegiatan')->row_array();
        $data['sumrealisasi']   = $this->db->select('SUM(realisasi)')->get('kegiatan_detail')->row_array();
        $data['sumseksi']       = $this->db->select('COUNT(nama_seksi)')->get('seksi')->row_array();

        $this->load->view('template_admin/header',$title);
        $this->load->view('template_admin/sidebar',$data);
        $this->load->view('template_admin/navbar');
        $this->load->view('admin/index');
        $this->load->view('template_admin/footer');
    }

    public function exportexcel()// DONE
    {
        $title['judul'] = "List Kegiatan | BPS";

        $data['listmenu']       = getMenuLink();    
        $data['menuform']       = getMenuForm();
        $this->db->select('s.id_seksi,s.nama_seksi,k.id_kegiatan,k.uraian_kegiatan,k.vol,k.satuan,k.target_penyelesaian,k.keterangan');
        $this->db->join('seksi as s','s.id_seksi = k.id_seksi');
        $this->db->group_by('k.id_kegiatan','ASC');
        $semuakegiatan = $this->db->get('kegiatan as k')->result_array();
        // echo json_encode($semuakegiatan);die;
        // $semuakegiatan          = $this->modeladmin->readData('kegiatan',0);
        $data['semuakegiatan']  = json_encode($semuakegiatan);

        $listuser               = getUserKecamatan(); // join 3 tabel
        $data['listuser']       = json_encode($listuser);
        
        $listpejabat            = getPejabatDetail();// join 3 tabel
        $data['listpejabat']    = json_encode($listpejabat);

        $listmitra              = $this->modeladmin->readData('mitra',0);
        $data['listmitra']      = json_encode($this->modeladmin->readData('mitra',0));
        

        $this->load->view('template_admin/header',$title);
        $this->load->view('template_admin/sidebar',$data);
        $this->load->view('template_admin/navbar');
        $this->load->view('admin/export');
        $this->load->view('template_admin/footer');
    }

    public function dataKegiatan()// DONE
    {
        $title['judul'] = "List Kegiatan | BPS";

        $data['listmenu']       = getMenuLink();    
        $data['menuform']       = getMenuForm();

        
        $semuakegiatan          = $this->modeladmin->readData('kegiatan',0);
        $data['semuakegiatan']  = json_encode($semuakegiatan);

        $listuser               = getUserKecamatan(); // join 3 tabel
        $data['listuser']       = json_encode($listuser);
        
        $listpejabat            = getPejabatDetail();// join 3 tabel
        $data['listpejabat']    = json_encode($listpejabat);

        $listmitra              = $this->modeladmin->readData('mitra',0);
        $data['listmitra']      = json_encode($this->modeladmin->readData('mitra',0));
        

        $this->load->view('template_admin/header',$title);
        $this->load->view('template_admin/sidebar',$data);
        $this->load->view('template_admin/navbar');
        $this->load->view('admin/datakegiatan');
        $this->load->view('template_admin/footer');
    }

    public function detailKegiatanUser($id,$str = null)// DONE
    {
        if (!$id) {
            redirect(base_url('listkegiatan'));
        }
        $title['judul']     = "Kegiatan Detail User | BPS";

        $data['listmenu']   = getMenuLink();    
        $data['menuform']   = getMenuForm();

        if ($str == "user") {
            $this->db->select('u.id_user,kd.id_kegiatan_detail,k.uraian_kegiatan,kd.target,kd.realisasi,kd.target');
            $this->db->join('user as u','u.id_user = kd.id_user');
            $this->db->join('kegiatan as k','k.id_kegiatan = kd.id_kegiatan');
            $data['kegiatandetail']     = $this->db->get_where('kegiatan_detail as kd',["kd.id_user" => $id])->result_array();
            $this->db->select('k.nama_kecamatan,u.nama_user');
            $this->db->join('kecamatan as k','k.id_kecamatan = u.id_kecamatan');
            $data['userdetail']         = $this->db->get_where('user as u',["u.id_user" => $id])->result_array();

        }elseif($str == "pejabat"){
            $this->db->select('p.id_pejabat,kd.id_kegiatan_detail,k.uraian_kegiatan,p.nama_user,kd.realisasi,kd.target');
            $this->db->join('pejabat as p','p.id_pejabat = kd.id_pejabat');
            $this->db->join('kegiatan as k','k.id_kegiatan = kd.id_kegiatan');
            $data['kegiatandetail']     = $this->db->get_where('kegiatan_detail as kd',["kd.id_pejabat" => $id])->result_array();
            
            $this->db->select('p.nama_user,s.nama_seksi,j.nama_jabatan');
            $this->db->join('seksi as s','s.id_seksi = p.id_seksi');
            $this->db->join('jabatan as j','j.id_jabatan = p.id_jabatan');
            $data['pejabatdetail']         = $this->db->get_where('pejabat as p',["p.id_pejabat" => $id])->result_array();

        }elseif($str == "mitra"){
            $this->db->select('m.id_mitra,kd.id_kegiatan_detail,k.uraian_kegiatan,m.nama_mitra,kd.realisasi,kd.target');
            $this->db->join('mitra as m','m.id_mitra = kd.id_mitra');
            $this->db->join('kegiatan as k','k.id_kegiatan = kd.id_kegiatan');
            $data['kegiatandetail'] = $this->db->get_where('kegiatan_detail as kd',["kd.id_mitra" => $id])->result_array();
            
            $data['mitradetail']    = $this->db->get_where('mitra',["id_mitra" => $id])->result_array();
            // var_dump($data['mitradetail']);die;
        }else{

            redirect(base_url('Admin/tes'));
        }

        $this->load->view('template_admin/header',$title);
        $this->load->view('template_admin/sidebar',$data);
        $this->load->view('template_admin/navbar');
        $this->load->view('admin/detailuser');
        $this->load->view('template_admin/footer');

        // if (($data['userdetail'] != NULL) ||  ($data['pejabatdetail'] != NULL)) {
        //     $this->load->view('template_admin/header',$title);
        //     $this->load->view('template_admin/sidebar',$data);
        //     $this->load->view('template_admin/navbar');
        //     $this->load->view('admin/detailuser');
        //     $this->load->view('template_admin/footer');
        // } else {
        //     redirect(base_url('admin'));
        // }
        
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

        $this->db->select('u.id_user,k.nama_kecamatan,u.nama_user');
        $this->db->join('kecamatan as k','k.id_kecamatan = u.id_kecamatan');
        $data['userkec']        = $this->db->get_where('user as u',["u.nama_user !=" => NULL])->result_array();
        $data['listkegiatan']   = $this->modeladmin->readData('kegiatan',0);
        $data['listkecamatan']  = $this->modeladmin->readData('kecamatan',0);
        $data['listmitra']      = $this->modeladmin->readData('mitra',0);

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
            redirect(base_url('home'));
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
                redirect(base_url('admin'));
            }else{
                $this->session->set_flashdata('pesan','Ditambah');
                redirect(base_url('admin'));
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
        $id_user        =   $this->input->post('iduser');
        $query          =   $this->modeladmin->updateData('kegiatan_detail',6,$id);
        if ($query) {
            $this->session->set_flashdata('pesan','Diubah');
            redirect(base_url('detailkegiatan/'.$id_user.'/user'));
        }
    }
    public function updatedetailpejabat($id) // DONE 6 AS KEGIATAN DETAIL WITH MODAL BOOTSTRAP
    {
        $id_pejabat     =   $this->input->post('idpejabat');
        $query          =   $this->modeladmin->updateData('kegiatan_detail',6,$id);
        if ($query) {
            $this->session->set_flashdata('pesan','Diubah');
            redirect(base_url('detailkegiatan/'.$id_pejabat.'/pejabat'));
        }
    }
    public function updatedetailmitra($id) // DONE 6 AS KEGIATAN DETAIL WITH MODAL BOOTSTRAP
    {
        $id_mitra       =   $this->input->post('idmitra');
        $query          =   $this->modeladmin->updateData('kegiatan_detail',6,$id);
        if ($query) {
            $this->session->set_flashdata('pesan','Diubah');
            redirect(base_url('detailkegiatan/'.$id_mitra.'/mitra'));
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

    public function resetadmin() // UPDATE ADMIN DONE Modal
    {
        $id         =   $this->input->post('idadmin');
        $query      =   $this->modeladmin->updateData('admin',8,$id);
        if ($query) {
            $this->session->set_flashdata('pesan','Diubah');
            redirect(base_url('admin'));
        }
    }

    /*  Fungsi delete
    1 = seksi, 2 = mitra, 3 = user, 4 = kegiatan, 5 = jabatan, 6 = admin, 7 = pejabat , 8 = Kegiatan detail   */
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
            redirect(base_url('admin'));
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

    public function deleteKegiatanDetail($id = null) // DONE
    {
        if ($id == null) {
            redirect(base_url('Admin/tes'));
        }
        $this->modeladmin->deleteData('kegiatan_detail',8,$id);
        $this->session->set_flashdata('pesan','Dihapus');
    }

    public function deleteallkegiatan()// DONE
    {
        $this->db->empty_table('kegiatan'); 
        $check      = $this->modeladmin->readData('kegiatan',0);
        if($check < 0){
            $this->db->delete('kegiatan_detail');
            $this->session->set_flashdata('pesan','Dihapus');
        }
    }
    
}
