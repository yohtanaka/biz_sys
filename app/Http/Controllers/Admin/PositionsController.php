<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PositionRequest;
use App\Models\Position;

class PositionsController extends Controller
{
    public function index(Request $request)
    {
        $data['positions'] = Position::orderBy('code', 'asc')->get();
        return view('admin.positions.index', $data);
    }

    public function store(PositionRequest $request)
    {
        $position = Position::firstOrNew(['code' => $request->code]);
        $position->fill($request->all())->save();
        return redirect()->route('position.index');
    }

    public function destroy($id)
    {
        $position = Position::find($id)->delete();
        return redirect()->route('position.index');
    }
}
