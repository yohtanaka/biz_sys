<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ItemRequest;
use App\Models\Item;
use App\Traits\CsvTrait;
use App\Traits\FormTrait;

class ItemsController extends Controller
{
    use FormTrait, CsvTrait;

    private static $table = 'items';

    /**
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data['s_name']  = $request->name;
        $data['s_order'] = $request->order;
        $data['items']   = Item::nameIn('name', $data['s_name'])
                               ->changeOrder($data['s_order'])
                               ->paginate (10);
        $data['params']  = [
            'name'  => $data['s_name'],
            'order' => $data['s_order'],
        ];
        return view('admin.items.index', $data);
    }

    /**
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.items.create');
    }

    /**
     * @param  \App\Http\Requests\Admin\ItemRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function confirm(ItemRequest $request)
    {
        $data = $this->putPostData($request);
        return view('admin.items.create', $data);
    }

    /**
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = session()->get('post_data');
        if ($request->get('action') === 'back') {
            return redirect()->route('admin.item.create')->withInput($data);
        }
        $data = $this->formatParams($data);
        $item = Item::create($data);
        return redirect()->route('admin.item.index');
    }

    /**
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $data['value'] = Item::findOrFail($id);
        return view('admin.items.create', $data);
    }

    /**
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item)
    {
        $item = $this->addParams($item);
        $data = $this->putOldInput($item);
        return view('admin.items.create', $data);
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
            return redirect()->route('admin.item.edit', ['id' => $id ])->withInput($data);
        }
        $data = $this->formatParams($data);
        $item = Item::findOrFail($id)->update($data);
        return redirect()->route('admin.item.index');
    }

    /**
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Item::findOrFail($id)->delete();
        return redirect()->route('admin.item.index');
    }

    /**
     * @return \Illuminate\Http\Response
     */
    public function csv()
    {
        return view('admin.items.csv');
    }

    /**
     * @param  \App\Http\Requests\CsvRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function csvUpload(CsvRequest $request) {
        $file  = $request->file('csvFile');
        $names = Item::$names;
        $data  = Csv::upload($file, $names);
        if ($data === false) {
            return redirect()->route('admin.item.index')->with('alert', 'ファイルの内容が正しくありません');
        }
        DB::table(self::$table)->truncate();
        foreach (array_chunk($data, 1000) as $item) {
            Item::insert($item);
        }
        return redirect()->route('admin.item.index')->with('notice', 'アップロードしました');
    }

    /**
     * @return \App\Traits\CsvTrait
     */
    public function csvDownload() {
        $names = Item::$names;
        $eles  = Item::all();
        $name  = self::$table;
        $data  = Csv::getElements($names, $eles);
        return Csv::download($name, $data);
    }
}
