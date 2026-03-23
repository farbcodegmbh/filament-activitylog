<?php

namespace Workbench\Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Workbench\App\Models\DemoUser;
use Workbench\Database\Factories\DemoUserFactory;
use Workbench\Database\Factories\UserFactory;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $adminUser = UserFactory::new()->create([
            'name'  => 'Test User',
            'email' => 'test@example.com',
        ]);

        $demoUsers = DemoUserFactory::new()->count(6)->create();

        // Seed deterministic activity logs for the demo table action timeline.
        $demoUsers->each(function (DemoUser $demoUser, int $index) use ($adminUser): void {
            activity()
                ->causedBy($adminUser)
                ->performedOn($demoUser)
                ->event('created')
                ->withProperties([
                    'attributes' => [
                        'id'    => $demoUser->id,
                        'name'  => $demoUser->name,
                        'email' => $demoUser->email,
                    ],
                ])
                ->log('created');

            if ($index < 3) {
                $oldName = $demoUser->name;

                $demoUser->update([
                    'name' => $demoUser->name . ' (updated)',
                ]);

                activity()
                    ->causedBy($adminUser)
                    ->performedOn($demoUser)
                    ->event('updated')
                    ->withProperties([
                        'old'        => ['name' => $oldName],
                        'attributes' => ['name' => $demoUser->name],
                    ])
                    ->log('updated');
            }

            if ($index === 0) {
                $oldEmail = $demoUser->email;

                $demoUser->update([
                    'email' => 'demo.user@example.com',
                ]);

                activity()
                    ->causedBy($adminUser)
                    ->performedOn($demoUser)
                    ->event('updated')
                    ->withProperties([
                        'old'        => ['email' => $oldEmail],
                        'attributes' => ['email' => $demoUser->email],
                    ])
                    ->log('updated');
            }
        });
    }
}
