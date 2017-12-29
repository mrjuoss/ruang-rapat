<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pengguna_rapat extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Users_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template','pengguna_rapat/users_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Users_model->json();
    }

    public function read($id) 
    {
        $row = $this->Users_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'nama_lengkap' => $row->nama_lengkap,
		'unit_kerja' => $row->unit_kerja,
		'no_telp' => $row->no_telp,
	    );
            $this->template->load('template','pengguna_rapat/users_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pengguna_rapat'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('pengguna_rapat/create_action'),
	    'id' => set_value('id'),
	    'nama_lengkap' => set_value('nama_lengkap'),
	    'unit_kerja' => set_value('unit_kerja'),
	    'no_telp' => set_value('no_telp'),
	);
        $this->template->load('template','pengguna_rapat/users_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nama_lengkap' => $this->input->post('nama_lengkap',TRUE),
		'unit_kerja' => $this->input->post('unit_kerja',TRUE),
		'no_telp' => $this->input->post('no_telp',TRUE),
	    );

            $this->Users_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success 2');
            redirect(site_url('pengguna_rapat'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Users_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('pengguna_rapat/update_action'),
		'id' => set_value('id', $row->id),
		'nama_lengkap' => set_value('nama_lengkap', $row->nama_lengkap),
		'unit_kerja' => set_value('unit_kerja', $row->unit_kerja),
		'no_telp' => set_value('no_telp', $row->no_telp),
	    );
            $this->template->load('template','pengguna_rapat/users_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pengguna_rapat'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'nama_lengkap' => $this->input->post('nama_lengkap',TRUE),
		'unit_kerja' => $this->input->post('unit_kerja',TRUE),
		'no_telp' => $this->input->post('no_telp',TRUE),
	    );

            $this->Users_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('pengguna_rapat'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Users_model->get_by_id($id);

        if ($row) {
            $this->Users_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('pengguna_rapat'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pengguna_rapat'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nama_lengkap', 'nama lengkap', 'trim|required');
	$this->form_validation->set_rules('unit_kerja', 'unit kerja', 'trim|required');
	$this->form_validation->set_rules('no_telp', 'no telp', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "users.xls";
        $judul = "users";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Nama Lengkap");
	xlsWriteLabel($tablehead, $kolomhead++, "Unit Kerja");
	xlsWriteLabel($tablehead, $kolomhead++, "No Telp");

	foreach ($this->Users_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_lengkap);
	    xlsWriteLabel($tablebody, $kolombody++, $data->unit_kerja);
	    xlsWriteLabel($tablebody, $kolombody++, $data->no_telp);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=users.doc");

        $data = array(
            'users_data' => $this->Users_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('pengguna_rapat/users_doc',$data);
    }

}

/* End of file Pengguna_rapat.php */
/* Location: ./application/controllers/Pengguna_rapat.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-12-29 08:11:28 */
/* http://harviacode.com */