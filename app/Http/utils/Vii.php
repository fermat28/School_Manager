<?php
namespace App\Utils;

class Vii {

    public static function randomQuestion($arrQuestions){
        shuffle($arrQuestions);
        $rand = random_int(0, count($arrQuestions) - 1);
        return $arrQuestions[$rand];
    }

    public static function pr($obj, $is_file=false, $is_append=false){
        ob_start();
        echo "<pre>";
        print_r($obj);
        echo "</pre>";
        if($is_file !== false && is_string($is_file)){
            $v = ob_get_contents();
            if(!$is_append)
                file_put_contents($is_file, $v);
            else
                file_put_contents($is_file, $v, FILE_APPEND);
            ob_end_clean();
        }
    }
}
