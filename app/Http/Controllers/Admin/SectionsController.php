<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SectionRequest;
use App\Models\Section;

class SectionsController extends Controller
{
    /**
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['sections']  = Section::oldest('code')->get();
        $data['next_code'] = Section::max('code') + 1;
        return view('admin.sections.index', $data);
    }

    /**
     * @param  \App\Http\Requests\Admin\SectionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SectionRequest $request)
    {
        $section = Section::updateOrCreate(['code' => $request->code], $request->all());
        return redirect()->route('admin.section.index');
    }

    /**
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $section = Section::findOrFail($id)->delete();
        return redirect()->route('admin.section.index');
    }
}
