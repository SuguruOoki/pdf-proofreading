<?php

require 'vendor/autoload.php';

$parser    = new \Smalot\PdfParser\Parser();
// $pdf       = $parser->parseFile('pdf/sample.pdf');
$pdf       = $parser->parseFile('pdf/portfolio.pdf');
$pages = $pdf->getPages();

foreach($pages as $key => $page) {
    $page_number = $key + 1;
    echo "page $page_number </br>";
    echo nl2br($page->getText());
    echo "</br>-----</br></br>";
}

