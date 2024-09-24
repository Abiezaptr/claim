<?php

use PHPUnit\Framework\TestCase;

class KlaimTest extends TestCase
{
    private $CI;

    public function setUp(): void
    {

        $this->CI = &get_instance();
        $this->CI->load->model('KlaimModel', 'klaim');
    }

    public function testGetKlaimGroupByLob()
    {
        $lob = 'PEN';
        $periode = '2024-09-30';


        $result = $this->CI->klaim->get_klaim_group_by_lob($lob, $periode);

        // Assertions
        $this->assertIsArray($result, 'Result should be an array');
        $this->assertNotEmpty($result, 'Result should not be empty');
    }

    public function testSendKlaim()
    {
        $result = $this->CI->klaim->get_klaim_kur_pen();

        $this->assertNotEmpty($result, 'There should be klaim data for KUR and PEN');

        foreach ($result as $data_klaim) {
            $this->CI->klaim->save_klaim_to_penampungan($data_klaim);
        }
        $this->assertTrue(true);
    }
}
