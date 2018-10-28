<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;
use App\Models\User;
use App\Models\Section;
use App\Models\Position;
use App\Library\Form;

class UsersController extends Controller
{
    public function __construct(Form $form)
    {
        $this->form = $form;
    }

    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    public function create(Request $request)
    {
        $sections  = Section::all();
        $positions = Position::all();
        $data      = $this->form->beforeCreate($request);
        return view('users.create', $data, compact('sections', 'positions'));
    }

    public function confirm(Request $request)
    {
        $sections  = Section::all();
        $positions = Position::all();
        $data      = $this->form->beforeConfirm($request);
        return view('users.create', $data, compact('sections', 'positions'));
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        return view('users.create');
    }

    public function edit($id)
    {
        $data = $this->form->beforeEdit($request);
        return view('users.create', $data);
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
