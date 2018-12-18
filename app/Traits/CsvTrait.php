<?php

namespace App\Traits;

use Goodby\CSV\Import\Standard\Lexer;
use Goodby\CSV\Import\Standard\Interpreter;
use Goodby\CSV\Import\Standard\LexerConfig;

trait CsvTrait
{
    private function upload($file, $names)
    {
        $nameKeys    = array_keys($names);
        $nameValues  = array_values($names);
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
                if ($value[1] !== $nameValues[1]) {
                    return false;
                }
                continue;
            }
            foreach($value as $k => $v) {
                $line[$nameKeys[$k]] = $v;
            }
            $data[] = $line;
        }
        return $data;
    }

    private function download($name, $data)
    {
        $dateCsv     = $name . date('YmdHis') . '.csv';
        $csvFileName = 'storage/csv/' . $dateCsv;
        $res         = fopen($csvFileName, 'w');
        foreach($data as $line) {
            mb_convert_variables('SJIS-win', 'UTF-8', $line);
            $tmp = array();
            foreach ($line as $value) {
                $value = str_replace('"', '""', $value);
                $tmp[] = '"' . $value . '"';
            }
            $str = implode(',', $tmp);
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

    private function getElements($names, $eles)
    {
        $data[] = array_values($names);
        $list   = array_keys($names);
        foreach ($eles as $ele) {
            $line = [];
            foreach ($list as $key) {
                array_push($line, $ele[$key]);
            }
            $data[] = $line;
        }
        return $data;
    }
}
