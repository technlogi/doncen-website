<?php

if (! function_exists('generateKey')) {
    function generateKey($table_id) {
        $alpha_key = '';
        $keys = range('a', 'z');
        $numeric = range(0, 9);

        for ($i = 0; $i <= 20; $i++) {
            if(rand(0,1)){
                $alpha_key .= $keys[array_rand($keys)] ;
            }else{
                $alpha_key .= $numeric[array_rand($numeric)] ;
            }
        }
        return $alpha_key . $table_id;
    }
    
}