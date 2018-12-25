<?php

Form::macro('back', function($button, $route, $attributes = []) {
    $html = $route ? '<a href="' . route($route . '.index') . '"' : '<button type="submit" name="action" value="back"';
    foreach($attributes as $attribute => $value) {
        $html .= ' ' . $attribute . '="' . $value . '"';
    }
    $html .= '>' . $button;
    $html .= $route ? '</a>' : '</button>';
    return $html;
});
