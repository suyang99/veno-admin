<?php

namespace App\Providers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        DB::listen(
            function ($sql) {
                foreach ($sql->bindings as $i => $binding) {
                    if ($binding instanceof \DateTime) {
                        $sql->bindings[$i] = $binding->format('\'Y-m-d H:i:s\'');
                    } else {
                        if (is_string($binding)) {
                            $sql->bindings[$i] = "'$binding'";
                        }
                    }
                }

                // Insert bindings into query
                $query = str_replace(array('%', '?'), array('%%', '%s'), $sql->sql);
                $query = vsprintf($query, $sql->bindings);
                // Save the query to file
                Log::channel('sql_log')->info('[日志跟踪]', ['sql' => $query]);
                /*   mkdir(  storage_path('logs' . DIRECTORY_SEPARATOR . date('Y-m-d') . '_query.log'),0777);
                   $logFile = fopen(
                       storage_path('logs' . DIRECTORY_SEPARATOR . date('Y-m-d') . '_query.log'),
                       'a+',
                   );
                   fwrite($logFile, date('Y-m-d H:i:s') . ': ' . $query . PHP_EOL);
                   fclose($logFile);*/
            }
        );
    }
}
