<?php

namespace App\Traits;

use App\Models\News;

trait PostNewsTrait
{
    /**
     * @param \Illuminate\Http\Request  $request
     * @return array
     */
    private function searchNews($request)
    {
        $data['s_name']    = $request->name;
        $data['s_type']    = $request->type;
        $data['s_display'] = $request->display;
        $data['s_order']   = $request->order;
        $data['list']      = News::nameIn('title', $data['s_name'])
                                 ->orNameIn('body', $data['s_name'])
                                 ->nameEqual('type', $data['s_type'])
                                 ->nameEqual('display_flag', $data['s_display'])
                                 ->changeOrder($data['s_order'])
                                 ->paginate (10);
        $data['params']    = [
            'name'    => $data['s_name'],
            'type'    => $data['s_type'],
            'display' => $data['s_display'],
            'order'   => $data['s_order'],
        ];
        return $data;
    }
}
