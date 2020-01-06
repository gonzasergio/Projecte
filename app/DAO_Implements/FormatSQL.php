<?php


trait FormatSQL {

    public function packUp($string){
        return '"' . $string . '"';
    }

}