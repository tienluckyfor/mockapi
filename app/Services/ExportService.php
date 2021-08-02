<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;

class ExportService
{
    private $date;
    private $zipFile;
    public function __construct()
    {
        $this->date = date('Y-m-d', time());
        $this->zipFile = Storage::path('public/exports/' . $this->date . '.zip');
        $this->add_dir();
    }

    public function add_dir($dName = '')
    {
        $fPath = Storage::path('public/exports/' . $this->date . '/' . $dName);
        if (is_dir($fPath) || mkdir($fPath)) {
            return $this;
        }
    }

    public function get_dir($dName = '')
    {
        return Storage::path('public/exports/' . $this->date . '/' . $dName);
    }

    public function zip($dPath = null, $fName = null)
    {
        // check zip install
        $output=null;
        exec('which zip', $output);
        if(empty($output)){
            $command = "apt-get install zip unzip -qy";
            dd($command);
        }
        if (!$dPath) {
            $dPath = $this->get_dir();
        }
        if (!$fName) {
            $fName = $this->zipFile;
        }
        $command = sprintf('cd %s; zip -r %s *', $dPath, $fName);
        exec($command);
        return $this;
    }

    public function download()
    {
        $this->zip();
        $command = sprintf('rm -rf %s', $this->get_dir());
        exec($command);
        return response()->download($this->zipFile)->deleteFileAfterSend();
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