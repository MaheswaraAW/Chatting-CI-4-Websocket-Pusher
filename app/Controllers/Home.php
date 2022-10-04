<?php

namespace App\Controllers;
use App\Models\ModelAkun;

class Home extends BaseController
{
    public function index()
    {
        return view('welcome_message');
    }

    // public function indexuser($id)
    public function indexuser()
    {
        // session()->remove('nama_penerima');
        // session()->remove('id_akun');
    

        $M_akun = new ModelAkun();
        // $sqlakun = $M_akun->findAll();
        $nama = session()->get('nama');
        $nama_penerima = session()->get('nama_penerima');
        $id_akun = session()->get('id_akun');
        $id_penerima = session()->get('id_penerima');
        // echo '<script>console.log('.json_encode($nama).');</script>';
        // echo "<script>console.log(".$nama.")</script>";
        echo '<script>console.log(in'.$id_akun.')</script>';
        echo '<script>console.log(in'.$nama.')</script>';
        if($id_penerima&&$id_penerima){

        }
        echo '<script>console.log(in'.$id_penerima.')</script>';
        echo '<script>console.log(in'.$nama_penerima.')</script>';
        // $data= [
        //     'akun' => $sqlakun,
        // ];
        // $data1= [
        //     'nama' => $nama,
        //     'id_akun' => $id_akun,
        // ];
        // session()->set($data1);
        
            // $sqlakun2 = $M_akun
            //         ->where('id_akun', $id)
            //         ->get()->getResult();
            // $nama = array_column($sqlakun2, 'nama');
            // $data1= [
            //     'nama' => $nama,
            //     'id_akun' => $id,
            // ];
            // session()->set($data1);
            
            $sqlakun3 = $M_akun
                    ->where('id_akun!=', $id_akun)
                    ->findAll();
            
            $data= [
                'akun' => $sqlakun3,
            ];
            
            echo "<script>console.log('idak!=id')</script>";
            echo '<script>console.log(idak'.$id_akun.')</script>';
            echo '<script>console.log(nama'.$nama.')</script>';
        
            return view('VIndexUser', $data);
        
    }
}
