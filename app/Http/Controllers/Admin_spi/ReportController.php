<?php

namespace App\Http\Controllers\Admin_spi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Report;
use Illuminate\Support\Facades\Storage;

class ReportController extends Controller
{
    //
    //bagian index dashboard
    public function index()
    {
        
        $reports = Report::when(request()->keyword, function($reports) {
            $reports = $reports->where('nama_file_reports', 'like', "%". request()->keyword . '%');
        })->latest()->paginate(8);
        return view('pages.admin_spi.report.index',[
            'reports' => $reports
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->all();   
        $data['file_reports'] = $request->file('file_reports')->store('assets/file-reports','public');

        $report = Report::create($data);

        return redirect()->route('adminspi.report.index');
    }

    public function update(Request $request, $id)
    {

        $data = $request->all();

        $report = Report::findOrFail($id);
        $data['file_reports'] = $request->file('file_reports')->store('assets/file-reports','public');
        $report->update($data);

        return redirect()->route('adminspi.report.index');
    }

    public function download($id)
    {
        $report = Report::find($id);
        // Mendapatkan path file report yang disimpan
        $filePath = storage_path('app/public/' . $report->file_reports);
        // Menggunakan helper download untuk mengirimkan file ke browser pengguna
        return response()->download($filePath);
    }

    public function delete($id)
    {
        $report = Report::find($id);

        Storage::disk('public')->delete($report->file_reports);

        // Hapus laporan dari database
        $report->delete();

        return redirect()->route('adminspi.report.index');
    }

    public function edit($id)
    {
        $report = Report::findOrFail($id);

        return view('pages.admin_spi.report.edit',[
            'report' => $report,
        ]);
    }
}
