<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\NewsRequest;
use App\Models\News;
use App\Library\Form;

class NewsController extends Controller
{
    public function __construct(Form $form)
    {
        $this->form = $form;
    }

    public function index(Request $request)
    {
        $data['name'] = $request->name;
        $data['type'] = $request->type;
        $data['df']   = $request->display_flag;
        $data['list'] = News::nameIn('title', $data['name'])
                            ->orNameIn('body', $data['name'])
                            ->nameEqual('type', $data['type'])
                            ->nameEqual('display_flag', $data['df'])
                            ->paginate (10);
        return view('admin.news.index', $data);
    }

    public function create(Request $request)
    {
        $data = $this->form->beforeCreate($request);
        return view('admin.news.create', $data);
    }

    public function confirm(NewsRequest $request)
    {
        $data = $this->form->beforeConfirm($request);
        return view('admin.news.create', $data);
    }

    public function store(Request $request)
    {
        if ($request->get('action') === 'back') {
            return redirect()->route('admin.news.create')->withInput(session()->get('post_data'));
        }
        $data = $request->session()->get('post_data');
        $news = News::create($data);
        return redirect()->route('admin.news.index');
    }

    public function show(Request $request, $id)
    {
        $data          = $this->form->beforeShow($request);
        $data['value'] = News::findOrFail($id);
        return view('admin.news.create', $data);
    }

    public function edit(News $news, Request $request)
    {
        $data = $this->form->beforeEdit($request, $news);
        return view('admin.news.create', $data);
    }

    public function update(Request $request, $id)
    {
        if ($request->get('action') === 'back') {
            return redirect()->route('admin.news.edit', ['id' => $id ])->withInput(session()->get('post_data'));
        }
        $data = $request->session()->get('post_data');
        $news = News::findOrFail($id)->update($data);
        return redirect()->route('admin.news.index');
    }

    public function destroy($id)
    {
        $news = News::findOrFail($id)->delete();
        return redirect()->route('admin.news.index');
    }
}
