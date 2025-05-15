<?php

if (!function_exists('tanggal_indonesia')) {
    /**
     * Format Tanggal
     * @param mixed $str
     * @return void
     */

    function tanggal_indonesia($tgl, $tampil_hari = true)
    {
        $nama_hari  = array("Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jum'at", "Sabtu");
        $nama_bulan = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'Nopember', 'Desember'];

        $tahun      = substr($tgl, 0, 4);
        $bulan      = $nama_bulan[(int)substr($tgl, 5, 2) - 1];
        $tanggal    = substr($tgl, 8, 2);

        $text = "";

        if ($tampil_hari) {
            $urutaan_hari = date('w', mktime(0, 0, 0, substr($tgl, 5, 2), $tanggal, $tahun));
            $hari  = $nama_hari[$urutaan_hari];
            $text .= $hari . ", ";
        }

        $text   .= $tanggal . " " . $bulan . " " . $tahun;
        return $text;
    }
}





if (!function_exists('format_rupiah')) {
    /**
     * Format Rupiah
     * @param mixed $str
     * @return void
     */
    function format_rupiah($str)
    {
        return 'Rp. ' . number_format($str, '2', ',', '.');
    }
}
