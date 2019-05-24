<?php

namespace App\Http\Controllers\Base;

use App\Http\Controllers\Controller;
use App\Presenters\Word;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(Request $request) {

        $word = false;
        $points = 0;
        if ($request->has('letters')) {
            $letters = strtolower(trim($request->get('letters')));
            [,$points, $word] = Word::find($letters);
        }
        return view('welcome', [
            'word'  => $word,
            'points'  => $points,
        ]);
    }
}