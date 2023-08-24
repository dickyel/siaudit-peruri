<?php

namespace App\Http\Controllers\Ka_spi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KaspiController extends Controller
{
    public function index() {
        return view('pages.ka_spi.dashboard');
    }
}
