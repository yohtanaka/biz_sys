<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use Auth;

class AppLayoutComposer
{
    public function compose(View $view)
    {
        $user             = Auth::user();
        $data['user']     = $user['last_name'] . $user['first_name'];
        $data['greeting'] = $this->greeting();
        $view->with('appLayout', $data);
    }

    protected function greeting() {
        $time = date('H');
        switch ($time) {
            case $time < 6:
                $greeting = 'おやすみなさい…';
                break;
            case $time < 12:
                $greeting = 'おはようございます！';
                break;
            case $time < 18:
                $greeting = 'こんにちは！';
                break;
            default:
                $greeting = 'こんばんは！';
                break;
        }
        return $greeting;
    }
}
