<?php

namespace App\Http\Controllers\Admin_spi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Temuan;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;


class TableTemuanController extends Controller
{
    //bagian index dashboard

   
    public function index()
    {
        if (request()->ajax()) {
            $query = Temuan::query();
    
            return Datatables::of($query)
                ->addColumn('action', function ($temuan) {
                    return 
                    '
                    <div class="d-flex justify-content-center">
                        <a class="btn btn-primary" href="' . route('adminspi.edit_temuan', $temuan->id) . '">
                            Edit
                        </a>
                        <span>
                            <a href="" class="btn btn-danger">
                                Hapus
                            </a>
                        </span>
                        
                    </div>
                    ';
                })
                ->rawColumns(['action'])
                ->make();
        }
        return view('pages.admin_spi.temuan_rekomendasi.table_temuan');
    }

    public function edit($id)
    {
        $temuan = Temuan::findOrFail($id);

        return view('pages.admin_spi.temuan_rekomendasi.edit_temuan',[
            'temuan' => $temuan,
        ]);
    }

    public function update(Request $request, $id)
    {

        $data = $request->all();

        $temuan= Temuan::findOrFail($id);
      
        $temuan->update($data);

        return redirect()->route('adminspi.table_temuan');
    }

}
