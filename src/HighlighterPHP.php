<?php

namespace Demyanovs\PHPHighlight;

class HighlighterPHP extends HighlighterBase
{
    /**
     * @var HighlighterPHP|null
     */
    private static $instance = null;

    /**
     * @param string $text
     * @return HighlighterPHP
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

    /**
     * @return string
     */
    public function highlight()
    {
        // 1) Highlight the code using PHP's built-in highlighter.
        //    Prepend "<?php " so tokens are parsed correctly.
        $html = highlight_string('<?php ' . rtrim($this->text, "\r\n"), true);
    
        // 2) Remove optional <code> wrappers.
        $html = preg_replace('~</?code[^>]*>~i', '', $html);
    
        // 3) Normalize line breaks.
        $html = str_replace(["\r\n", "\r", "\n"], '<br />', $html);
        $html = preg_replace('~<br\s*/?>~i', '<br />', $html);
    
        // 4) Remove the inserted "<?php " header.
        $html = preg_replace('~&lt;\?php(?:&nbsp;|\s)+~i', '', $html, 1);
    
        // 5) Remove any leading &nbsp; at the start (fixes unwanted indentation).
        $html = preg_replace('~^(&nbsp;)+~i', '', $html);
    
        // 6) Collapse accidental multiple breaks.
        $html = preg_replace('~(?:<br\s*/?>\s*){2,}~i', '<br />', $html);
    
        return $html;
    }
}
