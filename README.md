## PHP library for checking brackets sequences in string

## Installing
```
composer require gukasov/php_brackets_checker
```

## Basic usage
```php
<?php

use Gukasov\BracketsChecker\BracketsChecker;

$checker = new BracketsChecker();

$checker->isCorrectSequence('(( ) ())'); 
// returns True
```

