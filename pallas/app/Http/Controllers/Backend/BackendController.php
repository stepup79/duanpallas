<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BackendController extends Controller
{
    /**
     * Action hiển thị view Trang chủ
     * GET /
     */
    public function dashboard(Request $request)
    {
        return view('backend.dashboard');
    }
}
