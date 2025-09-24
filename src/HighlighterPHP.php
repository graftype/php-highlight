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
    public function highlight(): string
    {
        $text = str_replace(
            ['&lt;?php&nbsp;', '<code>', '</code>'],
            '',
            highlight_string('<?php ' . trim($this->text), true),
        );
        $text = str_replace(PHP_EOL, '<br />', $text);

        // Extra logic for PHP 8+
        if (PHP_VERSION_ID >= 80000) {
            // On PHP 8+ highlight_string() wraps "<?php" differently
            // Remove "<?php" including optional <span> wrapper and spaces/&nbsp;
            $text = preg_replace('~<span[^>]*>\s*&lt;\?php(?:&nbsp;|\s)+</span>~i', '', $text, 1);
            $text = preg_replace('~^\s*&lt;\?php(?:&nbsp;|\s)+~i', '', $text, 1);
    
            // Also clean any leading &nbsp; that may cause indentation
            $text = preg_replace('~^(?:&nbsp;|\s)+~u', '', $text);
        }

        $byLines = explode('<br />', $text);
        $lines    = [];
        $i        = 0;
        foreach ($byLines as $key => $line) {
            $i++;
            if ($i === 1) {
                continue;
            }

            // Join first two rows
            if ($i === 2) {
                $line = $byLines[0] . $byLines[1];
            }

            // Join last rows
            if (
                $i === count($byLines) - 3 &&
                $byLines[count($byLines) - 2] === '</span>' &&
                $byLines[count($byLines) - 1] === ''
            ) {
                $lines[] = $byLines[count($byLines) - 4];
                $lines[] = $byLines[$i] . $byLines[count($byLines) - 2] . $byLines[count($byLines) - 1];
                break;
            }

            $lines[$key] = $line;
        }

        return implode('<br />', $lines);
    }
}
