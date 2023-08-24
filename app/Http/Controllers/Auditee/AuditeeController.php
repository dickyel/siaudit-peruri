<?php

namespace App\Http\Controllers\Auditee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuditeeController extends Controller
{
    public function index() {
        return view('pages.auditee.dashboard');
    }
}
