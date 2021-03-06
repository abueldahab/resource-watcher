<?php namespace JasonLewis\ResourceWatcher;

use Illuminate\Support\ServiceProvider;

class ResourceWatcherServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app['watcher'] = $this->app->share(function($app)
		{
			$tracker = new Tracker;

			return new ResourceWatcher($tracker, $app['files']);
		});
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array('watcher', 'commmands.watch');
	}

}