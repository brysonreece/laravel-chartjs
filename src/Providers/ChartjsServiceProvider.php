<?php

namespace brysonreece\LaravelChartJs\Providers;

use brysonreece\LaravelChartJs\Builder;
use brysonreece\LaravelChartJs\ChartBar;
use brysonreece\LaravelChartJs\ChartLine;
use brysonreece\LaravelChartJs\ChartPieAndDoughnut;
use brysonreece\LaravelChartJs\ChartRadar;
use Illuminate\Support\ServiceProvider;

class ChartjsServiceProvider extends ServiceProvider
{

    /**
     * Array with colours configuration of the chartjs config file
     * @var array
     */
    protected $colours = [];

    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'chart-template');
        $this->colours = config('chartjs.colours');
    }


    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('chartjs', function() {
            return new Builder();
        });
    }
}
