<?php

namespace App\Admin\Controllers;

use App\Models\User;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Http\Controllers\AdminController;

class UserController extends AdminController
{
    public function __construct(){
        $this->title='用户';

    }
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new User(), function (Grid $grid) {
            $grid->column('id','用户id')->sortable();
            $grid->column('parent_id');
            $grid->column('sales_id');
            $grid->column('username');
            $grid->column('full_name');
            $grid->column('mobile');
            $grid->column('email');

            $grid->column('salt');
            $grid->column('invitation_code');
            $grid->column('last_login');
            $grid->column('login_times');
            $grid->column('status');
            $grid->column('created_at')->sortable();

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
        return Show::make($id, new User(), function (Show $show) {
            $show->field('id');
            $show->field('parent_id');
            $show->field('sales_id');
            $show->field('username');
            $show->field('full_name');
            $show->field('mobile');
            $show->field('email');
            $show->field('password');
            $show->field('salt');
            $show->field('last_login');
            $show->field('login_times');
            $show->field('status');
            $show->field('invitation_code');
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
        return Form::make(new User(), function (Form $form) {
            if ($form->isCreating()) {
                $form->action('user/save');
            }

            $form->ignore(['status']);
            $form->display('id');
            $form->select('parent_id')
                ->creationRules(['numeric'])
                ->width(2)->options(function ($id) {
                    $userData = User::query()->find($id);
                    if ($userData) {
                        return [$userData->id => $userData->full_name];
                    }
                })->ajax('/api/user');

         //   $form->text('parent_id')->width(2,2);
            $form->text('sales_id')->width(2,2);
            $form->text('username')->width(2,2);
            $form->text('full_name')->width(3);
            $form->text('mobile')->width(2);
            $form->text('email')->width(3);
            $form->text('password')->width(3);
            $form->select('status')->width(2,2)->options([0 => '永久封禁', 1 => '正常']);
            $form->display('created_at');
            $form->display('updated_at');

            $form->saved(function (Form $form) {
                $invitationData = User::query()->pluck('invitation_code');
                $randData= [];
                for ($i = 0; $i < 10; $i++) {
                    $randData[]=mt_rand(100000,999999);
                }
                $diffArr = array_diff($randData,$invitationData);

                $form->invitation_code=$diffArr[0];
                return $form->response()->success('保存成功')->redirect('user');
            });

        });
    }
}
