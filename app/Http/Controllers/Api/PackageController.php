<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PackageResource;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Request;
use App\Models\Package;

class PackageController extends Controller
{
    public function index() {
        return PackageResource::collection(Package::all());
    }
}
