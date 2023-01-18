<?php


namespace App\Plus\src\Forms;


use App\Models\Config;
use App\Plus\src\ServiceProvider;
use App\Plus\src\Support;
use Dcat\Admin\Widgets\Form;
use Illuminate\Support\Facades\DB;

class CommonForm extends Form
{
    public function handle(array $input)
    {
        $backData = Support::updateConfigData($input, 'all');
        if ($backData['status']) {
            return $this
                ->response()
                ->success($backData['msg'])
                ->refresh();
        } else {
            return $this->response()->error($backData['msg']);
        }
    }

    public function form()
    {
        $webData = Config::query()->where('type', 'all')->get();
        foreach ($webData as $v) {
            if ($v['input_type'] == 2) {
                $this->image($v['key'], $v['remark'])
                    ->autoUpload()
                    ->uniqueName()
                    ->default($v['value']);
            } else {
                $this->text($v['key'], $v['remark'])
                    ->default($v['value']);
            }
        }
    }
}
