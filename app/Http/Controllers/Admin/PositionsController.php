<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Position;

class PositionsController extends Controller
{
    public function index(Request $request)
    {
        $data['positions'] = Position::orderBy('code', 'asc')->get();
        return view('admin.positions.index', $data);
    }
}
