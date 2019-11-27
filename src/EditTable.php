<?php
/**
 * Created by dai.yamaguchi
 * DATE: 2019/11/27
 *
 */

namespace EditTable;

use Encore\Admin\Widgets\Table;

class EditTable extends Table {

    protected $view = 'table-editable::table';
    /** @var array 編集可能項目 */
    private $edit_target_list = [];

    /**
     * EditTable constructor.
     * @param $headers
     * @param $columns
     * @param $model
     */
    function __construct($headers, $columns, $model) {
        $headers = array_merge(['id'], $headers);
        $columns = array_merge(['id'], $columns);

        $rows = $model->get()->map(function ($row) use ($columns) {
            return $row->only($columns);
        })->toArray();
        parent::__construct($headers, $rows, []);
    }

    /**
     * 編集可能項目の設定
     * @param $target
     * @return $this
     */
    function editable($target) {
        $this->edit_target_list[] = $target;
        return $this;
    }

    /**
     * @return string
     * @throws \Throwable
     */
    function render() {

        $vars = [
            'headers' => $this->headers,
            'rows' => $this->rows,
            'style' => $this->style,
            'attributes' => $this->formatAttributes(),
            'edit_list' => $this->edit_target_list,
            'pk_key'=>'id'
        ];

        return view($this->view, $vars)->render();
    }

}