<?php

namespace App\Services;

use App\Models\DataSet;
use finfo;
use Illuminate\Support\Facades\Auth;
use Image;
use Imagick;
use Intervention\Image\Exception\NotReadableException;

class MediaService
{

    public function get_thumb($imagePath, $size)
    {
        $imagePath = str_replace('/images/', '/thumb-images/', $imagePath);
        $imagePath = str_replace('.wepb', "-{$size['width']}.jpg", $imagePath);
        return $imagePath;
    }

//    public function convertThumbs($path, $filePath, $fileName, $sizes)
//    {
//        $thumbs = [];
//        foreach ($sizes as $size) {
//            try {
//                $thumbPath = self::get_thumb($filePath, $size);
//                $thumbName = self::get_thumb($fileName, $size);
//                $thumbs[$size['width']] = $thumbName;
//                if (isset($size['height'])) {
//                    Image::make($path)
//                        ->fit($size['width'], $size['height'])
//                        ->save($thumbPath, 100);
//                } else {
//                    Image::make($path)
//                        ->resize($size['width'], null, function ($constraint) {
//                            $constraint->aspectRatio();
//                        })
//                        ->save($thumbPath, 100);
//                }
//            } catch (NotReadableException $e) {
//            }
//        }
//        return $thumbs;
//    }

    public function jcphp01_generate_webp_image($file, $outputFile, $compression_quality = 80)
    {
        if (!file_exists($file)) {
            return false;
        }
        if (file_exists($outputFile)) {
            return $outputFile;
        }
        $file_type = strtolower(mime_content_type($file));
        $file_type = str_replace('image/', '', $file_type);

        if (function_exists('imagewebp')) {
            switch ($file_type) {
                case 'jpeg':
                case 'jpg':
                    $image = imagecreatefromjpeg($file);
                    break;
                case 'png':
                    $image = imagecreatefrompng($file);
                    imagepalettetotruecolor($image);
                    imagealphablending($image, true);
                    imagesavealpha($image, true);
                    break;
                case 'gif':
                    $image = imagecreatefromgif($file);
                    break;
                default:
                    return 'NOT_SUPPORT';
            }
            $result = imagewebp($image, $outputFile, $compression_quality);
            if (false === $result) {
                return false;
            }
            imagedestroy($image);
            return $outputFile;
        } elseif (class_exists('Imagick')) {
            $image = new Imagick();
            $image->readImage($file);
            if ($file_type === 'png') {
                $image->setImageFormat('webp');
                $image->setImageCompressionQuality($compression_quality);
                $image->setOption('webp:lossless', 'true');
            }
            $image->writeImage($outputFile);
            return $outputFile;
        }
        return false;
    }

    public function classify($file, $datasetId)
    {
        $convertStatus = true;
        $extension = $file->extension();
        switch ($file->getMimeType()) {
            case (preg_match('#video#', $file->getMimeType()) ? true : false):
                $fileType = 'video';
                $fileName = 'media/videos/' . date('Y-m-d') . '-' . time() . '-' . rand() . '-' . Auth::id() . '.' . $extension;
                $filePath = storage_path() . "/app/public";
                $file->move($filePath . '/media/videos', $fileName);
                break;
            case (preg_match('#image#', $file->getMimeType()) ? true : false):
                $fileType = 'image';
                $path = $file->getRealPath();
                $fileName = 'media/images/' . date('Y-m-d') . '-' . time() . '-' . rand() . '-' . Auth::id() . '.wepb';
                $filePath = storage_path() . "/app/public/$fileName";
                $convertStatus = $this->jcphp01_generate_webp_image($path, $filePath);
                if ($convertStatus == 'NOT_SUPPORT') {
                    $fileName = 'media/images_NOT_SUPPORT/' . date('Y-m-d') . '-' . time() . '-' . rand() . '-' . Auth::id() . '.' . $extension;
                    $filePath = storage_path() . "/app/public";
                    $file->move($filePath . '/media/images_NOT_SUPPORT', $fileName);
                }
                break;
            default:
                $fileType = preg_replace('#\/.*?$#mis', '', $file->getMimeType());
                $extension = !empty($extension) ? $extension : $fileType;
                $extension = in_array($extension, ['text']) ? 'txt' : $extension . '1';
                $fileName = 'media/files/' . date('Y-m-d') . '-' . time() . '-' . rand() . '-' . Auth::id() . '.' . $extension;
                $filePath = storage_path() . "/app/public";
                $file->move($filePath . '/media/files', $fileName);
//                $fileThumb = 'api/media?text=' . urlencode($file->getClientOriginalName());
//                $thumbs = handleThumbs($thumbSizes, $fileThumb, $fileType);
//                $thumbs = [];
//                foreach ($thumbSizes as $size) {
//                    $thumbs[$size['width']] = 'api/media?text=' . urlencode($file->getClientOriginalName());
//                }
                break;
        }
        $result = [
            'dataset_id'  => $datasetId,
            'name_upload' => $file->getClientOriginalName(),
            'file_type'   => @$fileType,
            'file_name'   => @$fileName,
//            'thumbs'      => @$thumbs,
            'user_id'     => Auth::id(),
            'stage'       => 'first upload',
        ];
        return [$convertStatus, $result];
    }

