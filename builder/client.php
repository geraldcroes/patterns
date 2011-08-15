<?php
require __DIR__.'/builders/ireportbuilder.php';
require __DIR__ . '/builders/htmlreportbuilder.php';
require __DIR__ . '/builders/clireportbuilder.php';
require __DIR__ . '/builders/barreportbuilder.php';
require __DIR__.'/reportdirector.php';

$director = new ReportDirector();
//$builder = new BarReportBuilder(300, 40, '/tmp/image.gif');
//$builder = new HTMLReportBuilder();
$builder = new CliReportBuilder();

$director->createExpenseReport($builder);
echo $builder->getReport();