<?php

use Illuminate\Support\Facades\Cache;

if (!function_exists('cwView')) {
    function cwView($view, $dashboard = false)
    {
        $envView = '';
        if ($dashboard) {
            $envView = config('cw_vendor.backend.views', '');
        }
        if (!$dashboard) {
            $envView = Cache::remember('envView', 0, function () {
                $host = parse_url(url()->current())['host'];
                $site = resolve('SiteService')->findByDomain($host);
                if($site) {
                    return $site->template['load_views_from'] . '::';
                }
                return env('CW_VIEWS', '');
            });
        }
        return $envView . $view;
    }
}