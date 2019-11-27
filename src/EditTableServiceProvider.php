<?php
/**
 * Created by dai.yamaguchi
 * DATE: 2019/11/27
 *
 */

namespace EditTable;


use Admin;
use Illuminate\Support\ServiceProvider;

class EditTableServiceProvider extends ServiceProvider{

    function boot(EditTableExtension $extension){
        if (!EditTableExtension::boot()) {
            return;
        }

        $this->loadViewsFrom($extension->views(), 'table-editable');

        if ($this->app->runningInConsole() && $assets = $extension->assets()) {
            $this->publishes(
                [$assets => public_path('vendor/table-editable')]
                , 'table-editable'
            );
        }
        Admin::booting(function () {
            Admin::js('vendor/table-editable/table-editable.js');
        });

    }
}