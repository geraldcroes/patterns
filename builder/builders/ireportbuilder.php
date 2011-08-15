    <?php

    interface IReportBuilder
    {
        public function addTitle($pTitle);
        public function addLegend($pLegend);
        public function addExpense($pType, $pAmount);
    }