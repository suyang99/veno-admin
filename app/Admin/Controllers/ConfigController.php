<?php


namespace App\Admin\Controllers;


use App\Models\Config;
use Dcat\Admin\Form;
use Dcat\Admin\Http\Controllers\AdminController;
use Dcat\Admin\Layout\Content;


class ConfigController  extends AdminController
{
    protected $view = 'admin.config.editData';
    public function __construct()
    {
        $this->title = '系统配置';
    }
    public function editData(Content $content)
    {

        return $content
            ->header($this->translation())
            ->body(new Card(new Setting()));

    }
    protected function form()
    {


        return Form::make(new Config(), function (Form $form) {

            $form->tab('前台', function (Form $form) {
             $webData =   Config::query()->where('type','web')->get();

             foreach ($webData as $v){
                 $form->text($v['key'],$v['remark'])->value($v['value']);
             }

            })->tab('后台', function (Form $form) {

                $webData =   Config::query()->where('type','system')->get();

                foreach ($webData as $v){
                    $form->text($v['key'],$v['remark'])->value($v['value']);
                }

            })->tab('通用', function (Form $form) {

                $webData =   Config::query()->where('type','all')->get();

                foreach ($webData as $v){
                    $form->text($v['key'],$v['remark'])->value($v['value']);
                }
            });



            $form->saved(function (Form $form) {
                ///请求  common/reload_config
                return $form->response()->success('保存成功')->redirect('bank');
            });
        });
    }
}
