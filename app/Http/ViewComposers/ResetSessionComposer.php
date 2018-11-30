<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;

class ResetSessionComposer
{
    public function compose(View $view)
    {
        session()->forget('_old_input');
        session()->forget('id');
    }
}
