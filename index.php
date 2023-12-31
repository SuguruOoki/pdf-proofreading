<?php

require 'vendor/autoload.php';

$parser    = new \Smalot\PdfParser\Parser();
$pdf       = $parser->parseFile('pdf/sample.pdf');
$firstPage = $pdf->getPages()[0];

echo nl2br($firstPage->getText());
