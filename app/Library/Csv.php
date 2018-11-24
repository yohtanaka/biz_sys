<?php

namespace App\library;

use Goodby\CSV\Import\Standard\Lexer;
use Goodby\CSV\Import\Standard\Interpreter;
use Goodby\CSV\Import\Standard\LexerConfig;

class Csv
{
    static function upload($file, $items, $head) {
        $config      = new LexerConfig();
        $interpreter = new Interpreter();
        $lexer       = new Lexer($config);
        $config     ->setToCharset('UTF-8');
        $config     ->setFromCharset('SJIS-win');
        $interpreter->addObserver(function(array $row) use (&$rows) {
            $rows[] = $row;
        });
        $lexer      ->parse($file, $interpreter);

        foreach ($rows as $key => $value) {
            if ($key === 0) {
                if ($value[1] !== $head) {
                    return false;
                }
                continue;
            }
            foreach($value as $k => $v) {
                $line[$items[$k]] = $v;
            }
            $data[] = $line;
        }
        return $data;
    }

    static function download($name, $data) {
        $dateCsv     = $name . date('YmdHis') . '.csv';
        $csvFileName = "storage/csv/" . $dateCsv;
        $res         = fopen($csvFileName, 'w');
        foreach($data as $line) {
            mb_convert_variables('SJIS-win', 'UTF-8', $line);
            $tmp  = array();
            foreach ($line as $value) {
                $value = str_replace('"', '""', $value);
                $tmp[] = '"' . $value . '"';
            }
            $str  = implode(',', $tmp);
            $str .= "\n";
            fputs($res, $str);
        }
        fclose($res);
        header('Content-Type: application/octet-stream');
        header("Content-Disposition: attachment; filename=${dateCsv}");
        header('Content-Transfer-Encoding: binary');
        header('Content-Length: ' . filesize($csvFileName));
        readfile($csvFileName);
    }
}
