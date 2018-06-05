<?php

declare(strict_types=1);

use BadPoemPrinterExample\PoemPrinter;

require __DIR__.'/../../vendor/autoload.php';

(new PoemPrinter())->print();
