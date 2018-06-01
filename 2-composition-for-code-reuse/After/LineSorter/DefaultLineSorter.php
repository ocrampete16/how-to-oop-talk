<?php

declare(strict_types=1);

namespace PoemPrinterExample\LineSorter;

class DefaultLineSorter implements LineSorter
{
    public function sort(array $lines): array
    {
        return $lines;
    }
}
