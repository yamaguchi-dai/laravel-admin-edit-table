<?php
/**
 * Created by dai.yamaguchi
 * DATE: 2019/11/27
 *
 */

namespace EditTable;


use Encore\Admin\Extension;

class EditTableExtension extends Extension {

    public $name = 'table-editable';

    public $views = __DIR__.'/../resources/views';

    public $assets = __DIR__.'/../resources/assets';
}