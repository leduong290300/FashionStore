<?php
use Illuminate\Support\Str;
if(!function_exists('showImage'))
{
    function showImage($string) {
        if(Str::contains($string, 'http')) {
            return $string;
        }
        return asset('storage/images/products/'.$string);

    }
}
