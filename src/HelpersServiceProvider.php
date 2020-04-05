<?php

namespace Merax\Helpers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;

class HelpersServiceProvider extends ServiceProvider
{

    public function boot(): void
    {
        $helpersPath = __DIR__ . DIRECTORY_SEPARATOR . 'features';
        foreach (scandir($helpersPath) as $helperFile) {
            $path = sprintf(
                '%s%s%s%s%s',
                __DIR__,
                DIRECTORY_SEPARATOR,
                'features',
                DIRECTORY_SEPARATOR,
                $helperFile
            );

            if (!is_file($path)) {
                continue;
            }

            $function = Str::before($helperFile, '.php');

            if (\function_exists($function)) {
                continue;
            }

            require_once $path;
        }

    }
}
