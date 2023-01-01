Sudoku Plus is a game which follows all the same rules of Sudoku but has
a grid of variable size. A Sudoku Plus board might be 4x4, 9x9, etc.

The application checks are your sudoku solving is correct or not.
Paste your variant in csv format, like:
```
1,2,3
4,5,6
7,8,9
```

Pull the project and run:
```
docker-compose up -d --build
docker-compose exec php /bin/bash
composer install
```

To play the game go to: http://localhost:8080/sudoku.

To run tests use:
```
docker-compose exec php /bin/bash
php bin/phpunit
```
