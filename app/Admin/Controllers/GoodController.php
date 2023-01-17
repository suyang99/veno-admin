<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\Good;
use Dcat\Admin\Admin;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Http\Controllers\AdminController;

class GoodController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new Good(), function (Grid $grid) {
            $grid->column('id')->sortable();
            $grid->column('name');
            $grid->column('symbol');
            $grid->column('status')->display(function ($status) {
                $backStr = '自动';
                if ($status == -1) {
                    $backStr = '跌盈利';
                }
                if ($status == 1) {
                    $backStr = '涨盈利';
                }
                return $backStr;
            });
            $grid->column('direction');

            $grid->filter(function (Grid\Filter $filter) {
                $filter->equal('id');

            });
            $grid->setActionClass(Grid\Displayers\Actions::class);
            $grid->disableCreateButton();
            $grid->disableDeleteButton();
            $grid->disableQuickEditButton();
            $grid->disableEditButton();
            $grid->disableViewButton();
            $grid->disableBatchDelete();

            $grid->actions(function (Grid\Displayers\Actions $actions) {
                $id = $actions->getKey();//获取该行数据id值
                $str ="<div class='tb-but-list' > <button   data-id='" . $id . "'
                    class=\"btn btn-block btn-success btn-sm\" style=\"width:80px;\"  >
                   涨盈利</button>
                   <button   data-id='" . $id . "'
                    class=\"btn btn-block btn-success btn-sm\" style=\"width:80px;margin-top: 0px;\"  >
                   跌盈利</button>
                   <button  data-id='" . $id . "'
                    class=\"btn btn-block btn-success btn-sm\" style=\"width:80px;margin-top: 0px;\"  >
                   恢复自动</button></div>";
                $actions->append($str);

            });
            Admin::style(
                <<<STYLE
.grid__actions__{width:300px;}
.tb-but-list {display: flex;flex-direction: row;}
    .tb-but-list button{margin-left:10px;}
STYLE);

        });
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     *
     * @return Show
     */
    protected function detail($id)
    {
        return Show::make($id, new Good(), function (Show $show) {
            $show->field('id');
            $show->field('name');
            $show->field('symbol');
            $show->field('period');
            $show->field('size');
            $show->field('status');
            $show->field('direction');
            $show->field('created_at');
            $show->field('updated_at');
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Form::make(new Good(), function (Form $form) {
            $form->display('id');
            $form->text('name');
            $form->text('symbol');
            $form->text('period');
            $form->text('size');
            $form->text('status');
            $form->text('direction');

            $form->display('created_at');
            $form->display('updated_at');
        });
    }
}