    public function getViaUrl($fileUrl)//, $thumbSizes)
    {
        $convertStatus = true;
        $extension = pathinfo(parse_url($fileUrl, PHP_URL_PATH), PATHINFO_EXTENSION);
        try {
            $contents = file_get_contents($fileUrl);
        } catch (\ErrorException $e) {
            return [false, false];
        }
        $file_info = new finfo(FILEINFO_MIME_TYPE);
        $mime_type = $file_info->buffer($contents);
        $originalName = substr($fileUrl, strrpos($fileUrl, '/') + 1);
\Illuminate\Support\Facades\Log::channel('single')->info('$originalName', [$originalName]);

        switch ($mime_type) {
            case (preg_match('#video#', $mime_type) ? true : false):
                $fileType = 'video';
                $fileName = 'media/videos/' . date('Y-m-d') . '-' . time() . '-' . rand() . '-' . Auth::id() . '.' . $extension;
                $filePath = storage_path() . "/app/public";
//                $file->move($filePath . '/media/videos', $fileName);
                file_put_contents($filePath . '/media/videos/' . $fileName, $contents);
//                $fileThumb = 'api/media?text=' . urlencode($originalName);
//                $thumbs = [];
//                foreach ($thumbSizes as $size) {
//                    $thumbs[$size['width']] = 'api/media?text=' . urlencode($originalName);
//                }
                break;
            case (preg_match('#image#', $mime_type) ? true : false):
                $fileType = 'image';
                $path = storage_path() . "/app/public/media/tmp/" . rand() . ".$extension";
                $fileName = 'media/images/' . date('Y-m-d') . '-' . time() . '-' . rand() . '-' . Auth::id() . '.wepb';
                $filePath = storage_path() . "/app/public/$fileName";
                file_put_contents($path, $contents);
                $convertStatus = $this->jcphp01_generate_webp_image($path, $filePath);
//                $this->thumb_image($path, $filePath);
//                $fileThumb = $this->get_thumb($fileName);
//                $thumbs = $this->convertThumbs($path, $filePath, $fileName, $thumbSizes);
                if ($convertStatus == 'NOT_SUPPORT') {
                    $fileName = 'media/images_NOT_SUPPORT/' . date('Y-m-d') . '-' . time() . '-' . rand() . '-' . Auth::id() . '.' . $extension;
                    $filePath = storage_path() . "/app/public";
                    file_put_contents($filePath .'/'. $fileName, $contents);
                }
                break;
            default:
                $fileType = preg_replace('#\/.*?$#mis', '', $mime_type);
                $extension = !empty($extension) ? $extension : $fileType;
                $extension = in_array($extension, ['text']) ? 'txt' : $extension . '1';
                $fileName = 'media/files/' . date('Y-m-d') . '-' . time() . '-' . rand() . '-' . Auth::id() . '.' . $extension;
                $filePath = storage_path() . "/app/public";
//                $file->move($filePath . '/media/files', $fileName);
                file_put_contents($filePath . '/media/files/' . $fileName, $contents);
//                $fileThumb = 'api/media?text=' . urlencode($originalName);
//                $thumbs = [];
//                foreach ($thumbSizes as $size) {
//                    $thumbs[$size['width']] = 'api/media?text=' . urlencode($originalName);
//                }
                break;
        }
        $result = [
            'name_upload' => $originalName,
            'file_type'   => @$fileType,
            'file_name'   => @$fileName,
//            'file_thumb'  => @$fileThumb,
//            'thumbs'      => @$thumbs,
            'user_id'     => Auth::id(),
            'stage'       => 'first upload',
        ];
        return [$convertStatus, $result];
    }
}

