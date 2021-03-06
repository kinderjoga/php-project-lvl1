install: #install composer
	@composer install

brain-games: #run program
	@./bin/brain-games

validate: #validate composer
	@composer validate

lint: #validate code
	@composer exec --verbose phpcs -- --standard=PSR12 src bin

brain-even: #run game even
	@./bin/brain-even

brain-calc: #run game calc
	@./bin/brain-calc
