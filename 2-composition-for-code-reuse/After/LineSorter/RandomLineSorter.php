<?php

declare(strict_types=1);

namespace PoemPrinterExample\LineSorter;

class RandomLineSorter implements LineSorter
{
    public function sort(array $lines): array
    {
        shuffle($lines);

        return $lines;
    }
}
