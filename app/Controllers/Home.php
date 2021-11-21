<?php

namespace App\Controllers;

use App\Models\PjlProdukModel;
use Dompdf\Dompdf;

class Home extends BaseController
{
    public $db;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->session = \Config\Services::session();
    }

    public function index()
    {
        $dataPjlProduk = new PjlProdukModel();

        $data['tbl_pjl_produk'] = $dataPjlProduk->findAll();
        // $data['produk_teratas'] = $dataPjlProduk->orderBy('terjual', 'DESC')->findAll(5);

        // echo json_encode($data['produk_teratas']);
        return view('index', $data);
    }

    public function generatePDF()
    {

        $__data = $this->request->getPost();

        $dompdf = new Dompdf();

        // $data = $this->db->table('tbl_pjl_produk')->where('tbl_pjl_produk >=', $__data['start_periode'])->where('tahun <=', $__data['end_periode'])->orderBy('tahun', 'ASC')->get()->getResult();
        // $data = $this->db->table('tbl_pjl_produk')->get()->getResult();
        $data = $this->db->table('tbl_pjl_produk')->get()->getResult();

        if ($data) {
            $dompdf->loadHtml(view('pdf/laporan', ["nama_produk" => $data]));
            $dompdf->setPaper('A4', 'portrait');
            $dompdf->render();
            $dompdf->stream("laporan-per-periode");

            session()->setFlashdata('success', 'Laporan berhasil dibuat!');
            return redirect()->to(base_url());
        } else {
            session()->setFlashdata('error', 'Data tidak dapat ditemukan!');
            return redirect()->to(base_url());
        }
    }
}
