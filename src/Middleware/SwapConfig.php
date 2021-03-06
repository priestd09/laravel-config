<?php

namespace Recca0120\Config\Middleware;

use Recca0120\Config\Contracts\Repository;
use Illuminate\Contracts\Foundation\Application;

class SwapConfig
{
    /**
     * $app.
     *
     * @var \Illuminate\Contracts\Foundation\Application
     */
    protected $app;

    /**
     * $config.
     *
     * @var \Recca0120\Config\Contracts\Repository
     */
    protected $config;

    /**
     * __construct.
     *
     * @param \Illuminate\Contracts\Foundation\Application $app
     * @param \Recca0120\Config\Contracts\Repository $config
     */
    public function __construct(Application $app, Repository $config)
    {
        $this->app = $app;
        $this->config = $config;
    }

    /**
     * handle.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle($request, $next)
    {
        $this->app->instance('config', $this->config);
        date_default_timezone_set($this->config->get('app.timezone'));

        return $next($request);
    }
}
