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
        $query        = News::query();
        $name         = $request->name;
        $type         = $request->type;
        $display_flag = $request->display_flag;
        if (!empty($name)) {
            $query->where  ('title', 'like', '%' . $name . '%')
                  ->orWhere('body',  'like', '%' . $name . '%');
        }
        if (!empty($type)) {
            $query->where('type', $type);
        }
        if (!empty($display_flag)) {
            $query->where('display_flag', $display_flag);
        }
        $data         = [];
        $data         = News::addParams($data);
        $data['list'] = $query->latest()->paginate(10);
        return view('admin.news.index', $data);
    }

    public function create(Request $request)
    {
        $data = $this->form->beforeCreate($request);
        $data = News::addParams($data);
        return view('admin.news.create', $data);
    }

    public function confirm(NewsRequest $request)
    {
        $data = $this->form->beforeConfirm($request);
        $data = News::addParams($data);
        return view('admin.news.create', $data);
    }

    public function store(Request $request)
    {
        if ($request->get('action') === 'back') {
            return redirect()->route('news.create')->withInput(session()->get('post_data'));
        }
        $data = $request->session()->get('post_data');
        $news = News::create($data);
        $request->session()->forget('post_data');
        return redirect()->route('news.index');
    }

    public function show(Request $request, $id)
    {
        $data          = $this->form->beforeShow($request);
        $data['value'] = News::find($id);
        $data          = News::addParams($data);
        return view('admin.news.create', $data);
    }

    public function edit(News $news, Request $request)
    {
        $data = $this->form->beforeEdit($request, $news);
        $data = News::addParams($data);
        return view('admin.news.create', $data);
    }

    public function update(Request $request, $id)
    {
        if ($request->get('action') === 'back') {
            return redirect()->route('news.edit', ['id' => $id ])->withInput(session()->get('post_data'));
        }
        $data = $request->session()->get('post_data');
        $news = News::find($id)->update($data);
        $request->session()->forget('post_data');
        return redirect()->route('news.index');
    }

    public function destroy($id)
    {
        $news = News::find($id)->delete();
        return redirect()->route('news.index');
    }
}
