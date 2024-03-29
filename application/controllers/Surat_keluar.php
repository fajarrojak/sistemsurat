<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Surat_keluar extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $c_url = $this->router->fetch_class();
        $this->layout->auth();
        $this->layout->auth_privilege($c_url);
        $this->load->model('Surat_keluar_model');
        $this->load->library('form_validation');
    }

    public function index() // list surat keluar
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));

        if ($q <> '') {
            $config['base_url'] = base_url() . 'surat_keluar?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'surat_keluar?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'surat_keluar';
            $config['first_url'] = base_url() . 'surat_keluar';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Surat_keluar_model->total_rows($q);
        $surat_keluar = $this->Surat_keluar_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'surat_keluar_data' => $surat_keluar,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $data['title'] = 'Kelola Surat Keluar';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Kelola Surat Keluar' => '',
        ];

        $data['page'] = 'surat_keluar/surat_list';
        $this->load->view('template/backend', $data);
    }

    public function read($id) // lihat surat keluar
    {
        $row = $this->Surat_keluar_model->get_by_id($id);
        if ($row) {
            $data = array(
                'id_surat' => $row->id_surat,
                'isi_surat' => $row->isi_surat,
                'file_surat' => $row->file_surat,
                'jenis_surat' => $row->jenis_surat,
                'no_surat' => $row->no_surat,
                'tanggal_surat' => $row->tanggal_surat,
                'tanggal_dikirim' => $row->tanggal_dikirim,
                'tanggal_terima' => $row->tanggal_terima,
                'jumlah_lampiran' => $row->jumlah_lampiran,
                'pengirim' => $row->pengirim,
                'penerima' => $row->penerima,
                'perihal' => $row->perihal,
            );
            $data['title'] = 'Kelola Surat Keluar';
            $data['subtitle'] = '';
            $data['crumb'] = [
                'Kelola Surat Keluar' => '',
            ];

            $data['page'] = 'surat_keluar/surat_read';
            $this->load->view('template/backend', $data);
        } else {
            $this->session->set_flashdata('error', 'Record Not Found');
            redirect(site_url('surat_keluar'));
        }
    }

    public function create() // tambah surat keluar
    {

        $data = array(
            'button' => 'Create',
            'action' => base_url('surat_keluar/create_action'),
            'id_surat' => set_value('id_surat'),
            'isi_surat' => set_value('isi_surat'),
            'file_surat' => set_value('file_surat'),
            'jenis_surat' => set_value('jenis_surat'),
            'no_surat' => set_value('no_surat'),
            'tanggal_surat' => set_value('tanggal_surat'),
            'tanggal_dikirim' => set_value('tanggal_dikirim'),
            'tanggal_terima' => set_value('tanggal_terima'),
            'jumlah_lampiran' => set_value('jumlah_lampiran'),
            'pengirim' => set_value('pengirim'),
            'penerima' => set_value('penerima'),
            'perihal' => set_value('perihal'),
        );
        $data['title'] = 'Kelola Surat Keluar';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Kelol Surat keluar' => '',
        ];

        $data['page'] = 'surat_keluar/surat_form';
        $this->load->view('template/backend', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            if (isset($_FILES['file_surat'])) {
                $file_surat = $_FILES['file_surat'];
            } else {
                $file_surat = null;
            }

            if ($file_surat) {
                $config['upload_path'] = './assets/uploads/files/surat/surat_keluar/';
                $config['allowed_types'] = 'pdf|docx';
                $config['max_size']     = '2048';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('file_surat')) {

                    $new_file_surat = htmlspecialchars($this->upload->data('file_name'));


                    $data = array(
                        'isi_surat' => $this->input->post('isi_surat', TRUE),
                        'file_surat' => $new_file_surat,
                        'jenis_surat' => 2,
                        'no_surat' => $this->input->post('no_surat', TRUE),
                        'tanggal_surat' => $this->input->post('tanggal_surat', TRUE),
                        'tanggal_dikirim' => $this->input->post('tanggal_dikirim', TRUE),
                        // 'tanggal_terima' => $this->input->post('tanggal_terima', TRUE),
                        'jumlah_lampiran' => $this->input->post('jumlah_lampiran', TRUE),
                        'pengirim' => $this->input->post('pengirim', TRUE),
                        'penerima' => $this->input->post('penerima', TRUE),
                        'perihal' => $this->input->post('perihal', TRUE),
                    );

                    $this->Surat_keluar_model->insert($data);
                    $this->session->set_flashdata('success', 'Create Record Success');
                    redirect(site_url('surat_keluar'));
                } else {
                    $this->session->set_flashdata('success', $this->upload->display_errors());
                    redirect('surat_keluar');
                }
            }
        }
    }

    public function update($id) // edit surat keluar
    {
        $row = $this->Surat_keluar_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('surat_keluar/update_action'),
                'id_surat' => set_value('id_surat', $row->id_surat),
                'isi_surat' => set_value('isi_surat', $row->isi_surat),
                'file_surat' => set_value('file_surat', $row->file_surat),
                'jenis_surat' => set_value('jenis_surat', $row->jenis_surat),
                'no_surat' => set_value('no_surat', $row->no_surat),
                'tanggal_surat' => set_value('tanggal_surat', $row->tanggal_surat),

                'tanggal_dikirim' => set_value('tanggal_dikirim', $row->tanggal_dikirim),
                'jumlah_lampiran' => set_value('jumlah_lampiran', $row->jumlah_lampiran),
                'pengirim' => set_value('pengirim', $row->pengirim),
                'penerima' => set_value('penerima', $row->penerima),
                'perihal' => set_value('perihal', $row->perihal),
            );
            $data['title'] = 'Kelola Surat Keluar';
            $data['subtitle'] = '';
            $data['crumb'] = [
                'Kelola Surat Keluar' => '',
            ];

            $data['page'] = 'surat_keluar/surat_form';
            $this->load->view('template/backend', $data);
        } else {
            $this->session->set_flashdata('error', 'Record Not Found');
            redirect(site_url('surat_keluar'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_surat', TRUE));
        } else {
            $data['surat'] = $this->Surat_keluar_model->get_by_id($this->input->post('id_surat', TRUE));

            if (isset($_FILES['file_surat'])) {
                $file_surat = $_FILES['file_surat'];
            } else {
                $file_surat = null;
            }

            if ($file_surat) {
                $config['upload_path'] = './assets/uploads/files/surat/surat_keluar/';
                $config['allowed_types'] = 'pdf|docx';
                $config['max_size']     = '2048';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('file_surat')) {
                    $old_file_surat = $data['surat']->file_surat;
                    if ($old_file_surat != 'default.jpg') {
                        unlink(FCPATH . 'assets/uploads/files/surat/surat_keluar/' . $old_file_surat);
                    }

                    $file_surat_name = htmlspecialchars($this->upload->data('file_name'));
                } else {
                    $file_surat_name = $data['surat']->file_surat;
                }
            }

            $data = array(
                'isi_surat' => $this->input->post('isi_surat', TRUE),
                'file_surat' => $file_surat_name,
                'jenis_surat' => $this->input->post('jenis_surat', TRUE),
                'no_surat' => $this->input->post('no_surat', TRUE),
                'tanggal_surat' => $this->input->post('tanggal_surat', TRUE),
                'tanggal_dikirim' => $this->input->post('tanggal_dikirim', TRUE),
                'jumlah_lampiran' => $this->input->post('jumlah_lampiran', TRUE),
                'pengirim' => $this->input->post('pengirim', TRUE),
                'penerima' => $this->input->post('penerima', TRUE),
                'perihal' => $this->input->post('perihal', TRUE),
            );

            $this->Surat_keluar_model->update($this->input->post('id_surat', TRUE), $data);

            $this->session->set_flashdata('success', 'Update Record Success');
            redirect(site_url('surat_keluar'));
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('isi_surat', 'isi surat', 'trim|required');
        // $this->form_validation->set_rules('file_surat', 'file surat', 'trim|required');
        // $this->form_validation->set_rules('jenis_surat', 'jenis surat', 'trim|required');
        $this->form_validation->set_rules('no_surat', 'no surat', 'trim|required');
        $this->form_validation->set_rules('tanggal_surat', 'tanggal surat', 'trim|required');
        $this->form_validation->set_rules('tanggal_dikirim', 'tanggal dikirim', 'trim|required');
        // $this->form_validation->set_rules('tanggal_terima', 'tanggal terima', 'trim|required');
        $this->form_validation->set_rules('jumlah_lampiran', 'jumlah lampiran', 'trim|required');
        $this->form_validation->set_rules('pengirim', 'pengirim', 'trim|required');
        $this->form_validation->set_rules('penerima', 'penerima', 'trim|required');
        $this->form_validation->set_rules('perihal', 'perihal', 'trim|required');

        $this->form_validation->set_rules('id_surat', 'id_surat', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
}

/* End of file Surat_keluar.php */
/* Location: ./application/controllers/Surat_keluar.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2022-07-03 07:28:53 */
/* http://harviacode.com */