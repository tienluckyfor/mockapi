<?php

namespace App\Services;

abstract class Backup_Abstract
{
    protected $date;
    protected $dZip;
    protected $rDir;
    protected $dDir;

    public function __construct()
    {
        $this->date = date('Y-m-d', time());
        $this->dDir = $this->rDir . '/' . $this->date;
        $this->dZip = $this->rDir . '/' . $this->date . '.zip';
    }

    public function add_dir($dName = '')
    {
        $fPath = $this->dDir . '/' . $dName;
        if (is_dir($fPath) || mkdir($fPath)) {
            return $this;
        }
    }

    public function get_dir($dName = '')
    {
        return $this->dDir . '/' . $dName;
    }

    public function check_command($command)
    {
        $output = null;
        exec("which $command", $output);
        if (empty($output)) {
            $command = "apt-get install $command -qy";
            dd($command);
        }
    }

    public function zip($dPath = null, $fName = null)
    {
        $this->check_command('zip');
        if (!$dPath) {
            $dPath = $this->get_dir();
        }
        if (!$fName) {
            $fName = $this->dZip;
        }
        $command = sprintf('cd %s; zip -r %s *', $dPath, $fName);
        exec($command);
        return $this;
    }

    public function unzip($fName, $dPath)
    {
        if (!(is_dir($dPath) || mkdir($dPath))) {
            dd('mkdir -m 777 -p '.$dPath);
        }
        $this->check_command('unzip');
        $command = sprintf('unzip %s -d %s', $fName, $dPath);
        exec($command);
        return $this;
    }

    public function download()
    {
        $this->zip();
        $command = sprintf('rm -rf %s', $this->get_dir());
        exec($command);
        return response()->download($this->dZip)->deleteFileAfterSend();
    }
}