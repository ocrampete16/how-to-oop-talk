<?php
declare(strict_types=1);

require_once 'PoemPrinter.php';

class RandomPoemPrinter extends PoemPrinter
{
    public function __construct()
    {
        shuffle($this->lines);
    }
}
