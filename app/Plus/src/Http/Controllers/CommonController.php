<?php


namespace App\Plus\src\Http\Controllers;

use App\Plus\src\Forms\CommonForm;
use Dcat\Admin\Layout\Content;
use Dcat\Admin\Layout\Row;
use Dcat\Admin\Widgets\Form;
use Dcat\Admin\Widgets\Tab;
use Illuminate\Routing\Controller;

class CommonController extends Controller
{
    public function index(Content $content): Content
    {
        return $content->header('系统配置')
            ->description('提供了一些对站点配置')
            ->body(function (Row $row) {
                $tab = new Tab();
                $tab->addLink('前台', admin_route('dcat-plus.site.index'));
                $tab->addLink('后台', admin_route('dcat-plus.ui.index'));
                $tab->add('通用', new CommonForm(), true);
                $row->column(12, $tab->withCard());
            });
    }
}
