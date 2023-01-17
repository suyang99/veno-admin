<?php

namespace App\Admin\Controllers;


use App\Models\OrderExchange;
use Dcat\Admin\Admin;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Http\JsonResponse;
use Dcat\Admin\Show;
use Dcat\Admin\Http\Controllers\AdminController;
use Illuminate\Http\Request;

class OrderExchangeController extends AdminController
{
    protected $title = '支付订单';
    protected $description = '支付';


    public function confirmPay(Request $request): JsonResponse
    {
        $data = $request->all();
       $res = OrderExchange::query()->where('id',$data['id'])->update(['status'=>2]);
       if($res){
           return JsonResponse::make()->success('成功！')->location('pay/channel');
       }else{
           return JsonResponse::make()->alert(true)->error('失败！')->location('pay/channel');
       }

    }
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new OrderExchange(), function (Grid $grid) {
            $grid->model()->with(['user']);
            $grid->setActionClass(Grid\Displayers\Actions::class);
            $grid->column('id')->sortable();
            $grid->column('user.full_name', '用户名');
            //   $grid->column('goods_id');
            $grid->column('order_num');
            $grid->column('amount');
            $grid->column('gain');
            $grid->column('direction')->display(function ($direction) {
                $backStr = '';
                if ($direction == 1) {
                    $backStr = 'call';
                }
                if ($direction == 2) {
                    $backStr = 'put';
                }
                return $backStr;
            });
            $grid->column('opening');
            $grid->column('closing');
            $grid->column('result')->display(function ($status) {
                $backStr = '';
                if ($status == 1) {
                    $backStr = '盈利';
                }
                if ($status == 2) {
                    $backStr = '亏损';
                }
                return $backStr;
            });
            $grid->column('status')->display(function ($status) {
                $backStr = '';
                if ($status == 1) {
                    $backStr = '挂起';
                }
                if ($status == 2) {
                    $backStr = '完成';
                }
                return $backStr;
            });
            $grid->column('created_at')->sortable();
            $grid->filter(function (Grid\Filter $filter) {
                $filter->equal('id');

            });
            $grid->disableCreateButton();
            $grid->disableDeleteButton();
            $grid->disableQuickEditButton();
            $grid->disableEditButton();
            $grid->disableViewButton();
            $grid->disableBatchDelete();

            $grid->actions(function (Grid\Displayers\Actions $actions) {
                $id = $actions->getKey();//获取该行数据id值
                $actions->append("<button id='pay_btn' data-id='" . $id . "'
                    class=\"btn btn-block btn-success btn-sm\" style=\"width:80px;\"  >
                   确认到账</button>");

            });

            $url = admin_url('pay/confirm');
            $indexUrl = admin_url('pay/list');
            Admin::script(
                <<<JS

 $(document).on('click','#pay_btn',function (){
        id = $(this).attr('data-id');
        $.ajax({
            url:'$url',
            data:{'id':id},
            type:'POST',
            dataType:'json',
            success:function (res){
                 layer.alert(res.data.message);
                 setTimeout(function () {
                    Dcat.reload('$indexUrl');
                }, 3000);
            }
        })
 })
    function disableStatus (id){

    }
JS
            );
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
        return Show::make($id, new OrderExchange(), function (Show $show) {
            $show->field('id');
            $show->field('user_id');
            $show->field('goods_id');
            $show->field('order_num');
            $show->field('amount');
            $show->field('gain');
            $show->field('direction');
            $show->field('opening');
            $show->field('closing');
            $show->field('result');
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
        return Form::make(new OrderExchange(), function (Form $form) {
            $form->display('id');
            $form->text('user_id');
            $form->text('goods_id');
            $form->text('order_num');
            $form->text('amount');
            $form->text('gain');
            $form->text('direction');
            $form->text('opening');
            $form->text('closing');
            $form->text('result');
            $form->text('status');

            $form->display('created_at');
            $form->display('updated_at');
        });
    }
}
