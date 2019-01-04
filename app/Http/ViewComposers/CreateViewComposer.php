<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use Illuminate\Http\Request;

class CreateViewComposer
{
    public function compose(View $view)
    {
        $path = basename(url()->current());
        switch ($path) {
            case ('create'):
                if (session()->has('id')) {
                    $this->deleteSessions(['id', 'post_data', '_old_input', 'section']);
                }
                if (!session()->exists('_old_input')) {
                    $this->deleteSessions(['images', 'post_data', 'section']);
                } else {
                    session()->keep('images');
                }
                $view->with('show', false);
                $view->with('edit', false);
                break;

            case ('confirm'):
                session()->keep('images');
                if (session()->has('id')) {
                    $view->with('edit', true);
                    $view->with('id', session()->get('id'));
                } else {
                    $view->with('edit', false);
                }
                $view->with('show', 'confirm');
                break;

            case ('edit'):
                if (!session()->exists('_old_input')) {
                    session()->forget('post_data');
                }
                $view->with('show', false);
                $view->with('edit', true);
                break;

            default:
                $view->with('show', 'show');
                $view->with('edit', false);
                break;
        }
    }

    public function deleteSessions($sessions) {
        foreach ($sessions as $val) {
            session()->forget($val);
        }
    }
}
