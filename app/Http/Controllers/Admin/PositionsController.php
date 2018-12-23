<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PositionRequest;
use App\Models\Position;

class PositionsController extends Controller
{
    /**
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['positions'] = Position::oldest('code')->get();
        return view('admin.positions.index', $data);
    }

    /**
     * @param  \App\Http\Requests\Admin\PositionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PositionRequest $request)
    {
        $position = Position::updateOrCreate(['code' => $request->code], $request->all());
        return redirect()->route('admin.position.index');
    }

    /**
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $position = Position::findOrFail($id)->delete();
        return redirect()->route('admin.position.index');
    }
}
