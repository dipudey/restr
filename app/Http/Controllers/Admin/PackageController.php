<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Package;

class PackageController extends Controller
{
    public function index() {
        return view('admin.package.index',[
            'packages' => Package::all(),
        ]);
    }
}
