<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\CsvRequest;
use App\Models\Sales;
use App\Traits\CsvTrait;

class SalesController extends Controller
{
    use CsvTrait;

    private static $table = 'sales';

    public function index() {
        return view('admin.sales.index');
    }

    public function csv() {
        return view('admin.sales.csv');
    }

    public function csvUpload(CsvRequest $request) {
        $file  = $request->file('csvFile');
        $names = Sales::$names;
        $data  = $this->upload($file, $names);
        if ($data === false) {
            return redirect()->route('admin.sales.index')->with('alert', 'ファイルの内容が正しくありません');
        }
        DB::table(self::$table)->truncate();
        foreach (array_chunk($data, 1000) as $item) {
            Sales::insert($item);
        }
        return redirect()->route('admin.sales.csv')->with('notice', 'アップロードしました');
    }

    public function csvDownload() {
        $names = Sales::$names;
        $eles  = Sales::all();
        $name  = self::$table;
        $data  = $this->getElements($names, $eles);
        return $this->download($name, $data);
    }
}
