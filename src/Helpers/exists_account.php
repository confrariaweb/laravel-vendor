<?php
if (!function_exists('existsAccount')) {
    function existsAccount(){
        return in_array("ConfrariaWeb\Account\Providers\AccountServiceProvider", get_declared_classes());
     }
}