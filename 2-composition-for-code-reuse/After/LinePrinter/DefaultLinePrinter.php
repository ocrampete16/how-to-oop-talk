<?php

declare(strict_types=1);

namespace PoemPrinterExample\LinePrinter;

class DefaultLinePrinter implements LinePrinter
{
    public function print(array $lines): void
    {
        foreach ($lines as $line) {
            echo $line.PHP_EOL;
        }
    }
}
