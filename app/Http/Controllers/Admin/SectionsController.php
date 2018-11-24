<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SectionRequest;
use App\Models\Section;

class SectionsController extends Controller
{
    public function index(Request $request)
    {
        $data['sections']  = Section::orderBy('code', 'asc')->get();
        $data['next_code'] = Section::max('code') + 1;
        return view('admin.sections.index', $data);
    }

    public function store(SectionRequest $request)
    {
        $section = Section::firstOrNew(['code' => $request->code]);
        $section->fill($request->all())->save();
        return redirect()->route('admin.section.index');
    }

    public function destroy($id)
    {
        $section = Section::find($id)->delete();
        return redirect()->route('admin.section.index');
    }
}
