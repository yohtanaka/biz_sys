<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdminUserRequest;
use App\Models\User;
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
        return view('admin.users.index', compact('users'));
    }

    public function create(Request $request)
    {
        $data = $this->form->beforeCreate($request);
        $data = User::addParams($data);
        return view('admin.users.create', $data);
    }

    public function confirm(AdminUserRequest $request)
    {
        $data = $this->form->beforeConfirm($request);
        $data = User::addParams($data);
        return view('admin.users.create', $data);
    }

    public function store(Request $request)
    {
        if ($request->get('action') === 'back') {
            return redirect()->route('user.create')->withInput(session()->get('post_data'));
        }
        $data        = $request->session()->get('post_data');
        $data['zip'] = $data['zip1'] . '-' . $data['zip2'];
        $user        = User::create($data);
        $request->session()->forget('post_data');
        return redirect()->route('user.index');
    }

    public function show($id)
    {
        $user = User::find($id);
        return view('admin.users.create', compact('user'));
    }

    public function edit(User $user, Request $request)
    {
        $data = $this->form->beforeEdit($request, $user);
        $data = User::addParams($data);
        return view('admin.users.create', $data);
    }

    public function update(Request $request, $id)
    {
        if ($request->get('action') === 'back') {
            return redirect()->route('user.create')->withInput(session()->get('post_data'));
        }
        $data        = $request->session()->get('post_data');
        $data['zip'] = $data['zip1'] . '-' . $data['zip2'];
        $user        = User::find($id)->update($data);
        $request->session()->forget('post_data');
        return redirect()->route('user.index');
    }

    public function destroy($id)
    {
        $user = User::find($id)->delete();
        return redirect()->route('user.index');
    }
}
