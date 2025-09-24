<?php

namespace Demyanovs\PHPHighlight\Themes\Dto;

class DefaultColorSchemaDto
{
    /**
     * @var string
     */
    private $defaultColor;

    /**
     * @var string
     */
    private $backgroundColor;

    /**
     * @var string
     */
    private $commentColor;

    /**
     * @var string
     */
    private $keywordColor;

    /**
     * @var string
     */
    private $variableColor;

    /**
     * @var string
     */
    private $stringColor;

    /**
     * @var string
     */
    private $flagColor;

    /**
     * DefaultColorSchemaDto constructor.
     *
     * @param string $defaultColor
     * @param string $backgroundColor
     * @param string $commentColor
     * @param string $keywordColor
     * @param string $variableColor
     * @param string $stringColor
     * @param string $flagColor
     */
    public function __construct(
        $defaultColor,
        $backgroundColor,
        $commentColor,
        $keywordColor,
        $variableColor,
        $stringColor,
        $flagColor
    ) {
        $this->defaultColor    = $defaultColor;
        $this->backgroundColor = $backgroundColor;
        $this->commentColor    = $commentColor;
        $this->keywordColor    = $keywordColor;
        $this->variableColor   = $variableColor;
        $this->stringColor     = $stringColor;
        $this->flagColor       = $flagColor;
    }

    public function getDefaultColor()
    {
        return $this->defaultColor;
    }

    public function getBackgroundColor()
    {
        return $this->backgroundColor;
    }

    public function getCommentColor()
    {
        return $this->commentColor;
    }

    public function getKeywordColor()
    {
        return $this->keywordColor;
    }

    public function getVariableColor()
    {
        return $this->variableColor;
    }

    public function getStringColor()
    {
        return $this->stringColor;
    }

    public function getFlagColor()
    {
        return $this->flagColor;
    }
}
