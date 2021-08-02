<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;

class ImportService extends Backup_Abstract
{
    public function __construct()
    {
        $this->rDir = Storage::path('public/imports');
        parent::__construct();
    }

    public function take()
    {
        $client = new \GuzzleHttp\Client();
        $exportUrl = 'https://be.mockapi.codeby.com/export';
        $client->request('GET', $exportUrl, ['sink' => "{$this->rDir}/{$this->date}.zip"]);
    }

    public function list()
    {
        $files = array_diff(scandir($this->rDir), array('.', '..'));
        $data = [];
        foreach ($files as $fName) {
            $file = $this->rDir . '/' . $fName;
            $fSize = $this->human_filesize(filesize($file));
            $fDate = date("Y-m-d H:i:s.", filemtime($file));
            $datum = [
                'name' => $fName,
                'size' => $fSize,
                'date' => $fDate,
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

    public function database()
    {
//        $fName = '2021-08-02.zip';
//        $this->unzip($this->rDir . '/' . $fName, $this->rDir . '/processing');
//
    }

    public function files($dName)
    {
        $fName = '2021-08-02.zip';
        $this->unzip($this->rDir . '/' . $fName, $this->rDir . '/processing');
        $dPath = Storage::path('public/' . $dName);
        $fName = $this->rDir . '/processing/' . $dName . '.zip';
        $this->unzip($fName, $dPath);
        return $this;
    }

}