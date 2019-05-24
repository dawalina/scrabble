<?php


namespace App\Presenters;


class Word
{
    public $word;
    public $points;

    public static $letters = [
        'a' => 1,
        'b' => 3,
        'c' => 3,
        'd' => 2,
        'e' => 1,
        'f' => 4,
        'g' => 2,
        'h' => 4,
        'i' => 1,
        'j' => 8,
        'k' => 5,
        'l' => 1,
        'm' => 3,
        'n' => 1,
        'o' => 1,
        'p' => 3,
        'q' => 10,
        'r' => 1,
        's' => 1,
        't' => 1,
        'u' => 1,
        'v' => 4,
        'w' => 4,
        'x' => 8,
        'y' => 4,
        'z' => 10,
    ];

    public static function calculatePoints($word) {
        $points = 0;
        foreach (str_split(strtolower($word)) as $letter) {
            $points += self::$letters[$letter] ?? 0;
        }
        return $points;
    }

    public static function sortLetters($word): string
    {
        $letters = str_split(strtolower($word));
        sort($letters);
        return implode('', $letters);
    }

    public static function find($str) {
        $letters = str_split(strtolower($str));
        sort($letters);
        $file = fopen(public_path('files/dictionary.csv'), 'rb');
        while (!feof($file)) {
            $line = fgetcsv($file);
            if (!$line) {
                continue;
            }
            $wordLetters = str_split($line[0]);
            foreach ($letters as $letter) {
                $key = array_search($letter, $wordLetters, true);
                if ($key !== FALSE) {
                    unset($wordLetters[$key]);
                } else {
                    continue;
                }
            }
            if (empty($wordLetters)) {
                return $line;
            }
        }
        fclose($file);
        return ['', 0, false];
    }
}