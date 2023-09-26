<?php

declare(strict_types=1);

namespace Codeat3\BladeVaadinIcons;

use BladeUI\Icons\Factory;
use Illuminate\Contracts\Container\Container;
use Illuminate\Support\ServiceProvider;

final class BladeVaadinIconsServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->registerConfig();

        $this->callAfterResolving(Factory::class, function (Factory $factory, Container $container) {
            $config = $container->make('config')->get('blade-vaadin-icons', []);

            $factory->add('vaadin-icons', array_merge(['path' => __DIR__ . '/../resources/svg'], $config));
        });
    }

    private function registerConfig(): void
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/blade-vaadin-icons.php', 'blade-vaadin-icons');
    }

    public function boot(): void
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../resources/svg' => public_path('vendor/blade-vaadin-icons'),
            ], 'blade-vaadin'); // TODO: change this alias to `blade-vaadin-icons` in next major release

            $this->publishes([
                __DIR__ . '/../config/blade-vaadin-icons.php' => $this->app->configPath('blade-vaadin-icons.php'),
            ], 'blade-vaadin-icons-config');
        }
    }
}
