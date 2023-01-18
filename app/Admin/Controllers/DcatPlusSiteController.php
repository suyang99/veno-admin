<?php

namespace App\Admin\Controllers;

use App\Plus\src\Forms\DcatPlusSiteForm;
use Dcat\Admin\Layout\Content;
use Dcat\Admin\Layout\Row;
use Dcat\Admin\Widgets\Tab;
use Illuminate\Routing\Controller;

class DcatPlusSiteController extends Controller
{
    public function index(Content $content): Content
    {
        return $content->header('系统配置')
            ->description('提供了一些对站点配置')
            ->body(function (Row $row) {
                $tab = new Tab();
                $tab->add('前台', new DcatPlusSiteForm(), true);
                $tab->addLink('后台', admin_route('dcat-plus.ui.index'));
                $tab->addLink('通用', admin_route('dcat-plus.common.index'));
                $row->column(12, $tab->withCard());
            });
    }
}
