<?php
declare(strict_types=1);

require_once 'LineSorter.php';

class RandomLineSorter implements LineSorter
{
    function sort(array $lines): array
    {
        shuffle($lines);
        return $lines;
    }
}
