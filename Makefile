.PHONY: fmt
fmt:
	./vendor/bin/php-cs-fixer fix -v
	# fully_qualified_strict_types not fully applied until
	# run twice, hopefully we can remove this in the
	# future
	./vendor/bin/php-cs-fixer fix -v

.PHONY: lint
lint:
	@./vendor/bin/php-cs-fixer check -v

.PHONY: test
test:
	@./vendor/bin/phpunit tests
