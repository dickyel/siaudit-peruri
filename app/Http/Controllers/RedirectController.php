<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RedirectController extends Controller
{
    public function cek() {
        if (auth()->user()->role_id === 1) {
            return redirect('/superadmin');
        } else if(auth()->user()->role_id === 2){
            return redirect('/adminspi');
        } else if(auth()->user()->role_id === 3){
            return redirect('/auditee');
        } else if(auth()->user()->role_id === 4){
            return redirect('/pic');
        } else if(auth()->user()->role_id === 3){
            return redirect('/kaspi');
        }
    }
}
