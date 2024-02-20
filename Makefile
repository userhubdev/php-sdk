.PHONY: setup
setup:
	@sh -c "echo '#!/bin/sh\n\nmake lint test' > .git/hooks/pre-commit"
	@chmod 755 .git/hooks/pre-commit
	@composer install

.PHONY: fmt
fmt:
	@./vendor/bin/php-cs-fixer fix -v
	# fully_qualified_strict_types not fully applied until
	# run twice, hopefully we can remove this in the
	# future
	@./vendor/bin/php-cs-fixer fix -v

.PHONY: lint
lint:
	@./vendor/bin/php-cs-fixer check -v

.PHONY: test
test:
	@./vendor/bin/phpunit tests
