<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Rapat extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Jadwal_rapat_model');
        $this->load->library('form_validation');
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template','rapat/jadwal_rapat_list');
    }

    public function json() {
        header('Content-Type: application/json');
        echo $this->Jadwal_rapat_model->json();
    }

    public function read($id)
    {
        $row = $this->Jadwal_rapat_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'id_ruang' => $row->id_ruang,
		'id_pengguna' => $row->id_pengguna,
		'tgl_usul' => $row->tgl_usul,
		'tgl_mulai' => $row->tgl_mulai,
		'tgl_selesai' => $row->tgl_selesai,
		'judul_rapat' => $row->judul_rapat,
		'deskripsi_rapat' => $row->deskripsi_rapat,
		'pimpinan_rapat' => $row->pimpinan_rapat,
		'peserta_rapat' => $row->peserta_rapat,
		'file_permohonan' => $row->file_permohonan,
		'status' => $row->status,
	    );
            $this->template->load('template','rapat/jadwal_rapat_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('rapat'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('rapat/create_action'),
	    'id' => set_value('id'),
	    'id_ruang' => set_value('id_ruang'),
	    'id_pengguna' => set_value('id_pengguna'),
	    'tgl_usul' => set_value('tgl_usul'),
	    'tgl_mulai' => set_value('tgl_mulai'),
	    'tgl_selesai' => set_value('tgl_selesai'),
	    'judul_rapat' => set_value('judul_rapat'),
	    'deskripsi_rapat' => set_value('deskripsi_rapat'),
	    'pimpinan_rapat' => set_value('pimpinan_rapat'),
	    'peserta_rapat' => set_value('peserta_rapat'),
	    'file_permohonan' => set_value('file_permohonan'),
	    'status' => set_value('status'),
	);
        $this->template->load('template','rapat/jadwal_rapat_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'id_ruang' => $this->input->post('id_ruang',TRUE),
		'id_pengguna' => $this->input->post('id_pengguna',TRUE),
		'tgl_usul' => $this->input->post('tgl_usul',TRUE),
		'tgl_mulai' => $this->input->post('tgl_mulai',TRUE),
		'tgl_selesai' => $this->input->post('tgl_selesai',TRUE),
		'judul_rapat' => $this->input->post('judul_rapat',TRUE),
		'deskripsi_rapat' => $this->input->post('deskripsi_rapat',TRUE),
		'pimpinan_rapat' => $this->input->post('pimpinan_rapat',TRUE),
		'peserta_rapat' => $this->input->post('peserta_rapat',TRUE),
		'file_permohonan' => $this->input->post('file_permohonan',TRUE),
		'status' => $this->input->post('status',TRUE),
	    );

            $this->Jadwal_rapat_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success 2');
            redirect(site_url('rapat'));
        }
    }

    public function update($id)
    {
        $row = $this->Jadwal_rapat_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('rapat/update_action'),
		'id' => set_value('id', $row->id),
		'id_ruang' => set_value('id_ruang', $row->id_ruang),
		'id_pengguna' => set_value('id_pengguna', $row->id_pengguna),
		'tgl_usul' => set_value('tgl_usul', $row->tgl_usul),
		'tgl_mulai' => set_value('tgl_mulai', $row->tgl_mulai),
		'tgl_selesai' => set_value('tgl_selesai', $row->tgl_selesai),
		'judul_rapat' => set_value('judul_rapat', $row->judul_rapat),
		'deskripsi_rapat' => set_value('deskripsi_rapat', $row->deskripsi_rapat),
		'pimpinan_rapat' => set_value('pimpinan_rapat', $row->pimpinan_rapat),
		'peserta_rapat' => set_value('peserta_rapat', $row->peserta_rapat),
		'file_permohonan' => set_value('file_permohonan', $row->file_permohonan),
		'status' => set_value('status', $row->status),
	    );
            $this->template->load('template','rapat/jadwal_rapat_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('rapat'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'id_ruang' => $this->input->post('id_ruang',TRUE),
		'id_pengguna' => $this->input->post('id_pengguna',TRUE),
		'tgl_usul' => $this->input->post('tgl_usul',TRUE),
		'tgl_mulai' => $this->input->post('tgl_mulai',TRUE),
		'tgl_selesai' => $this->input->post('tgl_selesai',TRUE),
		'judul_rapat' => $this->input->post('judul_rapat',TRUE),
		'deskripsi_rapat' => $this->input->post('deskripsi_rapat',TRUE),
		'pimpinan_rapat' => $this->input->post('pimpinan_rapat',TRUE),
		'peserta_rapat' => $this->input->post('peserta_rapat',TRUE),
		'file_permohonan' => $this->input->post('file_permohonan',TRUE),
		'status' => $this->input->post('status',TRUE),
	    );

            $this->Jadwal_rapat_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('rapat'));
        }
    }

    public function delete($id)
    {
        $row = $this->Jadwal_rapat_model->get_by_id($id);

        if ($row) {
            $this->Jadwal_rapat_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('rapat'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('rapat'));
        }
    }

    public function _rules()
    {
	$this->form_validation->set_rules('id_ruang', 'id ruang', 'trim|required');
	$this->form_validation->set_rules('id_pengguna', 'id pengguna', 'trim|required');
	$this->form_validation->set_rules('tgl_usul', 'tgl usul', 'trim|required');
	$this->form_validation->set_rules('tgl_mulai', 'tgl mulai', 'trim|required');
	$this->form_validation->set_rules('tgl_selesai', 'tgl selesai', 'trim|required');
	$this->form_validation->set_rules('judul_rapat', 'judul rapat', 'trim|required');
	$this->form_validation->set_rules('deskripsi_rapat', 'deskripsi rapat', 'trim|required');
	$this->form_validation->set_rules('pimpinan_rapat', 'pimpinan rapat', 'trim|required');
	$this->form_validation->set_rules('peserta_rapat', 'peserta rapat', 'trim|required');
	$this->form_validation->set_rules('file_permohonan', 'file permohonan', 'trim|required');
	$this->form_validation->set_rules('status', 'status', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "jadwal_rapat.xls";
        $judul = "jadwal_rapat";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Id Ruang");
	xlsWriteLabel($tablehead, $kolomhead++, "Id Pengguna");
	xlsWriteLabel($tablehead, $kolomhead++, "Tgl Usul");
	xlsWriteLabel($tablehead, $kolomhead++, "Tgl Mulai");
	xlsWriteLabel($tablehead, $kolomhead++, "Tgl Selesai");
	xlsWriteLabel($tablehead, $kolomhead++, "Judul Rapat");
	xlsWriteLabel($tablehead, $kolomhead++, "Deskripsi Rapat");
	xlsWriteLabel($tablehead, $kolomhead++, "Pimpinan Rapat");
	xlsWriteLabel($tablehead, $kolomhead++, "Peserta Rapat");
	xlsWriteLabel($tablehead, $kolomhead++, "File Permohonan");
	xlsWriteLabel($tablehead, $kolomhead++, "Status");

	foreach ($this->Jadwal_rapat_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_ruang);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_pengguna);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tgl_usul);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tgl_mulai);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tgl_selesai);
	    xlsWriteLabel($tablebody, $kolombody++, $data->judul_rapat);
	    xlsWriteLabel($tablebody, $kolombody++, $data->deskripsi_rapat);
	    xlsWriteLabel($tablebody, $kolombody++, $data->pimpinan_rapat);
	    xlsWriteLabel($tablebody, $kolombody++, $data->peserta_rapat);
	    xlsWriteLabel($tablebody, $kolombody++, $data->file_permohonan);
	    xlsWriteLabel($tablebody, $kolombody++, $data->status);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=jadwal_rapat.doc");

        $data = array(
            'jadwal_rapat_data' => $this->Jadwal_rapat_model->get_all(),
            'start' => 0
        );

        $this->load->view('rapat/jadwal_rapat_doc',$data);
    }

}

/* End of file Rapat.php */
/* Location: ./application/controllers/Rapat.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-12-29 09:04:29 */
/* http://harviacode.com */
