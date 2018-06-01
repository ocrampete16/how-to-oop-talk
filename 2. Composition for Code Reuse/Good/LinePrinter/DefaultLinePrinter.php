<?php
declare(strict_types=1);

require_once 'LinePrinter.php';

class DefaultLinePrinter implements LinePrinter
{
    function print(array $lines): void
    {
        foreach ($lines as $line) {
            echo $line . PHP_EOL;
        }
    }
}
