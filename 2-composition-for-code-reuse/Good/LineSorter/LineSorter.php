<?php

declare(strict_types=1);

namespace PoemPrinterExample\LineSorter;

interface LineSorter
{
    /**
     * @param string[] $lines
     *
     * @return string[]
     */
    public function sort(array $lines): array;
}
