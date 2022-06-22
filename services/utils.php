<?php
    function randomToken($car) {
        $string = "";
        $chaine = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyz";
        srand ( ( double ) microtime () * 1000000 );
        for($i = 0; $i < $car; $i ++) {
            $string .= $chaine [rand () % strlen ( $chaine )];
        }
        return $string;
    }

    function console_log($output, $with_script_tags = true) {
        $js_code = 'console.log(' . json_encode($output, JSON_HEX_TAG) . 
    ');';
        if ($with_script_tags) {
            $js_code = '<script>' . $js_code . '</script>';
        }
        echo $js_code;
    }
    