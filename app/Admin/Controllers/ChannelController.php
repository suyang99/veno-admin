<?php

namespace App\Admin\Controllers;

use App\Models\Channel;
use Dcat\Admin\Admin;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Http\JsonResponse;
use Dcat\Admin\Show;
use Dcat\Admin\Http\Controllers\AdminController;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChannelController extends AdminController
{

    public $status = '';
    public function __construct()
    {
        $this->title = '支付通道';
    }

    /**
     * desc: 禁用通道
     * auth: ckg
     * date: 2023/1/16 16:58
     * @param $id
     * @return mixed
     */
    public function disablePay(Request $request)
    {
        try {
            $data = $request->all();
            DB::beginTransaction();
            Channel::query()->update(['status'=>0]);
            Channel::query()->where('id',$data['id'])->update(['status'=>1]);
            DB::commit();
            return JsonResponse::make()->success('成功！')->location('pay/channel');
        }catch (Exception $e){
            DB::rollBack();
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
        return Grid::make(new Channel(), function (Grid $grid) {

            $grid->setActionClass(Grid\Displayers\Actions::class);
            $grid->column('id')->sortable();
            $grid->column('name');
            $grid->column('configs');
            $grid->column('status');
            $grid->column('status')->display(function ($status) {
                $this->status =$status;
                return $status == 1 ? '<label style="color:#00d95a;border: 1px solid;padding: 8px 15px;">启用 </label>' :
                    '<label   style="color:red;border: 1px solid;padding: 8px 15px; ">禁用</label>';
            });

            $grid->disableCreateButton();
            $grid->disableDeleteButton();
            $grid->disableQuickEditButton();
            $grid->disableEditButton();
            $grid->disableViewButton();
            $grid->disableBatchDelete();
            $grid->actions(function (Grid\Displayers\Actions $actions)  {
                if ($this->status == 0) {
                    $id = $actions->getKey();//获取该行数据id值
                    $actions->append("<button id='disble_btn' data-id='".$id."'
                        class=\"btn btn-block btn-success btn-sm\" style=\"width:80px;\"  >
                        <i class='fa fa-times-circle'>禁用</i></button>");
                }
            });

            $grid->filter(function (Grid\Filter $filter) {
                $filter->equal('id');
            });;
            $url = admin_url('pay/channel/disable');
            $indexUrl = admin_url('pay/channel');
            Admin::script(
                <<<JS

 $(document).on('click','#disble_btn',function (){
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
        return Show::make($id, new Channel(), function (Show $show) {
            $show->field('id');
            $show->field('name');
            $show->field('configs');
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
        return Form::make(new Channel(), function (Form $form) {
            $form->display('id');
            $form->text('name');
            $form->text('configs');
            $form->text('status');

            $form->display('created_at');
            $form->display('updated_at');
        });
    }
}
