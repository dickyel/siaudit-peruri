<?php

namespace App\Http\Controllers\Admin_spi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Temuan;
use Illuminate\Support\Facades\Storage;


class TemuanController extends Controller
{
    //bagian index dashboard
    public function add()
    {
        return view('pages.admin_spi.temuan_rekomendasi.add_temuan');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'rows.*.tgl_upload_temuans' => 'required|date',
            'rows.*.tgl_jatuh_tempo' => 'required|date',
            'rows.*.nomor_temuan' => 'required|string',
            'rows.*.deskripsi_temuan' => 'required|string',
            'rows.*.tingkat_resiko' => 'required|string',
        ]);

        // Bentuk array untuk menyimpan data yang akan disimpan ke dalam database
        $temuanData = [];
        foreach ($data['rows'] as $row) {
            $temuanData[] = [
                'tgl_upload_temuans' => $row['tgl_upload_temuans'],
                'tgl_jatuh_tempo' => $row['tgl_jatuh_tempo'],
                'nomor_temuan' => $row['nomor_temuan'],
                'deskripsi_temuan' => $row['deskripsi_temuan'],
                'tingkat_resiko' => $row['tingkat_resiko'],
                // Jika ada kolom lain yang perlu disimpan, tambahkan di sini sesuai dengan atribut name di form
            ];
        }

        // Simpan data menggunakan createMany
        Temuan::insert($temuanData);

        // Setelah menyimpan data, Anda bisa melakukan redirect atau memberikan pesan sukses ke user, misalnya:
        return redirect()->route('adminspi.add.temuan')->with('success', 'Data temuan berhasil disimpan.');
    }

  
}
