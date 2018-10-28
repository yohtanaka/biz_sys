<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;
use App\Models\User;
use App\Models\Section;
use App\Models\Position;

class UsersController extends Controller
{
    public function index()
    {
        return view('users.index');
    }

    public function create()
    {
        $users     = User::all();
        $sections  = Section::all();
        $positions = Position::all();
        return view('users.create', compact('users', 'sections', 'positions'));
    }

    public function confirm(Request $request)
    {
        $users     = User::all();
        $sections  = Section::all();
        $positions = Position::all();
        return view('users.create', compact('users', 'sections', 'positions'));
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
        return view('users.create');
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
