<?php

namespace Demyanovs\PHPHighlight\Themes\Dto;

class PHPColorSchemaDto
{
    /**
     * @var string
     */
    private $defaultColor;

    /**
     * @var string
     */
    private $commentColor;

    /**
     * @var string
     */
    private $htmlColor;

    /**
     * @var string
     */
    private $keywordColor;

    /**
     * @var string
     */
    private $stringColor;

    /**
     * PHPColorSchemaDto constructor.
     *
     * @param string $defaultColor
     * @param string $commentColor
     * @param string $htmlColor
     * @param string $keywordColor
     * @param string $stringColor
     */
    public function __construct(
        $defaultColor,
        $commentColor,
        $htmlColor,
        $keywordColor,
        $stringColor
    ) {
        $this->defaultColor  = $defaultColor;
        $this->commentColor  = $commentColor;
        $this->htmlColor     = $htmlColor;
        $this->keywordColor  = $keywordColor;
        $this->stringColor   = $stringColor;
    }

    public function applyColors()
    {
        ini_set('highlight.default', $this->defaultColor);
        ini_set('highlight.comment', $this->commentColor);
        ini_set('highlight.html', $this->htmlColor);
        ini_set('highlight.keyword', $this->keywordColor);
        ini_set('highlight.string', $this->stringColor);
    }
}
