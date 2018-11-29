<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Models\Section;
use App\Models\Position;

class UserDataComposer
{
    public function compose(View $view)
    {
        $data['sections']  = Section::names();
        $data['positions'] = Position::names();
        $view->with('userData', $data);
    }
}
