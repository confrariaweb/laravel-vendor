<?php
if (!function_exists('cwLayout')) {
    function cwLayout($layout, $dashboard = false)
    {
        $envLayout = env('CW_LAYOUT', 'layouts.app');
        if ($dashboard) {
            $envLayout = env('CW_DASHBOARD_LAYOUT', 'layouts.app');
        }
        return $envLayout . $layout;
    }
}