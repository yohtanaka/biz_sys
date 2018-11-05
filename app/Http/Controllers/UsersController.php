<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
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
        if ($request->get('action') === 'back') {
            return redirect()->route('user.create')->withInput(session()->get('post_data'));
        }
        $data = $request->session()->get('post_data');
        User::create([
            'email'         => $data['email'],
            'password'      => Hash::make('password'),
            'role'          => $data['role'],
            'code'          => $data['code'],
            'last_name'     => $data['last_name'],
            'first_name'    => $data['first_name'],
            'l_n_kana'      => $data['l_n_kana'],
            'f_n_kana'      => $data['f_n_kana'],
            'gender'        => $data['gender'],
            'birthday'      => $data['birthday'],
            'zip'           => $data['zip1'] . '-' . $data['zip2'],
            // 'city_code'     => $data['city_code'],
            'street'        => $data['street'],
            'building'      => $data['building'],
            'tel_private'   => $data['tel_private'],
            'tel_work'      => $data['tel_work'],
            'section_code'  => $data['section'],
            'position_code' => $data['position'],
        ]);
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
