<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Disposisi extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $c_url = $this->router->fetch_class();
        $this->layout->auth(); 
        $this->layout->auth_privilege($c_url);
        $this->load->model('Disposisi_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'disposisi?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'disposisi?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'disposisi';
            $config['first_url'] = base_url() . 'disposisi';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Disposisi_model->total_rows($q);
        $disposisi = $this->Disposisi_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'disposisi_data' => $disposisi,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $data['title'] = 'Disposisi';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Disposisi' => '',
        ];

        $data['page'] = 'disposisi/disposisi_list';
        $this->load->view('template/backend', $data);
    }

    public function read($id) 
    {
        $row = $this->Disposisi_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'id_surat' => $row->id_surat,
		'catatan_disposisi' => $row->catatan_disposisi,
		'penerima_disposisi' => $row->penerima_disposisi,
		'tanggal_disposisi' => $row->tanggal_disposisi,
		'pembuat_disposisi' => $row->pembuat_disposisi,
	    );
        $data['title'] = 'Disposisi';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];

        $data['page'] = 'disposisi/disposisi_read';
        $this->load->view('template/backend', $data);
        } else {
            $this->session->set_flashdata('error', 'Record Not Found');
            redirect(site_url('disposisi'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('disposisi/create_action'),
	    'id' => set_value('id'),
	    'id_surat' => set_value('id_surat'),
	    'catatan_disposisi' => set_value('catatan_disposisi'),
	    'penerima_disposisi' => set_value('penerima_disposisi'),
	    'tanggal_disposisi' => set_value('tanggal_disposisi'),
	    'pembuat_disposisi' => set_value('pembuat_disposisi'),
	);
        $data['title'] = 'Disposisi';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];

        $data['page'] = 'disposisi/disposisi_form';
        $this->load->view('template/backend', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'id_surat' => $this->input->post('id_surat',TRUE),
		'catatan_disposisi' => $this->input->post('catatan_disposisi',TRUE),
		'penerima_disposisi' => $this->input->post('penerima_disposisi',TRUE),
		'tanggal_disposisi' => $this->input->post('tanggal_disposisi',TRUE),
		'pembuat_disposisi' => $this->input->post('pembuat_disposisi',TRUE),
	    );

            $this->Disposisi_model->insert($data);
            $this->session->set_flashdata('success', 'Create Record Success');
            redirect(site_url('disposisi'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Disposisi_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('disposisi/update_action'),
		'id' => set_value('id', $row->id),
		'id_surat' => set_value('id_surat', $row->id_surat),
		'catatan_disposisi' => set_value('catatan_disposisi', $row->catatan_disposisi),
		'penerima_disposisi' => set_value('penerima_disposisi', $row->penerima_disposisi),
		'tanggal_disposisi' => set_value('tanggal_disposisi', $row->tanggal_disposisi),
		'pembuat_disposisi' => set_value('pembuat_disposisi', $row->pembuat_disposisi),
	    );
            $data['title'] = 'Disposisi';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];

        $data['page'] = 'disposisi/disposisi_form';
        $this->load->view('template/backend', $data);
        } else {
            $this->session->set_flashdata('error', 'Record Not Found');
            redirect(site_url('disposisi'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'id_surat' => $this->input->post('id_surat',TRUE),
		'catatan_disposisi' => $this->input->post('catatan_disposisi',TRUE),
		'penerima_disposisi' => $this->input->post('penerima_disposisi',TRUE),
		'tanggal_disposisi' => $this->input->post('tanggal_disposisi',TRUE),
		'pembuat_disposisi' => $this->input->post('pembuat_disposisi',TRUE),
	    );

            $this->Disposisi_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('success', 'Update Record Success');
            redirect(site_url('disposisi'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Disposisi_model->get_by_id($id);

        if ($row) {
            $this->Disposisi_model->delete($id);
            $this->session->set_flashdata('success', 'Delete Record Success');
            redirect(site_url('disposisi'));
        } else {
            $this->session->set_flashdata('error', 'Record Not Found');
            redirect(site_url('disposisi'));
        }
    }

    public function deletebulk(){
        $delete = $this->Disposisi_model->deletebulk();
        if($delete){
            $this->session->set_flashdata('success', 'Delete Record Success');
        }else{
            $this->session->set_flashdata('error', 'Delete Record failed');
        }
        echo $delete;
    }
   
    public function _rules() 
    {
	$this->form_validation->set_rules('id_surat', 'id surat', 'trim|required');
	$this->form_validation->set_rules('catatan_disposisi', 'catatan disposisi', 'trim|required');
	$this->form_validation->set_rules('penerima_disposisi', 'penerima disposisi', 'trim|required');
	$this->form_validation->set_rules('tanggal_disposisi', 'tanggal disposisi', 'trim|required');
	$this->form_validation->set_rules('pembuat_disposisi', 'pembuat disposisi', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Disposisi.php */
/* Location: ./application/controllers/Disposisi.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2022-07-03 07:28:12 */
/* http://harviacode.com */