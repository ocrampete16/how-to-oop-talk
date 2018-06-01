<?php
declare(strict_types=1);

require_once 'PoemPrinter.php';
require_once 'LineSorter/DefaultLineSorter.php';
require_once 'LinePrinter/DefaultLinePrinter.php';

(new PoemPrinter(new DefaultLineSorter(), new DefaultLinePrinter()))->print();
