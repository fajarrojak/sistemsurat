<?php defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
{


  function __construct()
  {
    parent::__construct();
    $this->load->model('Surat_masuk_model');
    $this->load->model('Surat_keluar_model');
    $this->load->library('form_validation');
  }

  public function laporan_sk_print() // print laporan surat keluar berupa excel
  {
    $datareport = $this->Surat_keluar_model->get_limit_data_print();

    $header = [
      'No',
      'Nomor Surat',
      'Perihal',
      'Pengirim',
      'Tanggal Surat'
    ];

    $this->load->helper('exportexcel');
    $namaFile = "laporan.xls";
    // $judul = "groups";
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
    foreach ($header as $kolom) {
      xlsWriteLabel($tablehead, $kolomhead++, $kolom);
    }

    foreach ($datareport as $data) {
      $kolombody = 0;

      //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
      xlsWriteNumber($tablebody, $kolombody++, $nourut);
      xlsWriteLabel($tablebody, $kolombody++, $data->no_surat);
      xlsWriteLabel($tablebody, $kolombody++, $data->perihal);
      xlsWriteNumber($tablebody, $kolombody++, $data->pengirim);
      xlsWriteLabel($tablebody, $kolombody++, $data->tanggal_surat);

      // }
      // xlsWriteLabel($tablebody, $kolombody++, $data->$value);
      // }

      $tablebody++;
      $nourut++;
    }

    xlsEOF();
    exit();
  }

  public function laporan_sm_print() // print laporan surat masuk berupa excel
  {
    $datareport = $this->Surat_masuk_model->get_limit_data_print();

    $header = [
      'No',
      'Nomor Surat',
      'Perihal',
      'Pengirim',
      'Tanggal Surat'
    ];

    $this->load->helper('exportexcel');
    $namaFile = "laporan.xls";
    // $judul = "groups";
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
    foreach ($header as $kolom) {
      xlsWriteLabel($tablehead, $kolomhead++, $kolom);
    }

    foreach ($datareport as $data) {
      $kolombody = 0;

      //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
      xlsWriteNumber($tablebody, $kolombody++, $nourut);
      xlsWriteLabel($tablebody, $kolombody++, $data->no_surat);
      xlsWriteLabel($tablebody, $kolombody++, $data->perihal);
      xlsWriteNumber($tablebody, $kolombody++, $data->pengirim);
      xlsWriteLabel($tablebody, $kolombody++, $data->tanggal_surat);

      // }
      // xlsWriteLabel($tablebody, $kolombody++, $data->$value);
      // }

      $tablebody++;
      $nourut++;
    }

    xlsEOF();
    exit();
  }

  public function laporan_surat_masuk() //lihat laporan surat masuk
  {
    $q = urldecode($this->input->get('q', TRUE));
    $start = intval($this->input->get('start'));

    if ($q <> '') {
      $config['base_url'] = base_url() . 'laporan/laporan_surat_masuk?q=' . urlencode($q);
      $config['first_url'] = base_url() . 'laporan/laporan_surat_masuk?q=' . urlencode($q);
    } else {
      $config['base_url'] = base_url() . 'laporan/laporan_surat_masuk';
      $config['first_url'] = base_url() . 'laporan/laporan_surat_masuk';
    }

    $config['per_page'] = 10;
    $config['page_query_string'] = TRUE;

    $dari = $this->input->post('dari');
    $sampai = $this->input->post('sampai');

    if ($dari) {
      $config['total_rows'] = $this->Surat_masuk_model->laporan_surat_masuk_total($q, $dari, $sampai);
      $surat_masuk = $this->Surat_masuk_model->laporan_surat_masuk($config['per_page'], $start, $q, $dari, $sampai);
    } else {
      $config['total_rows'] = $this->Surat_masuk_model->total_rows($q);
      $surat_masuk = $this->Surat_masuk_model->get_limit_data($config['per_page'], $start, $q);
    }

    $this->load->library('pagination');
    $this->pagination->initialize($config);

    $data = array(
      'surat_masuk_data' => $surat_masuk,
      'q' => $q,
      'pagination' => $this->pagination->create_links(),
      'total_rows' => $config['total_rows'],
      'start' => $start,
    );
    $data['title'] = 'Laporan';
    $data['subtitle'] = 'Laporan surat_masuk';

    $data['search_page'] = 'laporan/laporan_surat_masuk';
    $data['crumb'] = [
      'Laporan' => '',
    ];

    $data['page'] = 'laporan_sm';
    $this->load->view('template/backend', $data);
  }


  public function laporan_surat_keluar() //lihat laporan surat keluar
  {
    $q = urldecode($this->input->get('q', TRUE));
    $start = intval($this->input->get('start'));

    if ($q <> '') {
      $config['base_url'] = base_url() . 'laporan/laporan_surat_keluar?q=' . urlencode($q);
      $config['first_url'] = base_url() . 'laporan/laporan_surat_keluar?q=' . urlencode($q);
    } else {
      $config['base_url'] = base_url() . 'laporan/laporan_surat_keluar';
      $config['first_url'] = base_url() . 'laporan/laporan_surat_keluar';
    }

    $config['per_page'] = 10;
    $config['page_query_string'] = TRUE;

    $dari = $this->input->post('dari');
    $sampai = $this->input->post('sampai');

    if ($dari) {
      $config['total_rows'] = $this->Surat_keluar_model->laporan_surat_keluar_total($q, $dari, $sampai);
      $surat_keluar = $this->Surat_keluar_model->laporan_surat_keluar($config['per_page'], $start, $q, $dari, $sampai);
    } else {
      $config['total_rows'] = $this->Surat_keluar_model->total_rows($q);
      $surat_keluar = $this->Surat_keluar_model->get_limit_data($config['per_page'], $start, $q);
    }

    $this->load->library('pagination');
    $this->pagination->initialize($config);

    $data = array(
      'surat_keluar_data' => $surat_keluar,
      'q' => $q,
      'pagination' => $this->pagination->create_links(),
      'total_rows' => $config['total_rows'],
      'start' => $start,
    );
    $data['title'] = 'Laporan';
    $data['subtitle'] = 'Laporan surat_keluar';

    $data['search_page'] = 'laporan/laporan_surat_keluar';
    $data['crumb'] = [
      'Laporan' => '',
    ];

    $data['page'] = 'laporan_sk';
    $this->load->view('template/backend', $data);
  }
}
