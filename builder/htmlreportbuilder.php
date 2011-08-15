<?php
class HTMLReportBuilder implements IReportBuilder
{
    private $_title;
    private $_legend;
    private $_expenses;

    public function addTitle($pTitle)
    {
        $this->_title = htmlentities($pTitle);
    }

    public function addLegend($pLegend)
    {
        $this->_legend = htmlentities($pLegend);
    }

    public function addExpense($pType, $pAmount)
    {
        $this->_expenses .= '<tr><td>'.htmlentities($pType).'</td><td>'.$pAmount.'</td></tr>';
    }

    public function getReport()
    {
       return '<h2>'.$this->_title.'</h2>'
               .'<p>'.$this->_legend.'</p>'
               .'<table>'
               .'<tr><th>Type de dépense</th><th>Montant</th>'
               .$this->_expenses
               .'</table>';
    }
}