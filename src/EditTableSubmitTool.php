<?php
/**
 * Created by dai.yamaguchi
 * DATE: 2019/07/26
 *
 */

namespace EditTable;


use Encore\Admin\Grid\Tools\AbstractTool;


class EditTableSubmitTool extends AbstractTool {
    /** @var string Ajax登録先となるURL */
    private $submit_url;

    private $button_name;

    public function __construct($submit_url) {
        $this->submit_url = $submit_url;
        $this->button_name = _msg('確定');

    }

    /**
     * 確定ボタン描画
     * @return string
     */
    public function render() {
        $url = $this->submit_url;
        $button_id= 'test';
        $view = <<<EOF
<div class="btn-group pull-right" style="margin-right: 10px">
    <button id={$button_id} class="btn btn-sm btn-primary"><span class="hidden-xs">{$this->button_name}</span></button>
</div>
EOF;

        \Admin::script("TableEditableAction().Init('".$url."','".$button_id."')");
        return $view;
    }

}