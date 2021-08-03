<?php

namespace App\Services\Backup;

use App\Services\ArrService;
use Illuminate\Support\Facades\Storage;

class ImportService extends Backup_Abstract
{
    public function __construct()
    {
        $this->rDir = Storage::path('public/imports');
        parent::__construct();
    }

    public function take($export_url)
    {
        $client = new \GuzzleHttp\Client();
//        $exportUrl = 'https://be.mockapi.codeby.com/export';
        $fName = "{$this->rDir}/{$this->date}.zip";
        $client->request('GET', $export_url, ['sink' => $fName]);
        return file_exists($fName);
    }

    public function list()
    {
        $files = array_diff(scandir($this->rDir), array('.', '..'));
        $data = [];
        foreach ($files as $key => $fName) {
            $file = $this->rDir . '/' . $fName;
            $fSize = $this->human_filesize(filesize($file));
            $fDate = date("Y-m-d H:i:s", filemtime($file));
            $datum = [
                'name' => $fName,
                'size' => $fSize,
                'date' => $fDate,
                'id' => $key,
            ];
            $data[] = $datum;
        }
        $arrService = app(ArrService::class);
        $data = $arrService->sort($data, 'date', 'desc');
        return $data;
    }

    public function human_filesize($bytes, $decimals = 2)
    {
        $sz = 'BKMGTP';
        $factor = floor((strlen($bytes) - 1) / 3);
        return sprintf("%.{$decimals}f", $bytes / pow(1024, $factor)) . @$sz[$factor];
    }

    private $fName;
    private $dProcess;

    public function process($fName)
    {
        $this->fName = $this->rDir . '/' . $fName;
        if (!file_exists($this->fName)) {
            dd('process: file not exists');
        }
        $this->dProcess = $this->rDir . '/processing';
        $command = sprintf('rm -rf %s', $this->dProcess);
        exec($command);
        $this->unzip($this->fName, $this->dProcess);
        return $this;
    }

    public function database()
    {
        return $this;
    }

    public function files($dName)
    {
        $dPath = Storage::path('public/' . $dName);
        $fName = $this->dProcess . '/' . $dName . '.zip';
        $this->unzip($fName, $dPath);
        return $this;
    }

}