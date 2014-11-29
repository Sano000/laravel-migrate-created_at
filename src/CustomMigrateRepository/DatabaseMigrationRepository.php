<?php
namespace CustomMigrateRepository;

use Carbon\Carbon;
use Illuminate\Database\Migrations\DatabaseMigrationRepository as OriginalRepository;

class DatabaseMigrationRepository extends OriginalRepository {

	/**
	 * Log that a migration was run.
	 *
	 * @param  string  $file
	 * @param  int     $batch
	 * @return void
	 */
	public function log($file, $batch)
	{
        $time = new Carbon;
        $record = array('migration' => $file, 'batch' => $batch, 'created_at' => $time);

		$this->table()->insert($record);
	}

	/**
	 * Create the migration repository data store.
	 *
	 * @return void
	 */
	public function createRepository()
	{
		$schema = $this->getConnection()->getSchemaBuilder();

		$schema->create($this->table, function($table)
		{
			// The migrations table is responsible for keeping track of which of the
			// migrations have actually run for the application. We'll create the
			// table to hold the migration file's path as well as the batch ID.
			$table->string('migration');

			$table->integer('batch');

            $table->timestamp('created_at');
		});
	}
}
