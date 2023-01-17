<?php

namespace App\Plus\src\Http\Middleware;

use App\Plus\src\Support;
use Closure;
use Illuminate\Http\Request;

class MiddleInjectDcatPlus
{
    public function handle(Request $request, Closure $next)
    {
        $support = new Support();
        $support->initConfig();
        $support->gridRowActionsRight();
        $support->injectFields();
        $support->footerRemove();

        return $next($request);
    }
}
