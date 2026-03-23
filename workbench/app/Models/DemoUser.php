<?php

namespace Workbench\App\Models;

use Database\Factories\DemoUserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class DemoUser extends Model
{
    /** @use HasFactory<DemoUserFactory> */
    use HasFactory;

    use LogsActivity;

    protected $fillable = [
        'name',
        'email',
    ];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly(['name', 'email'])
            ->logOnlyDirty()
            ->setDescriptionForEvent(fn (string $eventName): string => $eventName);
    }
}
