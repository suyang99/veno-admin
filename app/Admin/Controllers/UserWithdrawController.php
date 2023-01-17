<?php

namespace App\Admin\Controllers;


use App\Models\UserWithdraw;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Repositories\EloquentRepository;
use Dcat\Admin\Show;
use Dcat\Admin\Http\Controllers\AdminController;
use Illuminate\Database\Eloquent\Model;

class UserWithdrawController extends AdminController
{
    protected $title="代付订单";
    protected $translation='代付订单';
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $model = (new UserWithdraw())->with(['user','bank']);
        return Grid::make($model, function (Grid $grid) {
            $grid->column('id')->sortable();
            $grid->column('user_id','用户id');
            $grid->column('user.invitation_code','邀请码');
            $grid->column('user.mobile','手机号码');
            $grid->column('user.mobile','手机号码');
            $grid->column('order_num','订单号');

            $grid->column('channel','渠道');
            $grid->column('amount','充值金额');
            $grid->column('charge','手续费');
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
        return Show::make($id, new UserWithdraw(), function (Show $show) {
            $show->field('id');
            $show->field('order_num');
            $show->field('user_id');
            $show->field('channel');
            $show->field('amount');
            $show->field('charge');
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
        return Form::make(new UserWithdraw(), function (Form $form) {
            $form->display('id');
            $form->text('order_num');
            $form->text('user_id');
            $form->text('channel');
            $form->text('amount');
            $form->text('charge');
            $form->text('status');

            $form->display('created_at');
            $form->display('updated_at');
        });
    }
}
