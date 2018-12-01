<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Models\News;

class NewsParamComposer
{
    public function compose(View $view)
    {
        $view->with([
            'type'       => News::$type,
            'display'    => News::$display,
            'news_count' => count(News::all()),
        ]);
    }
}
