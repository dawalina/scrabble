## Scrabble

    • Generate complete words that can be found in a dictionary.txt file, given letters passed to the application as a parameter
    • Calculate score based on the letters given if a word is found

## Build
docker-compose build

## Run
docker-compose up -d

## Rebuild Dictionary
Dictionaries are located in public/files

docker-compose exec app php artisan rebuild_dictionary

## TechStack
- Laravel
- Docker
- Bootstrap