<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\CsvRequest;
use App\Models\Sales;
use App\Library\Csv;

class SalesController extends Controller
{
    static $items = ['user_code', 'campany_code', 'shop_code', 'type', 'amount', 'sold_date'];

    public function index() {
        return view('admin.sales.index');
    }

    public function csvUpload(Request $request) {
        $file  = $request->file('csvFile');
        $items = self::$items;
        $head  = 'campany_code';
        $data  = Csv::upload($file, $items, $head);
        if ($data === false) {
            return redirect()->route('admin.sales.index')->with('alert', 'ファイルの内容が正しくありません');
        }
        DB::table('sales')->truncate();
        foreach (array_chunk($data, 1000) as $item) {
            Sales::insert($item);
        }
        return redirect()->route('admin.sales.index')->with('notice', 'アップロードしました');
    }

    public function csvDownload() {
        $name     = 'sales';
        $elements = Sales::latest()->get();
        $data     = self::getElements($elements);
        return Csv::download($name, $data);
    }

    static function getElements($elements) {
        $data[] = self::$items;
        foreach ($elements as $ele) {
            $data[] = [
                $ele['user_code'],
                $ele['campany_code'],
                $ele['shop_code'],
                $ele['type'],
                $ele['amount'],
                $ele['sold_date'],
            ];
        }
        return $data;
    }
}
