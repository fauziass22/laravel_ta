<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class YourController extends Controller
{
    // Metode untuk menangani pengiriman formulir
    public function handleFormSubmission(Request $request)
    {
        // Kode penyimpanan data ke database
    $nama = $request->input('nama');
    $idUser = $request->input('idUser');
    $kategori = $request->input('kategori');
    $poli = $request->input('poli');
    $noHP = $request->input('noHP');

    // Generate nomor antrian
    $noAntrian = $this->generateNomorAntrian($kategori, $poli);

    // Set status antrian
    $status = 'On-Going'; // Default status

    // Insert data ke database
    DB::table('antrian')->insert([
        'nama' => $nama,
        'idUser' => $idUser,
        'kategori' => $kategori,
        'poli' => $poli,
        'noHP' => $noHP,
        'noAntrian' => $noAntrian,
        'status' => $status // Simpan status
    ]);

    // Redirect ke halaman index setelah penyimpanan data
    return redirect()->route('index');
    }

    public function index()
    {
        // Retrieve the latest antrian data from the database
        $antrian = DB::table('antrian')->where('status', 'on-going')->orderBy('No', 'desc')->get();

        // Pass the antrian data to the view and render it
        return view('index', ['antrian' => $antrian]);
    }

    // Metode untuk generate nomor antrian
    private function generateNomorAntrian($kategori, $poli)
    {
        $kategoriCode = "";
        $poliCode = "";

        if ($kategori == "umum") {
            $kategoriCode = "AA";
        } elseif ($kategori == "bpjs") {
            $kategoriCode = "BB";
        }

        if ($poli == "umum") {
            $poliCode = "U";
        } elseif ($poli == "gigi") {
            $poliCode = "G";
        } elseif ($poli == "jiwa") {
            $poliCode = "J";
        } elseif ($poli == "laboratorium") {
            $poliCode = "L";
        }

        // Ambil jumlah antrian dari database
        $count = DB::table('antrian')->where('kategori', $kategori)->where('poli', $poli)->count();

        // Logika untuk menghasilkan nomor antrian berdasarkan jumlah antrian
        $noAntrian = $kategoriCode . $poliCode . sprintf('%03d', $count + 1);

        return $noAntrian;
    }
}
