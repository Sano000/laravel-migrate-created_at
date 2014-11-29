laravel-migrate-created_at
==========================

Sample code how to add a created_at field to the migrates table in Laravel 4.2

*composer.json*
```
  "require": {
    "sano000/laravel-migrate-created_at": "dev-master"
  },
  "repositories": [
    { 
      "type": "git", 
      "url": "git@github.com:Sano000/laravel-migrate-created_at.git" 
    }
  ],
```

*app/config/app.php*

replace

`Illuminate\Database\MigrationServiceProvider`

with

`CustomMigrateRepository\MigrationServiceProvider`
