<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Artisan;
use App\Admin\Quest;
use Spatie\Backup\Events\BackupHasFailed;
use Spatie\Backup\Exceptions\InvalidCommand;
use Spatie\Backup\Tasks\Backup\BackupJobFactory;
use Exception;

class BackupController extends Controller
{

    public function show(Request $request)
    {

        return view('admin.backup.index');
    }

    public function backup(Request $request)
    {
        //$res = Artisan::call('backup:run');
        echo "Starting backup...";
        dd(Artisan::call("backup:run", ["--only-db"=>true]));
        //exec("php artisan backup:run --only-db");
        /*try {
            $backupJob = BackupJobFactory::createFromArray(config('laravel-backup'));


            $backupJob->doNotBackupFilesystem();

            $backupJob->run();

            echo 'Backup completed!';
            //consoleOutput()->comment('Backup completed!');
        } catch (Exception $exception) {
            //consoleOutput()->error("Backup failed because: {$exception->getMessage()}.");

            event(new BackupHasFailed($exception));

            return -1;
        }*/

    }

    public function clean(Request $request)
    {
        $res = Artisan::call('backup:clean');
        dd($res);
    }

    protected function guardAgainstInvalidOptions()
    {
        if ($this->option('only-db') && $this->option('only-files')) {
            throw InvalidCommand::create('Cannot use only-db and only-files together');
        }
    }
}
