<?php

namespace App\Admin\Controllers;

use App\Models\Bank;
use App\Models\User;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Http\Controllers\AdminController;


class BankController extends AdminController
{


    public function __construct()
    {
        $this->title = '银行';
    }

    protected $description = [
        //        'index'  => 'Index',
        //        'show'   => 'Show',
        //        'edit'   => 'Edit',
        'create' => '添加',
    ];

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new Bank(), function (Grid $grid) {
            $grid->column('id', '编号')->sortable();
            $grid->column('user_id', '用户名')->display(function ($userId) {
                return User::find($userId)?->full_name;
            });
            $grid->column('account_num', '账号');
            $grid->column('ifsc');
            $grid->column('upi');
            $grid->column('status')->display(function ($released) {
                return $released == 0 ? '禁用' : '正常';
            });


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
        $bank = Bank::with('user');
        return Show::make($id, $bank, function (Show $show) {
            $show->field('user.full_name','用户名')->width(2);
            $show->field('account_num')->width(2);
            $show->field('ifsc')->width(2);
            $show->field('upi')->width(2);
            $show->status->using([0 => '禁用', 1 => '正常'])->width(2);


        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Form::make(new Bank(), function (Form $form) {
            if ($form->isCreating()) {
                $form->action('/bank/save');
            }
            if ($form->isEditing()) {
                $bank_id = $form->model()->id;
                $form->action('bank/upd/' . $bank_id);
                $form->hidden('id');
            }


            $form->select('user_id')->required()
                ->creationRules(['required', 'numeric'])
                ->width(2)->options(function ($id) {
                    $userData = User::find($id);
                    if ($userData) {
                        return [$userData->id => $userData->full_name];
                    }
                })->ajax('/api/user');

            $form->text('account_num')->required()->creationRules(['required', 'numeric'])->width(3);
            $form->text('ifsc')->width(2);
            $form->text('upi')->width(2);
            $form->select('status')->width(2, 2)->required()->options([0 => '禁用', 1 => '正常'])->default(1);

            /*  $form->display('created_at');
              $form->display('updated_at');*/

            $form->saved(function (Form $form) {
                return $form->response()->success('保存成功')->redirect('bank');
            });
        });
    }
}
