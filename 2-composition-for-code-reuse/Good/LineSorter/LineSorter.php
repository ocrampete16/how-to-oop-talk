<?php
declare(strict_types=1);

interface LineSorter
{
    /**
     * @param string[] $lines
     * @return string[]
     */
    function sort(array $lines): array;
}
