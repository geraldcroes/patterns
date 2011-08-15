<?php
class ReportDirector
{
    public function createExpenseReport(IReportBuilder $pReportBuilder)
    {
        $data = $this->getExpenseData();
        $pReportBuilder->addTitle($data['meta']['title']);
        $pReportBuilder->addLegend($data['meta']['legend']);

        foreach ($data['datas'] as $line){
            $pReportBuilder->addExpense($line['type'], $line['amount']);
        }
        return $pReportBuilder;
    }

    protected function getExpenseData()
    {
        return array('meta'=>array('title'=>'Dépenses mensuelles', 'legend'=>'Mois de Janvier 2011'),
                     'datas'=>array(
                                    array('type'=>'Livres', 'amount'=>157),
                                    array('type'=>'Matériel', 'amount'=>200),
                                    array('type'=>'Services', 'amount'=>377),
                                    array('type'=>'Boissons', 'amount'=>50)
                                   )
                    );
    }       
}