SAIL = ./vendor/bin/sail
ARTISAN = ./vendor/bin/sail artisan

c=''
a:
	@$(ARTISAN) $(c)

up:
	@$(SAIL) up -d

down:
	@$(SAIL) down

database:
	@echo 'Explosão tchackabum'
	@$(ARTISAN) migrate:fresh && $(ARTISAN) db:seed
