<?php

declare(strict_types=1);

namespace PoemPrinterExample\LinePrinter;

interface LinePrinter
{
    /**
     * @param string[] $lines
     */
    public function print(array $lines): void;
}
