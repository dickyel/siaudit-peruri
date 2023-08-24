<?php

namespace App\Http\Controllers\Superadmin;

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
        return view('pages.superadmin.report.index',[
            'reports' => $reports
        ]);
    }


}
