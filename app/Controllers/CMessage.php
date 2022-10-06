<?php

namespace App\Controllers;
use App\Models\ModelAkun;
use App\Models\ModelMessage;
require ROOTPATH . '\vendor\autoload.php';

use Pusher;

class CMessage extends BaseController
{
    public function index($id)//id_penerima
    {
        // session()->remove('id_penerima');
        // session()->remove('nama_penerima');
        
        $M_akun = new ModelAkun();
        $ModelMessage = new ModelMessage();
        $id_akun=session()->get('id_akun');
        $sqlmessage = $ModelMessage
                    ->where('id_akun', $id_akun)
                    ->where('id_penerima', $id)
                    ->orwhere('id_akun', $id)
                    ->where('id_penerima', $id_akun)
                    // 
                    ->get()->getResult();
        $sqlnama = $M_akun
                    ->where('id_akun', $id)
                    ->get()->getResult();
        $namapenerima = array_column($sqlnama, 'nama');
        echo "<script>console.log('coba $id $id_akun')</script>";
        
        // $sqlakunsemua = $M_akun->findAll();
        $data= [
            'message' => $sqlmessage,
            // 'id_akun' => $id_akun[0],
            // 'id_pengirim' => $id_pengirim[0],
        ];
        $data1= [
            // 'nama' => $namapenerima[0],
            'nama_penerima' => $namapenerima[0],
            // 'nama_akun' => $namapenerima[0],
            'id_penerima' => $id,
            
        ];
        session()->set($data1);
        // return redirect()->to(base_url() . '/VIndexUser');
        return view('VIndexMessage', $data);
    }

    public function kirimpesan()
    {
        $ModelMessage = new ModelMessage();

        $id_akun = $_POST['id_akun'];
        $id_pengirim = $_POST['id_pengirim'];
        $id_penerima = $_POST['id_penerima'];
        $pesan = $_POST['pesan'];

        $data = [
            'id_akun' => $id_akun,
            'id_pengirim' => $id_pengirim,
            'id_penerima' => $id_penerima,
            'pesan' => $pesan,
        ];

        $ModelMessage->insert($data);

        // $builder = $this->db->table('message');
        $sqlmessage = $ModelMessage
        ->where('id_akun', $id_akun)
        ->where('id_penerima', $id_penerima)
        ->orwhere('id_akun', $id_penerima)
        ->where('id_penerima', $id_akun)
        // ->orwhere('id_penerima', $id_penerima)
        // ->orwhere('id_akun', $id_akun)
        // ->where('id_penerima', $id_akun)
        // ->where('id_penerima', $id_penerima)
        ->get()->getResult();
        // echo '<script>console.log(.aaaaa'.print_r($sqlmessage).'.)</script>';
        // echo '<script>console.log(aaaaa'.$sqlmessage.'.)</script>';
        // $builder->select('*');
        //     // ->where('id_penerima', $id_akun)
        //     // ->and()
        //     // ->where('id_pengirim', $id_pengirim)
        //     // ->or()
        //     // ->where();
        // $query = $builder->get()->getResult();

        foreach ($sqlmessage as $key) {
            $data_pusher[] = $key;
        }

        $options = array(
            'cluster' => 'ap1',
            'useTLS' => true
        );
        $pusher = new Pusher\Pusher(
        'e0bd82d32cf9d6ef3c0f',
        '143094503bcdc550b65b',
        '1197215',
        $options
        );

        //cari nilai terkecil satukan channel
        if($id_akun<$id_penerima){
            $idcan = $id_akun;
        }
        else{
            $idcan = $id_penerima;
        }

        $pusher->trigger($idcan, 'my-event', $data_pusher);
        
        // echo '<script>console.log(.rooot'.ROOTPATH.'.)</script>';
        // $sqlmessage = $ModelMessage->get()->getResult();
        // $data1= [
        //     'message' => $sqlmessage
        // ];
        

        // return view('VIndexMessage', $data1);       
        
    }
}