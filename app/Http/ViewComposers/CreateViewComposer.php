-<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use Illuminate\Http\Request;

class CrudBaseComposer
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
                if (session()->has('id')) {
                    $edit = 'edit';
                    $id = session()->get('id');
                } else {
                    $edit = false;
                }
                session()->keep('images');
                $view->with('show', 'show');
                $view->with('edit', $edit);
                $view->with('id', $id);
                break;

            case ('edit'):
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
