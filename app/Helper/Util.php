<?php


namespace App\Helper;


use mysql_xdevapi\Result;

class Util
{
    public static function rupiah($angka)
    {
        return 'Rp ' . number_format($angka, '0', ',', '.');
    }
    public static function getStatusTrx($status)
    {
        $result = '<spand class="badge badge-danger">Draft</spand>';
        if ($status == 'finished') {
            $result = '<spand class="badge badge-success">Finished</spand>';
        }
        return $result;
    }

}
