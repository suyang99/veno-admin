<?php

namespace App\Plus\src\Forms;
use App\Models\Config;
use App\Plus\src\Support;
use Dcat\Admin\Widgets\Form;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class DcatPlusSiteForm extends Form
{
    /**
     * Handle the form request.
     *
     * @param array $input
     *
     * @return mixed
     */
    public function handle(array $input)
    {

        $backData = Support::updateConfigData($input, 'web');
        if ($backData['status']) {
            return $this
                ->response()
                ->success($backData['msg'])
                ->refresh();
        } else {
            return $this->response()->error($backData['msg']);
        }
    }

    /**
     * Build a form here.
     */
    public function form()
    {
        $webData = Config::query()->where('type', 'web')->get();
        foreach ($webData as $v) {
            if ($v['input_type'] == 2) {
                $this->image($v['key'], $v['remark'])
                    ->autoUpload()
                    ->required()
                    ->uniqueName()
                    ->default( $v['value']);
            } else {
                $this->text($v['key'], $v['remark'])->required()
                    ->default($v['value']);
            }
        }
        /*$this->url('site_url', Support::trans('main.site_url'))
            ->help('站点域名决定了静态资源（头像、图片等）的显示路径，可以包含端口号，例如 http://chemex.it:8000 。')
            ->default(admin_setting('site_url'));
        $this->text('site_title', Support::trans('main.site_title'))
            ->default(admin_setting('site_title'));
        $this->text('site_logo_text', Support::trans('main.site_logo_text'))
            ->help('文本LOGO显示的优先度低于图片，当没有上传图片作为LOGO时，此项将生效。')
            ->default(admin_setting('site_logo_text'));
        $this->image('site_logo', Support::trans('main.site_logo'))
            ->autoUpload()
            ->uniqueName()
            ->default(admin_setting('site_logo'));
        $this->image('site_logo_mini', Support::trans('main.site_logo_mini'))
            ->autoUpload()
            ->uniqueName()
            ->default(admin_setting('site_logo_mini'));*/

    }
}
