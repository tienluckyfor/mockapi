<?php

namespace App\Services\Backup;
use Illuminate\Support\Facades\Storage;

class ExportService extends Backup_Abstract
{

    public function __construct()
    {
        $this->rDir = Storage::path('public/exports');
        parent::__construct();
        $this->add_dir();
    }

    public function database()
    {
        $countDB = 0;
        foreach ($_ENV as $key => $item) {
            if (preg_match('#DB.*?HOST#mis', $key)) {
                $host = $item;
            }
            if (preg_match('#DB.*?USERNAME#mis', $key)) {
                $username = $item;
            }
            if (preg_match('#DB.*?PASSWORD#mis', $key)) {
                $password = $item;
            }
            if (preg_match('#DB.*?DATABASE#mis', $key)) {
                $database = $item;
            }
            if (isset($host, $username, $password, $database)) {
                $this->add_dir('database');
                $fPath = $this->get_dir('database') . '/' . $database . '.sql';
                $command = sprintf('mysqldump -h %s -u %s -p\'%s\' %s > %s', $host, $username, $password, $database,
                    $fPath);
                exec($command);
                unset($host, $username, $password, $database);
                $countDB += (int)file_exists($fPath);
            }
        }
        return $this;
    }

    public function files($dName = '')
    {
        $dPath = Storage::path('public/' . $dName);
        $fName = $this->get_dir() . $dName . '.zip';
        $this->zip($dPath, $fName);
        return $this;
    }
}