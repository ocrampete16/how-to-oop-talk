<?php
declare(strict_types=1);

interface LinePrinter
{
    /**
     * @param string[] $lines
     */
    function print(array $lines): void;
}
