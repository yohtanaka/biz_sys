<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UserRequest;
use App\Models\User;
use App\Library\Form;

class UsersController extends Controller
{
    public function __construct(Form $form)
    {
        $this->form = $form;
    }

    public function index(Request $request)
    {
        $data['name']  = $request->name;
        $data['sc']    = $request->section_code;
        $data['pc']    = $request->position_code;
        $data['users'] = User::nameIn('first_name', $data['name'])
                             ->orNameIn('last_name', $data['name'])
                             ->orNameIn('f_n_kana', $data['name'])
                             ->orNameIn('l_n_kana', $data['name'])
                             ->orNameIn('email', $data['name'])
                             ->nameEqual('section_code', $data['sc'])
                             ->nameEqual('position_code', $data['pc'])
                             ->paginate(10);
        return view('admin.users.index', $data);
    }

    public function create(Request $request)
    {
        $data = $this->form->beforeCreate($request);
        return view('admin.users.create', $data);
    }

    public function confirm(UserRequest $request)
    {
        $data = $this->form->beforeConfirm($request);
        return view('admin.users.create', $data);
    }

    public function store(Request $request)
    {
        if ($request->get('action') === 'back') {
            return redirect()->route('admin.user.create')->withInput(session()->get('post_data'));
        }
        $data        = $request->session()->get('post_data');
        $data['zip'] = $data['zip1'] . '-' . $data['zip2'];
        $user        = User::create($data);
        return redirect()->route('admin.user.index');
    }

    public function show(Request $request, $id)
    {
        $data          = $this->form->beforeShow($request);
        $data['value'] = User::findOrFail($id);
        return view('admin.users.create', $data);
    }

    public function edit(User $user, Request $request)
    {
        $data = $this->form->beforeEdit($request, $user);
        return view('admin.users.create', $data);
    }

    public function update(Request $request, $id)
    {
        if ($request->get('action') === 'back') {
            return redirect()->route('admin.user.edit', ['id' => $id ])->withInput(session()->get('post_data'));
        }
        $data        = $request->session()->get('post_data');
        $data['zip'] = $data['zip1'] . '-' . $data['zip2'];
        $user        = User::findOrFail($id)->update($data);
        return redirect()->route('admin.user.index');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id)->delete();
        return redirect()->route('admin.user.index');
    }
}
