<?php
class KlaimModel extends CI_Model
{
    public function get_klaim_group_by_lob($lob = null, $periode = null)
    {
        $this->db->select('lob, penyebab_klaim, SUM(jumlah_peserta) as total_peserta, SUM(nilai_beban_klaim) as total_beban, periode');
        if ($lob) {
            $this->db->where('lob', $lob);
        }
        if ($periode) {
            $this->db->where('periode', $periode);
        }

        $this->db->group_by('lob, penyebab_klaim, periode');
        return $this->db->get('klaim_per_lob')->result();
    }

    public function get_klaim_kur_pen()
    {
        $this->db->where_in('lob', ['KUR', 'PEN']);
        return $this->db->get('klaim_per_lob')->result();
    }

    public function log_pengiriman($jumlah_data, $status, $keterangan)
    {
        $data = array(
            'jumlah_data' => $jumlah_data,
            'status' => $status,
            'keterangan' => $keterangan
        );
        $this->db->insert('log_pengiriman', $data);
    }

    public function save_klaim_to_penampungan($data_klaim)
    {
        $penampungan_db = $this->load->database('penampungan', TRUE);

        $penampungan_db->insert('rekap_klaim', array(
            'lob' => $data_klaim->lob,
            'penyebab_klaim' => $data_klaim->penyebab_klaim,
            'periode' => $data_klaim->periode,
            'nilai_beban_klaim' => $data_klaim->nilai_beban_klaim
        ));
    }
}
