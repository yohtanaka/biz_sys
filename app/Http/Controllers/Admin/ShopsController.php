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
    use CsvTrait;

    private static $table = 'shops';

    public function index(Request $request)
    {
        $data =[];
        // $data = $this->searchShop($request);
        return view('admin.shops.index', $data);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
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
