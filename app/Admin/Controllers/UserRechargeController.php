<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\UserRecharge;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Http\Controllers\AdminController;

class UserRechargeController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $model = (new UserRecharge())->with(['user','channel']);
        return Grid::make($model, function (Grid $grid) {
            $grid->column('id')->sortable();
            $grid->column('user.full_name','代理');
            $grid->column('user.invitation_code','邀请码');
            $grid->column('user.mobile','姓名/手机');
            $grid->column('','联系客户');
            $grid->column('channel.name','渠道');
            $grid->column('order_num');
            $grid->column('user_id');
            $grid->column('amount')->display(function ($amount) {
                return $amount/100;
            });;
            $grid->column('status')->display(function ($status) {
                $backStr = '待支付';
                if ($status == 1) {
                    $backStr = '待审核';
                }
                if ($status == 2) {
                    $backStr = '成功';
                }
                return $backStr;
            });
            $grid->column('created_at')->sortable();
            $grid->disableViewButton();
            $grid->disableBatchDelete();
            $grid->disableCreateButton();
            $grid->disableActions();
            $grid->setActionClass(Grid\Displayers\Actions::class);
            $grid->filter(function (Grid\Filter $filter) {
                $filter->equal('id');

            });
            $grid->actions(function (Grid\Displayers\Actions $actions)  {

                    $id = $actions->getKey();//获取该行数据id值
                    $actions->append("<button id='disble_btn' data-id='".$id."'
                        class=\"btn btn-block btn-warning btn-sm\" style=\"width:80px;\"  >
                        <i class='fa fa-times-circle'>确认到账</i></button>");

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
        return Show::make($id, new UserRecharge(), function (Show $show) {
            $show->field('id');
            $show->field('order_num');
            $show->field('user_id');
            $show->field('channel');
            $show->field('amount');
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
        return Form::make(new UserRecharge(), function (Form $form) {
            $form->display('id');
            $form->text('order_num');
            $form->text('user_id');
            $form->text('channel');
            $form->text('amount');
            $form->text('status');

            $form->display('created_at');
            $form->display('updated_at');
        });
    }
}
