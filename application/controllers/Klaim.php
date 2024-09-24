<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Klaim extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('KlaimModel', 'klaim');
        $this->load->helper('url');
    }

    public function index()
    {
        $lob = $this->input->get('lob');
        $periode = $this->input->get('periode');
        $klaim = $this->klaim->get_klaim_group_by_lob($lob, $periode);

        $grouped_klaim = [];
        $total_peserta_semua_lob = 0;
        $total_beban_semua_lob = 0;

        foreach ($klaim as $row) {
            if (!isset($grouped_klaim[$row->lob])) {
                $grouped_klaim[$row->lob] = [
                    'details' => [],
                    'total_peserta' => 0,
                    'total_beban' => 0
                ];
            }

            // Add a claim to the associated LOB
            $grouped_klaim[$row->lob]['details'][] = $row;
            $grouped_klaim[$row->lob]['total_peserta'] += $row->total_peserta;
            $grouped_klaim[$row->lob]['total_beban'] += $row->total_beban;

            // Calculate total participants and expenses for all LOB
            $total_peserta_semua_lob += $row->total_peserta;
            $total_beban_semua_lob += $row->total_beban;
        }

        $data['grouped_klaim'] = $grouped_klaim;
        $data['selected_lob'] = $lob;
        $data['selected_periode'] = $periode;
        $data['total_peserta_semua_lob'] = $total_peserta_semua_lob;
        $data['total_beban_semua_lob'] = $total_beban_semua_lob;

        $this->load->view('klaim', $data);
    }

    public function send_klaim()
    {
        $klaim = $this->klaim->get_klaim_kur_pen();

        // check if data klaim empty 
        if (empty($klaim)) {
            echo json_encode([
                'status' => 'error',
                'message' => 'There is no claims data to send.'
            ]);
            return;
        }

        foreach ($klaim as $data_klaim) {
            $this->klaim->save_klaim_to_penampungan($data_klaim);
        }

        $this->klaim->log_pengiriman(count($klaim), 'Sukses', 'Data berhasil dikirim');

        echo json_encode([
            'status' => 'success',
            'message' => 'Claim data has been successfully sent.'
        ]);
    }
}
