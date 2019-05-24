<?php

namespace App\Jobs;


use App\Presenters\Word;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\App;


class RebuildDictionary implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;


    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(): void
    {
        if (App::isDownForMaintenance()) {
            return;
        }

        $file = fopen(public_path('files/dictionary.txt'), 'rb');
        $words = [];
        while (!feof($file)) {
            $line = fgetcsv($file);
            if (!$line) {
                continue;
            }
            $points = Word::calculatePoints($line[0]);
            $words[$points][$line[0]] = [Word::sortLetters($line[0]), $points, $line[0]];
        }
        fclose($file);

        krsort($words);

        $dictionary = fopen(public_path('files/dictionary.csv'), 'wb+');
        foreach ($words as $wordsWithPoints) {
            foreach ($wordsWithPoints as $word) {
                fputcsv($dictionary, $word);
            }
        }
        fclose($dictionary);
    }
}
