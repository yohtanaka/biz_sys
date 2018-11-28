<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;

class AppLayoutComposer
{
    public function compose(View $view)
    {
        $data['user']     = Auth::user()->getFullName();
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
