<?php

namespace App\Admin\Controllers;

use App\Plus\src\Forms\DcatPlusUIForm;
use Dcat\Admin\Layout\Content;
use Dcat\Admin\Layout\Row;
use Dcat\Admin\Widgets\Tab;
use Illuminate\Routing\Controller;

class DcatPlusUIController extends Controller
{
    public function index(Content $content): Content
    {
        return $content->header('增强配置')
            ->description('提供了一些对站点增强的配置')
            ->body(function (Row $row) {
                $tab = new Tab();
                $tab->addLink('前台', admin_route('dcat-plus.site.index'));
                $tab->add('后台', new DcatPlusUIForm(), true);
                $tab->addLink('通用', admin_route('dcat-plus.common.index'));
                $row->column(12, $tab->withCard());
            });
    }
}
