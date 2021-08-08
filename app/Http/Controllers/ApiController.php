<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiController extends Controller
{
    function convert_bil(Request $request) {
        if($request->bil == null){
            return 'input biner kosong';
        }
        $bin_data = $request->bil;
        $base=1;
        $dec_nr=0;
        $bin_data=explode(",", preg_replace("/(.*),/", "$1", str_replace("1", "1,", str_replace("0", "0,", $bin_data))));
        for($i=1; $i<count($bin_data); $i++) $base=$base*2;
        foreach($bin_data as $key=>$bin_data_bit) {
            if($bin_data_bit==1) {
                $dec_nr+=$base;
                $base=$base/2;
            }
            if($bin_data_bit==0) $base=$base/2;
        }
        return["output"=>$dec_nr];
    }


    function palindrom(Request $request) {
        if($request->teks == null){
            return 'Teks input kosong';
        }
        $string= $request->teks;
        $strArr = array();
        for($i=0; $i<strlen($string); $i++ )
        {
            $palindrome = true;
            $offset = 1;
        while($palindrome)
        {
            $word = substr($string, $i-$offset, ($offset*2)+1 );
            if( $word == strrev($word) ) {
                $strArr[$word] = strlen($word);
            } else {
                $palindrome = false;
            }

            $offset++;
        }
        }
        $finArr = max($strArr);
        $key = array_search ($finArr, $strArr);
        return $key;
    }

}
