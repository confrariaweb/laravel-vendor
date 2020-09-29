<?php
if (!function_exists('cwView')) {
    function cwView($view, $dashboard = false)
    {
        $envView= env('CW_VIEWS', '');
        if ($dashboard) {
            $envView = env('CW_DASHBOARD_VIEWS', '');
        }
        return $envView . $view;
    }
}