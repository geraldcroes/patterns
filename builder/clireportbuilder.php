<?php
class CliReportBuilder implements IReportBuilder
{
    private $_title;
    private $_legend;
    private $_expenses;

    public function addTitle($pTitle)
    {
        $this->_title = $pTitle;
    }

    public function addLegend($pLegend)
    {
        $this->_legend = $pLegend;
    }

    public function addExpense($pType, $pAmount)
    {
        $this->_expenses .= $pType.' : '.$pAmount."\n\r";
    }

    public function getReport()
    {
       return $this->_title.' ('.$this->_legend.")\n\r"
               .$this->_expenses;
    }
}