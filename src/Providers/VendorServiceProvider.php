<?php

namespace ConfrariaWeb\Vendor\Providers;

use ConfrariaWeb\Vendor\Components\Alert;
use ConfrariaWeb\Vendor\Components\CrudButtons;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class VendorServiceProvider extends ServiceProvider
{

    public function boot()
    {
        $this->loadViewsFrom(__DIR__ . '/../Views', 'cwVendor');
        //$this->loadTranslationsFrom(__DIR__ . '/../Translations', 'vendor');
        $this->publishes([__DIR__ . '/../../config/cw_vendor.php' => config_path('cw_vendor.php')], 'config');

        Blade::component('alert', Alert::class);
        Blade::component('crud-buttons', CrudButtons::class);

        Blade::directive('datetime', function ($expression) {
            return "<?php echo ($expression)->format('d/m/Y H:i'); ?>";
        });

        Blade::directive('date', function ($expression) {
            return "<?php echo ($expression)->format('d/m/Y'); ?>";
        });

        Blade::directive('time', function ($expression) {
            return "<?php echo ($expression)->format('H:i'); ?>";
        });

    }

    public function register()
    {

    }

}
