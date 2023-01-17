<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\Article;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Http\Controllers\AdminController;

class NoticeController extends AdminController
{

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new Article(), function (Grid $grid) {
            $grid->column('id')->sortable();

            $grid->column('type')->display(function ($type) {
                return $type == 1 ? '公告' : 'banner';
            });
            $grid->column('title');
            /* $grid->column('metro');
             $grid->column('content');
             $grid->column('image');
             $grid->column('image_route');*/
            $grid->column('status')->display(function ($status) {
                return $status ? '展示' : '关闭';
            });
            $grid->column('created_at', '时间');
            $grid->setActionClass(Grid\Displayers\Actions::class);
            $grid->disableViewButton();
            $grid->disableBatchDelete();
            $grid->filter(function (Grid\Filter $filter) {
                $filter->equal('id');

            });
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
        return Show::make($id, new Article(), function (Show $show) {
            $show->field('id');
            $show->field('type');
            $show->field('title');
            $show->field('metro');
            $show->field('content');
            $show->field('image');
            $show->field('image_route');
            $show->field('status');
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
        return Form::make(new Article(), function (Form $form) {
            if ($form->isCreating()) {
                $form->action('/notice/save');
            }
            if ($form->isEditing()) {
                $id = $form->model()->id;
                $form->action('/notice/upd/'.$id);
                $form->hidden('id');
            }

            $form->hidden('type')->default(2);
            $form->text('title')->required();
            /* $form->text('metro');
             $form->text('content');*/
            $form->image('image')->url('users/files')
                ->autoUpload()
                ->uniqueName();

            $form->text('image_route')->required()->prepend('http://');

            $form->radio('status')->options(['0' => '关闭', '1' => '展示'])->default('1');

        });
    }



}
