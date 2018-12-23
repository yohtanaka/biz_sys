<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Models\User;
use App\Models\Section;
use App\Models\Position;

class UserParamComposer
{
    /**
     * @return void
     */
    public function compose(View $view)
    {
        $view->with([
            'roles'     => User::$roles,
            'gender'    => User::$gender,
            'sections'  => Section::names(),
            'positions' => Position::names(),
        ]);
    }
}
