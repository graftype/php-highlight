<?php

namespace Demyanovs\PHPHighlight;

class HighlighterBash extends HighlighterBase
{
    /**
     * @var HighlighterBash|null
     */
    private static $instance = null;

    /**
     * @var string[]
     */
    protected $keywords = [
        'wget',
        'tar',
        'cd',
        'rsync',
        'cp',
        'echo',
        'if',
        'else',
        'then',
        'fi',
        'while',
        'echo',
        '=',
        '==',
        '===',
        'exit',
        'for',
        'done',
        '<',
        '>',
        'read',
        'require',
        'composer',
    ];

    /**
     * @param string $text
     * @return HighlighterBash
     */
    public static function getInstance($text)
    {
        if (self::$instance) {
            self::$instance->setText($text);
            return self::$instance;
        }

        self::$instance = new self($text);
        return self::$instance;
    }
}
