<?php

declare(strict_types=1);

require __DIR__.'/../../vendor/autoload.php';

use PoemPrinterExample\PoemPrinter;
use PoemPrinterExample\LineSorter\DefaultLineSorter;
use PoemPrinterExample\LinePrinter\DefaultLinePrinter;

(new PoemPrinter(new DefaultLineSorter(), new DefaultLinePrinter()))->print();
