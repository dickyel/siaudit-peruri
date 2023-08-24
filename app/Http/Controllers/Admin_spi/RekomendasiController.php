<?php

namespace App\Http\Controllers\Admin_spi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Rekomendasi;
use Illuminate\Support\Facades\Storage;
use App\Models\Temuan;



class RekomendasiController extends Controller
{

    
    //bagian index dashboard
    public function add()
    {
        $temuan = Temuan::all();
        return view('pages.admin_spi.temuan_rekomendasi.add_rekomendasi',compact('temuan'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'rows' => 'required|array',
            'rows.*.temuan_id' => 'required|exists:temuans,id',
            'rows.*.status_rekomendasi' => 'nullable|string',
            'rows.*.deskripsi_rekomendasi' => 'required|string',
            'rows.*.tanggapan_auditee' => 'nullable|string',
        ]);

        // Create an array to store all rekomendasi data
        $rekomendasiData = [];

        // Loop through each row and build the rekomendasi data array
        foreach ($data['rows'] as $row) {
            $rekomendasiData[] = [
                'temuan_id' => $row['temuan_id'],
                'status_rekomendasi' => $row['status_rekomendasi'],
                'deskripsi_rekomendasi' => $row['deskripsi_rekomendasi'],
                'tanggapan_auditee' => $row['tanggapan_auditee'],
            ];
        }

        // Bulk insert the rekomendasi data to the database
        Rekomendasi::insert($rekomendasiData);

        // Redirect or respond with success message
        return redirect()->route('adminspi.add.rekomendasi')->with('success', 'Temuan & Rekomendasi stored successfully!');
    }

    // Helper method to check if a Temuan has existing recommendations
  



}
