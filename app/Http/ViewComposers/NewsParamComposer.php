<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Models\News;

class NewsParamComposer
{
    /**
     * @return viod
     */
    public function compose(View $view)
    {
        $view->with([
            'type'    => News::$type,
            'display' => News::$display,
        ]);
    }
}
