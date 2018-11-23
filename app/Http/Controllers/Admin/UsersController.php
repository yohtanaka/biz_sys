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
        $query         = User::query();
        $name          = $request->name;
        $section_code  = $request->section_code;
        $position_code = $request->position_code;
        if (!empty($name)) {
            $query->where  ('first_name', 'like', '%' . $name . '%')
                  ->orWhere('last_name',  'like', '%' . $name . '%')
                  ->orWhere('f_n_kana',   'like', '%' . $name . '%')
                  ->orWhere('l_n_kana',   'like', '%' . $name . '%')
                  ->orWhere('email',      'like', '%' . $name . '%');
        }
        if ($section_code  != '') {
            $query->where('section_code',  $section_code);
        }
        if ($position_code != '') {
            $query->where('position_code', $position_code);
        }
        $data          = [];
        $data          = User::addParams($data);
        $data['users'] = $query->latest()->paginate(10);
        return view('admin.users.index', $data);
    }

    public function create(Request $request)
    {
        $data = $this->form->beforeCreate($request);
        $data = User::addParams($data);
        return view('admin.users.create', $data);
    }

    public function confirm(UserRequest $request)
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

    public function show(Request $request, $id)
    {
        $data          = $this->form->beforeShow($request);
        $data['value'] = User::find($id);
        $data          = User::addParams($data);
        return view('admin.users.create', $data);
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
