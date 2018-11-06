<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Http\Requests\UserRequest;
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
        $data = $this->form->beforeCreate($request);
        $data = User::addParams($data);
        return view('users.create', $data);
    }

    public function confirm(UserRequest $request)
    {
        $data = $this->form->beforeConfirm($request);
        $data = User::addParams($data);
        return view('users.create', $data);
    }

    public function store(Request $request)
    {
        if ($request->get('action') === 'back') {
            return redirect()->route('user.create')->withInput(session()->get('post_data'));
        }
        $data = $request->session()->get('post_data');
        $data['zip'] = $data['zip1'] . '-' . $data['zip2'];
        $user = new User();
        $user->fill($data)->save();
        $request->session()->forget('post_data');
        return redirect()->route('user.index');
    }

    public function show($id)
    {
        return view('users.create');
    }

    public function edit($id)
    {
        $data = $this->form->beforeEdit($request);
        $data = User::addParams($data);
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
