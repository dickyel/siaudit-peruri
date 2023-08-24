<?php

namespace App\Http\Controllers\Admin_spi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Lha;
use Illuminate\Support\Facades\Storage;

class LhaController extends Controller
{
    //
    //bagian index dashboard
    public function index()
    {
        
        $lhas = Lha::when(request()->keyword, function($lhas) {
            $lhas = $lhas->where('nama_file_lhas', 'like', "%". request()->keyword . '%');
        })->latest()->paginate(10);
        return view('pages.admin_spi.lha.index',[
            'lhas' => $lhas
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->all();   
        $data['file_lhas'] = $request->file('file_lhas')->store('assets/file-lhas','public');

        $lha = Lha::create($data);

        return redirect()->route('adminspi.lha.index');
    }

    public function update(Request $request, $id)
    {

        $data = $request->all();

        $report = Lha::findOrFail($id);
        $data['file_lhas'] = $request->file('file_lhas')->store('assets/file-lhas','public');
        $report->update($data);

        return redirect()->route('adminspi.lha.index');
    }

    public function download($id)
    {
        $lha = Lha::find($id);
        // Mendapatkan path file report yang disimpan
        $filePath = storage_path('app/public/' . $lha->file_lhas);
        // Menggunakan helper download untuk mengirimkan file ke browser pengguna
        return response()->download($filePath);
    }

    public function delete($id)
    {
        $lha = Lha::find($id);

        Storage::disk('public')->delete($lha->file_lhas);

        // Hapus laporan dari database
        $lha->delete();

        return redirect()->route('adminspi.lha.index');
    }

    public function edit($id)
    {
        $lha = Lha::findOrFail($id);

        return view('pages.admin_spi.lha.edit',[
            'lha' => $lha,
        ]);
    }
}
