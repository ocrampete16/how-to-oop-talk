<?php

declare(strict_types=1);

namespace BadPoemPrinterExample;

class PoemPrinter
{
    protected $lines = [
        'Two roads diverged in a yellow wood',
        'And sorry I could not travel both',
        'And be one traveler, long I stood',
        'And looked down one as far as I could',
        'To where it bent in the undergrowth;',
    ];

    public function print(): void
    {
        foreach ($this->lines as $line) {
            echo $line.PHP_EOL;
        }
    }
}
