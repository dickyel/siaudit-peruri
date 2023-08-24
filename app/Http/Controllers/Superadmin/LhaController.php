<?php

namespace App\Http\Controllers\Superadmin;

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
        return view('pages.superadmin.lha.index',[
            'lhas' => $lhas
        ]);
    }

}
