<?php

namespace App\Controllers;
use App\Models\ModelAkun;

class CLogin extends BaseController
{
    public function indexdaftarakun()
    {
        session()->remove('message');

        return view('VDaftarAkun');
    }

    public function daftarakun()
    {
        $ModelAkun = new ModelAkun();
        $nama=$this->request->getPost('nama');
        $email=$this->request->getPost('email');
        $password=$this->request->getPost('password');

        $sqlakun = $ModelAkun->where('nama', $nama)
                    ->orwhere('email', $email)
                    ->findAll();
        if($sqlakun!=NULL){
            session()->setFlashdata('message', 'Nama/Email Sudah Terdaftar');
            return view('VDaftarAkun');
        }
        else{
            $data = [
                'nama' => $nama,
                'email' => $email,
                'password' => $password,
            ];
    
            $ModelAkun->insert($data);
    
            session()->setFlashdata('message', 'Berhasil Daftar');
            return redirect()->to(base_url() . '/');
        }
    }

    public function verifikasi()
    {
        $M_akun = new ModelAkun();

        $email=$this->request->getPost('email');
        $password=$this->request->getPost('password');

        $sqlakun = $M_akun->where('email', $email)
                    ->where('password', $password)
                    ->findAll();
        $sqlnama = $M_akun
                    ->where('email', $email)
                    ->where('password', $password)
                    ->get()->getResult();
        $nama = array_column($sqlnama, 'nama');
        $id_akun = array_column($sqlnama, 'id_akun');
        // echo "<script>console.log('$id_akun[0]$nama[0]')</script>";
        
        // $sqlakunsemua = $M_akun->findAll();
        
        // $data= [
        //     'akun' => $sqlakunsemua,
        // ];
        if($sqlakun==NULL){
            session()->setFlashdata('message', 'Email/Password Salah');    
        }
        else{
            $data1= [
                'nama_akun' => $nama[0],
                'nama' => $nama[0],
                'id_akun' => $id_akun[0],
            ];
            session()->set($data1);
        }
        echo "<script>console.log('$id_akun[0]$nama[0]')</script>";
        
        // return redirect()->to(base_url() . '/VIndexUser'.'/'.$id_akun[0]);
        return redirect()->to(base_url() . '/VIndexUser');
        // return view('VIndexUser', $data);
    }
}