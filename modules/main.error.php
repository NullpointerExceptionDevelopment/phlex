<?php
/**
*
*   @title:     error
*   @author:    Paitorocxon (Fabian Müller)
*   @created:   10th November 2017
*   @version:   1.0
*   
*/
class errorhand{
    function ErrorHandler($errno, $errstr, $errfile, $errline) {
        if (file_exists('ERROR.log')){
            $text = file_get_contents('ERROR.log') . "\n" . str_pad(date('(z) [d.m.Y|H:i:s]'), 30, ' ', STR_PAD_RIGHT) .
            str_pad($_SERVER["REMOTE_ADDR"], 15, ' ', STR_PAD_RIGHT) . "|" .
            str_pad($errno . "|" . $errstr . " " . $errfile . " ", 145, ' ', STR_PAD_RIGHT) . str_pad($errline, 4, ' ', STR_PAD_RIGHT) . "|" . 
            "\n" . str_pad("=", 195, '=', STR_PAD_RIGHT)  ;
        } else {
            $text = date('(z) d.m.y #') . $errno . ' ' . $errstr . ' ' . $errfile . ' ' . $errline;
        }
        $FILE = fopen('ERROR.log', 'w');
        fwrite($FILE, $text);
        fclose($FILE);
    }
        
}
