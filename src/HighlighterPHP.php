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
        // 1) Add a newline after "<?php" 
        //    to prevent the first line from sticking to comments/code
        $html = highlight_string('<?php' . PHP_EOL . trim($this->text), true);
    
        // 2) Remove possible <code>...</code> wrappers
        $html = preg_replace('~</?code[^>]*>~i', '', $html);
    
        // 3) Reliably remove the inserted "<?php" by cutting everything before the first <br />
        $pos = strpos($html, '<br />');
        if ($pos !== false) {
            $html = substr($html, $pos + 6); // 6 = length of "<br />"
        } else {
            // Fallback: remove any HTML-encoded variants of "<?php"
            $html = preg_replace('~&lt;\?php(?:&nbsp;|\s)*~i', '', $html);
        }
    
        // 4) Normalize line breaks
        $html = str_replace(PHP_EOL, '<br />', $html);
    
        return $html;
    }
}
