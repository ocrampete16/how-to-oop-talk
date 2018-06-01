<?php

declare(strict_types=1);

namespace BadPoemPrinterExample;

class RandomPoemPrinter extends PoemPrinter
{
    public function __construct()
    {
        shuffle($this->lines);
    }
}
