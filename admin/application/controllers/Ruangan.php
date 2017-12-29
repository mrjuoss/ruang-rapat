<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Ruangan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Ruangan_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template','ruangan/ruangan_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Ruangan_model->json();
    }

    public function read($id) 
    {
        $row = $this->Ruangan_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_ruangan' => $row->id_ruangan,
		'nama_ruang' => $row->nama_ruang,
		'lokasi' => $row->lokasi,
		'kapasitas' => $row->kapasitas,
	    );
            $this->template->load('template','ruangan/ruangan_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('ruangan'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('ruangan/create_action'),
	    'id_ruangan' => set_value('id_ruangan'),
	    'nama_ruang' => set_value('nama_ruang'),
	    'lokasi' => set_value('lokasi'),
	    'kapasitas' => set_value('kapasitas'),
	);
        $this->template->load('template','ruangan/ruangan_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nama_ruang' => $this->input->post('nama_ruang',TRUE),
		'lokasi' => $this->input->post('lokasi',TRUE),
		'kapasitas' => $this->input->post('kapasitas',TRUE),
	    );

            $this->Ruangan_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success 2');
            redirect(site_url('ruangan'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Ruangan_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('ruangan/update_action'),
		'id_ruangan' => set_value('id_ruangan', $row->id_ruangan),
		'nama_ruang' => set_value('nama_ruang', $row->nama_ruang),
		'lokasi' => set_value('lokasi', $row->lokasi),
		'kapasitas' => set_value('kapasitas', $row->kapasitas),
	    );
            $this->template->load('template','ruangan/ruangan_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('ruangan'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_ruangan', TRUE));
        } else {
            $data = array(
		'nama_ruang' => $this->input->post('nama_ruang',TRUE),
		'lokasi' => $this->input->post('lokasi',TRUE),
		'kapasitas' => $this->input->post('kapasitas',TRUE),
	    );

            $this->Ruangan_model->update($this->input->post('id_ruangan', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('ruangan'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Ruangan_model->get_by_id($id);

        if ($row) {
            $this->Ruangan_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('ruangan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('ruangan'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nama_ruang', 'nama ruang', 'trim|required');
	$this->form_validation->set_rules('lokasi', 'lokasi', 'trim|required');
	$this->form_validation->set_rules('kapasitas', 'kapasitas', 'trim|required');

	$this->form_validation->set_rules('id_ruangan', 'id_ruangan', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "ruangan.xls";
        $judul = "ruangan";
        $tablehead = 0;
        $tablebody = 1;
        $nourut = 1;
        //penulisan header
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Disposition: attachment;filename=" . $namaFile . "");
        header("Content-Transfer-Encoding: binary ");

        xlsBOF();

        $kolomhead = 0;
        xlsWriteLabel($tablehead, $kolomhead++, "No");
	xlsWriteLabel($tablehead, $kolomhead++, "Nama Ruang");
	xlsWriteLabel($tablehead, $kolomhead++, "Lokasi");
	xlsWriteLabel($tablehead, $kolomhead++, "Kapasitas");

	foreach ($this->Ruangan_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_ruang);
	    xlsWriteLabel($tablebody, $kolombody++, $data->lokasi);
	    xlsWriteNumber($tablebody, $kolombody++, $data->kapasitas);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=ruangan.doc");

        $data = array(
            'ruangan_data' => $this->Ruangan_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('ruangan/ruangan_doc',$data);
    }

}

/* End of file Ruangan.php */
/* Location: ./application/controllers/Ruangan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-12-29 08:46:08 */
/* http://harviacode.com */