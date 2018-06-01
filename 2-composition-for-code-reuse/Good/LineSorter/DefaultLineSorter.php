<?php
declare(strict_types=1);

require_once 'LineSorter.php';

class DefaultLineSorter implements LineSorter
{
    function sort(array $lines): array
    {
        return $lines;
    }
}
