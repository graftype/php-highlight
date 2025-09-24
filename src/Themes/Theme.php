<?php

namespace Demyanovs\PHPHighlight\Themes;

use Demyanovs\PHPHighlight\Themes\Dto\DefaultColorSchemaDto;
use Demyanovs\PHPHighlight\Themes\Dto\PHPColorSchemaDto;
use Demyanovs\PHPHighlight\Themes\Dto\XMLColorSchemaDto;

class Theme
{
    private string $title;
    public DefaultColorSchemaDto $defaultColorSchema;
    public PHPColorSchemaDto $PHPColorSchemaDto;
    public XMLColorSchemaDto $XMLColorSchemaDto;

    public function __construct(
        string $title,
        DefaultColorSchemaDto $defaultColorSchema,
        PHPColorSchemaDto $PHPColorSchemaDto,
        XMLColorSchemaDto $XMLColorSchemaDto,
    ) {
        $this->title = $title;
        $this->defaultColorSchema = $defaultColorSchema;
        $this->PHPColorSchemaDto = $PHPColorSchemaDto;
        $this->XMLColorSchemaDto = $XMLColorSchemaDto;
    }

    public function getTitle(): string
    {
        return $this->title;
    }
}

