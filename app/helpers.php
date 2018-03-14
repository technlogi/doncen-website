<?php

if (! function_exists('generateKey')) {
    function generateKey($table_id) {
        $alpha_key = '';
        $keys = range('A', 'Z');
        $numeric = range(0, 9);

        for ($i = 0; $i < 12; $i++) {
            if(rand(0,1)){
                $alpha_key .= $keys ;
            }else{
                $alpha_key .= $numeric ;
            }
        }
        return $alpha_key . $table_id;
    }
    
}