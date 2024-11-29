.PHONY: setup
setup:
	@sh -c "echo '#!/bin/sh\n\nmake lint test' > .git/hooks/pre-commit"
	@chmod 755 .git/hooks/pre-commit
	@composer install

.PHONY: fmt
fmt:
	@./vendor/bin/php-cs-fixer fix -v

.PHONY: lint
lint:
	@./vendor/bin/php-cs-fixer check -v
	@php -d memory_limit=1G ./vendor/bin/phpstan analyse

.PHONY: test
test:
	@./vendor/bin/phpunit tests
