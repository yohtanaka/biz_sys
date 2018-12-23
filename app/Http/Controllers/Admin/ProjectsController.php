<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProjectRequest;
use App\Models\Project;

class ProjectsController extends Controller
{
    /**
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['projects']  = Project::latest('code')->get();
        $data['next_code'] = Project::max('code') + 1;
        return view('admin.projects.index', $data);
    }

    /**
     * @param  \App\Http\Requests\Admin\ProjectRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProjectRequest $request)
    {
        $section = Project::updateOrCreate(['code' => $request->code], $request->all());
        return redirect()->route('admin.project.index');
    }

    /**
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $section = Project::findOrFail($id)->delete();
        return redirect()->route('admin.project.index');
    }
}
