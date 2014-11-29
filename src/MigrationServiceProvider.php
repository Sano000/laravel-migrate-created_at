<?php
namespace CustomMigrateRepository;

use CustomMigrateRepository\DatabaseMigrationRepository;
use Illuminate\Database\MigrationServiceProvider as OriginalMigrationServiceProvider;

class MigrationServiceProvider extends OriginalMigrationServiceProvider {

	/**
	 * Register the migration repository service.
	 *
	 * @return void
	 */
	protected function registerRepository()
	{
		$this->app->bindShared('migration.repository', function($app)
		{
			$table = $app['config']['database.migrations'];

			return new DatabaseMigrationRepository($app['db'], $table);
		});
	}
}
