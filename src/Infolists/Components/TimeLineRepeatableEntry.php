<?php

namespace Rmsramos\Activitylog\Infolists\Components;

use Filament\Infolists\Components\RepeatableEntry;

class TimeLineRepeatableEntry extends RepeatableEntry
{
    protected function setUp(): void
    {
        parent::setUp();

        $this->configureRepeatableEntry();
    }

    protected function configureRepeatableEntry(): void
    {
        $this
            ->contained(false)
            ->hiddenLabel();
    }

    protected string $view = 'activitylog::filament.infolists.components.time-line-repeatable-entry';
}
