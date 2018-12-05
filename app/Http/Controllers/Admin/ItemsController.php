<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ItemRequest;
use App\Models\Item;
use App\Traits\FormTrait;

class ItemsController extends Controller
{
    public function index(Request $request)
    {
        $data =[];
        // $data = $this->searchItem($request);
        return view('admin.items.index', $data);
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
        return view('admin.items.csv');
    }

    // public function csvUpload(CsvRequest $request) {
    //     $file  = $request->file('csvFile');
    //     $names = Sales::$names;
    //     $data  = Csv::upload($file, $names);
    //     if ($data === false) {
    //         return redirect()->route('admin.item.index')->with('alert', 'ファイルの内容が正しくありません');
    //     }
    //     DB::table(self::$table)->truncate();
    //     foreach (array_chunk($data, 1000) as $item) {
    //         Sales::insert($item);
    //     }
    //     return redirect()->route('admin.item.index')->with('notice', 'アップロードしました');
    // }

    // public function csvDownload() {
    //     $names = Sales::$names;
    //     $eles  = Sales::all();
    //     $name  = self::$table;
    //     $data  = Csv::getElements($names, $eles);
    //     return Csv::download($name, $data);
    // }
}
