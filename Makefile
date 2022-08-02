install: #install composer
	composer install

brain-games: #run program
	@./bin/brain-games

validate: #validate composer
	composer validate

lint: #validate code
	@composer exec --verbose phpcs -- --standard=PSR12 src bin

brain-even: #run game
	@./bin/brain-even

brain-calc: #run game
	@./bin/brain-calc

brain-gcd: #run game
	@./bin/brain-gcd