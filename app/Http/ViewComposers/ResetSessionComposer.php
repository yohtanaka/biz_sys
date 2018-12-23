<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;

class ResetSessionComposer
{
    /**
     * @return viod
     */
    public function compose(View $view)
    {
        session()->forget('_old_input');
        session()->forget('post_data');
        session()->forget('id');
    }
}
