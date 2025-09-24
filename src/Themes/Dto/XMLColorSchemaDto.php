<?php

namespace Demyanovs\PHPHighlight\Themes\Dto;

class XMLColorSchemaDto
{
    /**
     * @var string
     */
    private $XMLTagColor;

    /**
     * @var string
     */
    private $XMLAttrNameColor;

    /**
     * @var string
     */
    private $XMLAttrValueColor;

    /**
     * @var string
     */
    private $XMLInfoColor;

    /**
     * XMLColorSchemaDto constructor.
     *
     * @param string $XMLTagColor
     * @param string $XMLAttrNameColor
     * @param string $XMLAttrValueColor
     * @param string $XMLInfoColor
     */
    public function __construct(
        $XMLTagColor,
        $XMLAttrNameColor,
        $XMLAttrValueColor,
        $XMLInfoColor
    ) {
        $this->XMLTagColor      = $XMLTagColor;
        $this->XMLAttrNameColor = $XMLAttrNameColor;
        $this->XMLAttrValueColor = $XMLAttrValueColor;
        $this->XMLInfoColor     = $XMLInfoColor;
    }

    public function getXMLTagColor()
    {
        return $this->XMLTagColor;
    }

    public function getXMLAttrNameColor()
    {
        return $this->XMLAttrNameColor;
    }

    public function getXMLAttrValueColor()
    {
        return $this->XMLAttrValueColor;
    }

    public function getXMLInfoColor()
    {
        return $this->XMLInfoColor;
    }
}
