<?php

namespace App\library;

class Time
{
    static function greeting() {
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
