<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UserRequest;
use App\Models\User;
use App\Traits\FormTrait;
use App\Traits\PostUserTrait;

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
        if ($request->get('action') === 'back') {
            return redirect()->route('admin.user.create')->withInput(session()->get('post_data'));
        }
        $data = $this->formatParams();
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
        $data = $this->beforeEdit($user);
        $this->replaceParams($user);
        return view('admin.users.create', $data);
    }

    public function update(Request $request, $id)
    {
        if ($request->get('action') === 'back') {
            return redirect()->route('admin.user.edit', ['id' => $id ])->withInput(session()->get('post_data'));
        }
        $data = $this->formatParams();
        $user = User::findOrFail($id)->update($data);
        return redirect()->route('admin.user.index');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id)->delete();
        return redirect()->route('admin.user.index');
    }
}
