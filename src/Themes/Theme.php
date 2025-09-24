<?php

namespace Demyanovs\PHPHighlight\Themes;

use Demyanovs\PHPHighlight\Themes\Dto\DefaultColorSchemaDto;
use Demyanovs\PHPHighlight\Themes\Dto\PHPColorSchemaDto;
use Demyanovs\PHPHighlight\Themes\Dto\XMLColorSchemaDto;

class Theme
{
    /**
     * @var string
     */
    private $title;

    /**
     * @var DefaultColorSchemaDto
     */
    public $defaultColorSchema;

    /**
     * @var PHPColorSchemaDto
     */
    public $PHPColorSchemaDto;

    /**
     * @var XMLColorSchemaDto
     */
    public $XMLColorSchemaDto;

    /**
     * Theme constructor.
     *
     * @param string               $title
     * @param DefaultColorSchemaDto $defaultColorSchema
     * @param PHPColorSchemaDto     $PHPColorSchemaDto
     * @param XMLColorSchemaDto     $XMLColorSchemaDto
     */
    public function __construct(
        $title,
        DefaultColorSchemaDto $defaultColorSchema,
        PHPColorSchemaDto $PHPColorSchemaDto,
        XMLColorSchemaDto $XMLColorSchemaDto
    ) {
        $this->title              = $title;
        $this->defaultColorSchema = $defaultColorSchema;
        $this->PHPColorSchemaDto  = $PHPColorSchemaDto;
        $this->XMLColorSchemaDto  = $XMLColorSchemaDto;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }
}
