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
    private static $table = 'sales';

    public function index() {
        return view('admin.sales.index');
    }

    public function csv() {
        return view('admin.sales.index');
    }

    public function csvUpload(CsvRequest $request) {
        $file  = $request->file('csvFile');
        $names = Sales::$names;
        $data  = Csv::upload($file, $names);
        if ($data === false) {
            return redirect()->route('admin.sales.index')->with('alert', 'ファイルの内容が正しくありません');
        }
        DB::table(self::$table)->truncate();
        foreach (array_chunk($data, 1000) as $item) {
            Sales::insert($item);
        }
        return redirect()->route('admin.sales.index')->with('notice', 'アップロードしました');
    }

    public function csvDownload() {
        $names = Sales::$names;
        $eles  = Sales::all();
        $name  = self::$table;
        $data  = Csv::getElements($names, $eles);
        return Csv::download($name, $data);
    }
}
