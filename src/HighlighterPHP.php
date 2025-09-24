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
        // 1) Ask PHP to highlight the code; prepend "<?php " so tokens are recognized
        $html = highlight_string('<?php ' . rtrim($this->text, "\r\n"), true);
    
        // 2) Remove optional <code> wrappers returned by highlight_string()
        $html = preg_replace('~</?code[^>]*>~i', '', $html);
    
        // 3) Normalize line breaks:
        //    - Convert raw newlines to <br />
        //    - Normalize any <br>, <br/>, <br /> variants to a single form
        $html = str_replace(["\r\n", "\r", "\n"], '<br />', $html);
        $html = preg_replace('~<br\s*/?>~i', '<br />', $html);
    
        // 4) Remove the inserted "&lt;?php " header ONLY (keep the following line break intact)
        //    This regex strips "<?php" plus any spaces/&nbsp; that follow it, but does NOT eat the next <br />
        $html = preg_replace('~&lt;\?php(?:&nbsp;|\s)+~i', '', $html, 1);
    
        // 5) (Optional) Collapse accidental double breaks after normalization
        $html = preg_replace('~(?:<br\s*/?>\s*){2,}~i', '<br />', $html);
    
        return $html;
    }
}
