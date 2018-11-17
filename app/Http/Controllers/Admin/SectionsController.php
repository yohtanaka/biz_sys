<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Section;

class SectionsController extends Controller
{
    public function index(Request $request)
    {
        $data['sections'] = Section::orderBy('code', 'asc')->get();
        return view('admin.sections.index', $data);
    }
}
