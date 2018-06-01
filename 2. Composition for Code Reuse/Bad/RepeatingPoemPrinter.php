<?php
declare(strict_types=1);

require 'PoemPrinter.php';

class RepeatingPoemPrinter extends PoemPrinter
{
    public function print(): void
    {
        foreach ($this->lines as $line) {
            echo $line . PHP_EOL;
            echo $line . PHP_EOL;
        }
    }
}
