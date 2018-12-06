<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ShopRequest;
use App\Models\Shop;
use App\Traits\CsvTrait;
use App\Traits\FormTrait;

class ShopsController extends Controller
{
    use FormTrait, CsvTrait;

    private static $table = 'shops';

    public function index(Request $request)
    {
        $data =[];
        // $data = $this->searchShop($request);
        return view('admin.shops.index', $data);
    }

    public function create()
    {
        $data = $this->beforeCreate();
        return view('admin.shops.create', $data);
    }

    public function confirm(ShopRequest $request)
    {
        $data = $this->beforeConfirm($request);
        return view('admin.shops.create', $data);
    }

    public function store(Request $request)
    {
        $data = session()->get('post_data');
        if ($request->get('action') === 'back') {
            return redirect()->route('admin.shop.create')->withInput($data);
        }
        $data = $this->formatParams($data);
        $shop = Shop::create($data);
        return redirect()->route('admin.shop.index');
    }

    public function show(Request $request, $id)
    {
        $data          = $this->beforeShow($request);
        $data['value'] = Shop::findOrFail($id);
        return view('admin.shops.create', $data);
    }

    public function edit(Shop $shop)
    {
        $shop = $this->addParams($shop);
        $data = $this->beforeEdit($shop);
        return view('admin.shops.create', $data);
    }

    public function update(Request $request, $id)
    {
        $data = session()->get('post_data');
        if ($request->get('action') === 'back') {
            return redirect()->route('admin.shop.edit', ['id' => $id ])->withInput($data);
        }
        $data = $this->formatParams($data);
        $shop = Shop::findOrFail($id)->update($data);
        return redirect()->route('admin.shop.index');
    }

    public function destroy($id)
    {
        $shop = Shop::findOrFail($id)->delete();
        return redirect()->route('admin.shop.index');
    }

    public function csv()
    {
        return view('admin.shops.csv');
    }

    public function csvUpload(CsvRequest $request)
    {
        $file  = $request->file('csvFile');
        $names = Shop::$names;
        $data  = Csv::upload($file, $names);
        if ($data === false) {
            return redirect()->route('admin.shop.index')->with('alert', 'ファイルの内容が正しくありません');
        }
        DB::table(self::$table)->truncate();
        foreach (array_chunk($data, 1000) as $shop) {
            Sales::insert($shop);
        }
        return redirect()->route('admin.shop.index')->with('notice', 'アップロードしました');
    }

    public function csvDownload()
    {
        $names = Shop::$names;
        $eles  = Shop::all();
        $name  = self::$table;
        $data  = Csv::getElements($names, $eles);
        return Csv::download($name, $data);
    }
}
