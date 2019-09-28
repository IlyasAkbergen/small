<?php
/**
 * Created by PhpStorm.
 * User: ilyas
 * Date: 28.09.2019
 * Time: 14:39
 */

namespace App;


use Illuminate\Support\Facades\Storage;

class Helper
{
    /**
     * возвращает путь к сохраненному файлу
     * @param $folder
     * @param $file
     * @param $filename
     * @return string filepath
     */
    public static function storeAttachement($folder, $file, $filename){
        return Storage::putFileAs(
            $folder, $file, $filename
        );
    }

    /**
     * @param $path
     * @return string url
     */
    public static function getAttachementURL($path){
        return Storage::url($path);
    }
}
