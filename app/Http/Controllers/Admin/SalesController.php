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

    /**
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data['s_order'] = $request->order;
        $data['list']    = Sales::changeOrder($data['s_order'])
                                ->paginate (10);
        $data['params']  = [
            'order' => $data['s_order'],
        ];
        return view('admin.sales.index', $data);
    }

    /**
     * @return \Illuminate\Http\Response
     */
    public function csv()
    {
        return view('admin.sales.csv');
    }

    /**
     * @param  \App\Http\Requests\CsvRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function csvUpload(CsvRequest $request)
    {
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

    /**
     * @return \App\Traits\CsvTrait
     */
    public function csvDownload()
    {
        $names = Sales::$names;
        $eles  = Sales::all();
        $name  = self::$table;
        $data  = $this->getElements($names, $eles);
        return $this->download($name, $data);
    }
}
