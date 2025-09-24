<?php

namespace Demyanovs\PHPHighlight;

use Demyanovs\PHPHighlight\Themes\Theme;

class HighlighterBase
{
    /**
     * @var string[]
     */
    protected $keywords = [];

    /**
     * @var Theme
     */
    protected $theme;

    /**
     * @var string
     */
    protected $text;

    /**
     * HighlighterBase constructor.
     *
     * @param string $text
     */
    public function __construct($text)
    {
        $this->text = $text;
    }

    /**
     * @param Theme $theme
     */
    public function setTheme($theme)
    {
        $this->theme = $theme;
    }

    /**
     * @return string
     */
    public function highlight()
    {
        $byLines = explode(PHP_EOL, $this->text);
        $lines   = [];
        foreach ($byLines as $key => $line) {
            // Comment line
            if ($this->isCommentLine($line)) {
                $lines[$key] = self::colorWord($line, $line, $this->theme->defaultColorSchema->getCommentColor());
                continue;
            }

            $words = array_unique(explode(' ', $line));
            foreach ($words as $word) {
                $word = trim($word);
                if ($this->isKeyword($word)) {
                    $line = self::colorWord($word, $line, $this->theme->defaultColorSchema->getKeywordColor());
                } elseif ($this->isFlag($word)) {
                    $line = self::colorWord($word, $line, $this->theme->defaultColorSchema->getFlagColor());
                } elseif ($this->isVariable($word)) {
                    $line = self::colorWord($word, $line, $this->theme->defaultColorSchema->getVariableColor());
                }

                $lines[$key] = $line;
            }
        }

        return sprintf(
            '<span style="color:%s">%s</span>',
            $this->theme->defaultColorSchema->getStringColor(),
            implode('<br />', $lines)
        );
    }

    /**
     * @param string $word
     * @param string $line
     * @param string $color
     * @return string
     */
    public static function colorWord($word, $line, $color)
    {
        return str_replace(
            $word,
            sprintf('<span style="color: %s">%s</span>', $color, $word),
            $line
        );
    }

    /**
     * @param string $text
     */
    public function setText($text)
    {
        $this->text = $text;
    }

    /**
     * @param string $word
     * @return bool
     */
    protected function isVariable($word)
    {
        return strpos($word, '$') === 0;
    }

    /**
     * @param string $word
     * @return bool
     */
    protected function isFlag($word)
    {
        return strpos($word, '-') === 0;
    }

    /**
     * @param string $word
     * @return bool
     */
    protected function isKeyword($word)
    {
        return in_array($word, $this->keywords);
    }

    /**
     * @param string $word
     * @return bool
     */
    protected function isCommentLine($word)
    {
        return strpos($word, '#') === 0;
    }
}
