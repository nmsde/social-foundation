<?php
/**
 * Created by PhpStorm.
 * User: jimmitjoo
 * Date: 14-08-23
 * Time: 22:22
 */

namespace HACKson\Providers;


use Illuminate\Support\ServiceProvider;

/**
 * Class EventsServiceProvider
 * @package HACKson\Providers
 */
class EventServiceProvider extends ServiceProvider {

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app['events']->listen('HACKson.*', 'HACKson\Handlers\EmailNotifier');
    }
}