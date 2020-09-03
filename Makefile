install:
	composer install
lint:
	composer run-script phpcs -- --standard=PSR12 bin src
test-coverage:
	composer exec --verbose phpunit tests -- --coverage-clover build/logs/clover.xml
