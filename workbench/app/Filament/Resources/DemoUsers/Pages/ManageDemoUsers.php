<?php

namespace Workbench\App\Filament\Resources\DemoUsers\Pages;

use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ManageRecords;
use Workbench\App\Filament\Resources\DemoUsers\DemoUserResource;

class ManageDemoUsers extends ManageRecords
{
    protected static string $resource = DemoUserResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
