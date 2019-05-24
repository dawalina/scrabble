<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}" />
        <title>Scrabble</title>
    </head>
    <body>
        <div class="container">
            <div class="py-5 text-center">
                <h2>Scrabble</h2>
            </div>
            <div class="row">
                <div class="mx-auto">
                    <form class="card p-2">
                        <div class="input-group">
                            <input type="text" name="letters" class="form-control" placeholder="Letters">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-primary">Find word!</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @if ($word)
            <div class="row py-5">
                <div class="card w-50 mx-auto">
                    <div class="card-body">
                        <h5 class="card-title">{{ $word }}</h5>
                        <p class="card-text">{{ $points }} points</p>
                    </div>
                </div>
            </div>
        @endif
        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>
