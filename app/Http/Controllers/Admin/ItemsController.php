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

    public function index(Request $request)
    {
        $data =[];
        // $data = $this->searchItem($request);
        return view('admin.items.index', $data);
    }

    public function create()
    {
        $data = $this->beforeCreate();
        return view('admin.items.create', $data);
    }

    public function confirm(ItemRequest $request)
    {
        $data = $this->beforeConfirm($request);
        return view('admin.items.create', $data);
    }

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

    public function show(Request $request, $id)
    {
        $data          = $this->beforeShow($request);
        $data['value'] = Item::findOrFail($id);
        return view('admin.items.create', $data);
    }

    public function edit(Item $item)
    {
        $item = $this->addParams($item);
        $data = $this->beforeEdit($item);
        return view('admin.items.create', $data);
    }

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

    public function destroy($id)
    {
        $item = Item::findOrFail($id)->delete();
        return redirect()->route('admin.item.index');
    }

    public function csv()
    {
        return view('admin.items.csv');
    }

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

    public function csvDownload() {
        $names = Item::$names;
        $eles  = Item::all();
        $name  = self::$table;
        $data  = Csv::getElements($names, $eles);
        return Csv::download($name, $data);
    }
}
