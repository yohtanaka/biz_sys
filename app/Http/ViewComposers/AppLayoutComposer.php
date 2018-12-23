<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;

class AppLayoutComposer
{
    /**
     * @return viod
     */
    public function compose(View $view)
    {
        $view->with([
            'current_user' => Auth::user()->getFullName(),
            'greeting'     => $this->greeting(),
        ]);
    }

    /**
     * @return string
     */
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
