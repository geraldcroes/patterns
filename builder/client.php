<?php
require __DIR__.'/ireportbuilder.php';
require __DIR__.'/htmlreportbuilder.php';
require __DIR__.'/clireportbuilder.php';
require __DIR__.'/barreportbuilder.php';
require __DIR__.'/reportdirector.php';

$director = new ReportDirector();
//$builder = new BarReportBuilder(300, 40, '/tmp/image.gif');
//$builder = new HTMLReportBuilder();
$builder = new CliReportBuilder();

$director->createExpenseReport($builder);
echo $builder->getReport();