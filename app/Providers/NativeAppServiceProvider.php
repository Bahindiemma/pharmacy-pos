<?php

namespace App\Providers;

use Native\Laravel\Facades\Window;
use Native\Laravel\Contracts\ProvidesPhpIni;

class NativeAppServiceProvider implements ProvidesPhpIni
{




public function boot(): void
{
Window::open();
}




public function phpIni(): array
{
return [
'memory_limit' => '512M',
'display_errors' => '1',
'error_reporting' => 'E_ALL',
'max_execution_time' => '0',
'max_input_time' => '0',
];
}
}
