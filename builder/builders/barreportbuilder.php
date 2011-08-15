<?php
class BarReportBuilder implements IReportBuilder
{
    protected $_title;
    protected $_legend;
    protected $_expenses = array();
    protected $_max = 0;

    protected $_width;
    protected $_height;

    const BORDER_WIDTH = 4;

    public function __construct ($pWidth, $pHeight, $pFilePath)
    {
        $this->_width = $pWidth;
        $this->_height = $pHeight;
        $this->_filePath = $pFilePath;
    }

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
        $this->_expenses[$pType] = $pAmount;
        $this->_max += $pAmount;
    }

    public function getReport()
    {
        //creation de l'image
        $image = imagecreate($this->_width, $this->_height);

        //black filler
        $black = imagecolorallocate($image, 255, 255, 255);
        imagefilledrectangle($image, 0, 0 , $this->_width, $this->_height, $black);

        //now we're gonna fill the datas
        $indice = 0;
        $xPosition = self::BORDER_WIDTH;
        foreach ($this->_expenses as $type=>$expense) {
            $color = $this->_getColor($indice, $image);
            imagefilledrectangle($image,
                                 $xPosition,
                                 self::BORDER_WIDTH,
                                 $xPosition+($movedBy = ($expense/$this->_max) * ($this->_width-self::BORDER_WIDTH*2)),
                                 $this->_height-self::BORDER_WIDTH,
                                 $color
                                );
            $xPosition += $movedBy;
            $indice++;
        }
        imagegif($image, $this->_filePath);
    }

    private function _getColor($pIndice, $pForImage)
    {
        $max = count($this->_expenses)+1;
        $color = imagecolorallocate($pForImage,
                                    (int) (($pIndice+(($pIndice%3 === 0) ? 1 : 0)) / $max * 256) ,
                                    (int) (($pIndice+(($pIndice%3 === 1) ? 2 : 0)) / $max * 256),
                                    (int) (($pIndice+(($pIndice%3 === 2) ? 3 : 0)) / $max * 256));
        return $color;
    }
}