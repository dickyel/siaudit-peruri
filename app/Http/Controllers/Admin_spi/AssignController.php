<?php

namespace App\Http\Controllers\Admin_spi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Temuan; // Ubah sesuai dengan namespace model Temuan
use App\Models\Rekomendasi; // Ubah sesuai dengan namespace model Rekomendasi
use App\Models\User; 


class AssignController extends Controller
{
    //
    public function index(Request $request)
    {
        // Ambil data temuan dan rekomendasi dari database
        $temuans = Temuan::all();
        $rekomendasis = Rekomendasi::all();
        $users = User::all();

          // Retrieve the selected rekomendasi ID from the request
        $selectedRekomendasiId = $request->input('deskripsi_rekomendasi');

        // Fetch the selected rekomendasi based on the ID
        $selectedRekomendasi = Rekomendasi::find($selectedRekomendasiId);

        return view('pages.admin_spi.assign.index', compact('temuans', 'rekomendasis','users','selectedRekomendasi'));
    }

    public function getRelatedRekomendasi($temuanId)
    {
        $relatedRekomendasis = Rekomendasi::where('temuan_id', $temuanId)->get();
        return response()->json($relatedRekomendasis);
    }

    public function getRekomendasiDetails($rekomendasiId)
    {
        // Fetch recommendation details from the database based on the provided ID
        $rekomendasi = Rekomendasi::find($rekomendasiId);

        if ($rekomendasi) {
            // Return the recommendation details as JSON response
            return response()->json([
                'deskripsi_rekomendasi' => $rekomendasi->deskripsi_rekomendasi,
                'status_rekomendasi' => $rekomendasi->status_rekomendasi,
                'tanggapan_auditee' => $rekomendasi->tanggapan_auditee,
            ]);
        } else {
            // Recommendation not found, return an error response
            return response()->json(['error' => 'Rekomendasi not found'], 404);
        }
    }

    public function update(Request $request)
    {
        // Get the selected rekomendasi ID and other updated data from the request
        $selectedRekomendasiId = $request->input('selectedRekomendasiId');
        $newDeskripsi = $request->input('newDeskripsi');
        $newStatus = $request->input('newStatus');
        $newTanggapanAuditee = $request->input('newTanggapanAuditee');
        $newUserId = $request->input('newUserId');

        // Find the selected rekomendasi and update its data
        $rekomendasi = Rekomendasi::find($selectedRekomendasiId);
        $rekomendasi->deskripsi_rekomendasi = $newDeskripsi;
        $rekomendasi->status_rekomendasi = $newStatus;
        $rekomendasi->tanggapan_auditee = $newTanggapanAuditee;
        $rekomendasi->user_id = $newUserId;
        $rekomendasi->save();

        // Redirect back or return a response
        return redirect()->back()->with('success', 'Rekomendasi updated successfully');
    }




}
