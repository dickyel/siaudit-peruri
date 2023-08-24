<?php

namespace App\Http\Controllers\Admin_spi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Rekomendasi;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;


class TableRekomendasiController extends Controller
{
    //bagian index dashboard

   
    public function index()
    {
        if (request()->ajax()) {
            $query = Rekomendasi::with(['temuan'])
            ->orderBy('created_at', 'desc');
            return Datatables::of($query)
                ->addColumn('action', function ($item) {
                    return 
                    '
                    <div class="d-flex justify-content-center">
                        <a class="btn btn-primary" href="">
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
        return view('pages.admin_spi.temuan_rekomendasi.table_rekomendasi');
    }

    public function edit($id)
    {
        $rekomendasi = Rekomendasi::findOrFail($id);

        return view('pages.admin_spi.temuan_rekomendasi.edit-rekomendasi',[
            'rekomendasi' => $rekomendasi,
        ]);
    }

    public function update(Request $request, $id)
    {

        $data = $request->all();

        $rekomendasi = Rekomendasi::findOrFail($id);
      
        $rekomendasi->update($data);

        return redirect()->route('adminspi.table_rekomendasi');
    }

}
