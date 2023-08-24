<?php

namespace App\Http\Controllers\Admin_spi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminspiController extends Controller
{
    public function index() {
        return view('pages.admin_spi.dashboard');
    }
}
