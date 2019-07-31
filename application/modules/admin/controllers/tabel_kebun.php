<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tabel_kebun extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Tabel_kebun_model');
        $this->load->library('form_validation');
    }

    public function index()
    {

      $datatabel_kebun=$this->Tabel_kebun_model->get_all();//panggil ke modell
      $datafield=$this->Tabel_kebun_model->get_field();//panggil ke modell

      $data = array(
        'contain_view' => 'admin/tabel_kebun/tabel_kebun_list',
        'sidebar'=>'admin/sidebar',
        'css'=>'admin/crudassets/css',
        'script'=>'admin/crudassets/script',
        'datatabel_kebun'=>$datatabel_kebun,
        'datafield'=>$datafield,
        'module'=>'admin',
        'titlePage'=>'tabel_kebun',
        'controller'=>'tabel_kebun'
       );
      $this->template->load($data);
    }


    public function create(){
      $data = array(
        'contain_view' => 'admin/tabel_kebun/tabel_kebun_form',
        'sidebar'=>'admin/sidebar',//Ini buat menu yang ditampilkan di module admin {DIKIRIM KE TEMPLATE}
        'css'=>'admin/crudassets/css',//Ini buat kirim css dari page nya  {DIKIRIM KE TEMPLATE}
        'script'=>'admin/crudassets/script',//ini buat javascript apa aja yang di load di page {DIKIRIM KE TEMPLATE}
        'action'=>'admin/tabel_kebun/create_action',
        'module'=>'admin',
        'titlePage'=>'tabel_kebun',
        'controller'=>'tabel_kebun'
       );
      $this->template->load($data);
    }

    public function edit($id){
      $dataedit=$this->Tabel_kebun_model->get_by_id($id);
      $data = array(
        'contain_view' => 'admin/tabel_kebun/tabel_kebun_edit',
        'sidebar'=>'admin/sidebar',//Ini buat menu yang ditampilkan di module admin {DIKIRIM KE TEMPLATE}
        'css'=>'admin/crudassets/css',//Ini buat kirim css dari page nya  {DIKIRIM KE TEMPLATE}
        'script'=>'admin/crudassets/script',//ini buat javascript apa aja yang di load di page {DIKIRIM KE TEMPLATE}
        'action'=>'admin/tabel_kebun/update_action',
        'dataedit'=>$dataedit,
        'module'=>'admin',
        'titlePage'=>'tabel_kebun',
        'controller'=>'tabel_kebun'
       );
      $this->template->load($data);
    }


    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nama_tanaman' => $this->input->post('nama_tanaman',TRUE),
		'cara_menanam' => $this->input->post('cara_menanam',TRUE),
		'gambar_tanaman' => $this->input->post('gambar_tanaman',TRUE),
		'jenis_tanaman' => $this->input->post('jenis_tanaman',TRUE),
		'harga_bibit' => $this->input->post('harga_bibit',TRUE),
	    );

            $this->Tabel_kebun_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('admin/tabel_kebun'));
        }
    }



    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->edit($this->input->post('id_kebun', TRUE));
        } else {
            $data = array(
		'nama_tanaman' => $this->input->post('nama_tanaman',TRUE),
		'cara_menanam' => $this->input->post('cara_menanam',TRUE),
		'gambar_tanaman' => $this->input->post('gambar_tanaman',TRUE),
		'jenis_tanaman' => $this->input->post('jenis_tanaman',TRUE),
		'harga_bibit' => $this->input->post('harga_bibit',TRUE),
	    );

            $this->Tabel_kebun_model->update($this->input->post('id_kebun', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('admin/tabel_kebun'));
        }
    }

    public function delete($id)
    {
        $row = $this->Tabel_kebun_model->get_by_id($id);

        if ($row) {
            $this->Tabel_kebun_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('admin/tabel_kebun'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/tabel_kebun'));
        }
    }

    public function _rules()
    {
	$this->form_validation->set_rules('nama_tanaman', 'nama tanaman', 'trim|required');
	$this->form_validation->set_rules('cara_menanam', 'cara menanam', 'trim|required');
	$this->form_validation->set_rules('gambar_tanaman', 'gambar tanaman', 'trim|required');
	$this->form_validation->set_rules('jenis_tanaman', 'jenis tanaman', 'trim|required');
	$this->form_validation->set_rules('harga_bibit', 'harga bibit', 'trim|required');

	$this->form_validation->set_rules('id_kebun', 'id_kebun', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}
