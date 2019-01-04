<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\NewsRequest;
use App\Models\News;
use App\Traits\FormTrait;
use App\Traits\NewsAttributeTrait;

class NewsController extends Controller
{
    use FormTrait, NewsAttributeTrait;

    /**
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = $this->searchAttribute($request);
        return view('admin.news.index', $data);
    }

    /**
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.news.create');
    }

    /**
     * @param  \App\Http\Requests\Admin\NewsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function confirm(NewsRequest $request)
    {
        $data = $this->putPostData($request);
        return view('admin.news.create', $data);
    }

    /**
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = session()->get('post_data');
        if ($request->get('action') === 'back') {
            return redirect()->route('admin.news.create')->withInput($data);
        }
        $news = News::create($data);
        return redirect()->route('admin.news.index');
    }

    /**
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $data['value'] = News::findOrFail($id);
        return view('admin.news.create', $data);
    }

    /**
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news)
    {
        $data = $this->putOldInput($news);
        return view('admin.news.create', $data);
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
            return redirect()->route('admin.news.edit', ['id' => $id ])->withInput($data);
        }
        $news = News::findOrFail($id)->update($data);
        return redirect()->route('admin.news.index');
    }

    /**
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $news = News::findOrFail($id)->delete();
        return redirect()->route('admin.news.index');
    }
}
