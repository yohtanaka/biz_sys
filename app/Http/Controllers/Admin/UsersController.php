<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UserRequest;
use App\Models\User;
use App\Traits\FormTrait;
use App\Traits\UserAttributeTrait;
use App\Models\City;

class UsersController extends Controller
{
    use FormTrait, UserAttributeTrait;

    /**
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = $this->searchUser($request);
        return view('admin.users.index', $data);
    }

    /**
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
    }

     /**
     * @param  \App\Http\Requests\Admin\UserRequest  $request
     * @return \Illuminate\Http\Response
     */
   public function confirm(UserRequest $request)
    {
        $data = $this->putPostData($request);
        return view('admin.users.create', $data);
    }

    /**
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = session()->get('post_data');
        if ($request->get('action') === 'back') {
            return redirect()->route('admin.user.create')->withInput($data);
        }
        $data = $this->formatAttribute($data);
        $user = User::create($data);
        return redirect()->route('admin.user.index');
    }

    /**
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $data['value'] = User::findOrFail($id);
        return view('admin.users.create', $data);
    }

    /**
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $user = $this->addAttribute($user);
        $data = $this->putOldInput($user);
        return view('admin.users.create', $data);
    }

    /**
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = session()->get('post_data');
        if ($request->get('action') === 'back') {
            return redirect()->route('admin.user.edit', ['id' => $id ])->withInput($data);
        }
        $data = $this->formatAttribute($data);
        $user = User::findOrFail($id)->update($data);
        return redirect()->route('admin.user.index');
    }

    /**
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id)->delete();
        return redirect()->route('admin.user.index');
    }
}
