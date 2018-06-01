<?php
declare(strict_types=1);

require_once 'LineSorter/LineSorter.php';
require_once 'LinePrinter/LinePrinter.php';

class PoemPrinter
{
    private $lineSorter;
    private $linePrinter;
    private $lines = [
        'Two roads diverged in a yellow wood',
        'And sorry I could not travel both',
        'And be one traveler, long I stood',
        'And looked down one as far as I could',
        'To where it bent in the undergrowth;',
    ];

    public function __construct(LineSorter $lineSorter, LinePrinter $linePrinter)
    {
        $this->lineSorter = $lineSorter;
        $this->linePrinter = $linePrinter;
    }

    public function print(): void
    {
        $lines = $this->lineSorter->sort($this->lines);
        $this->linePrinter->print($lines);
    }
}
