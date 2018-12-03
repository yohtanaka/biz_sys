<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UserRequest;
use App\Models\User;
use App\Traits\FormTrait;
use App\Traits\PostUserTrait;
use App\Models\City;

class UsersController extends Controller
{
    use FormTrait, PostUserTrait;

    public function index(Request $request)
    {
        $data = $this->searchUser($request);
        return view('admin.users.index', $data);
    }

    public function create()
    {
        $data = $this->beforeCreate();
        return view('admin.users.create', $data);
    }

    public function confirm(UserRequest $request)
    {
        $data = $this->beforeConfirm($request);
        return view('admin.users.create', $data);
    }

    public function store(Request $request)
    {
        $data = session()->get('post_data');
        if ($request->get('action') === 'back') {
            return redirect()->route('admin.user.create')->withInput($data);
        }
        $data = $this->formatParams($data);
        $user = User::create($data);
        return redirect()->route('admin.user.index');
    }

    public function show(Request $request, $id)
    {
        $data          = $this->beforeShow($request);
        $data['value'] = User::findOrFail($id);
        return view('admin.users.create', $data);
    }

    public function edit(User $user)
    {
        $user = $this->addParams($user);
        $data = $this->beforeEdit($user);
        return view('admin.users.create', $data);
    }

    public function update(Request $request, $id)
    {
        $data = session()->get('post_data');
        if ($request->get('action') === 'back') {
            return redirect()->route('admin.user.edit', ['id' => $id ])->withInput($data);
        }
        $data = $this->formatParams($data);
        $user = User::findOrFail($id)->update($data);
        return redirect()->route('admin.user.index');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id)->delete();
        return redirect()->route('admin.user.index');
    }
}
