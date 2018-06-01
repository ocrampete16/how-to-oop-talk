<?php

declare(strict_types=1);

require __DIR__.'/../../vendor/autoload.php';

use BadPoemPrinterExample\PoemPrinter;
use BadPoemPrinterExample\RandomPoemPrinter;

(new RandomPoemPrinter())->print();

// Lösungsmöglichkeit mit Decoratorn erwähnen!
