<?php

use App\Instrument;
use App\Market;
use App\Role;
use App\Trade;
use App\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // settet InnoDB in database.php config
        Storage::deleteDirectory('users');
        Storage::makeDirectory('users');

        factory(Role::class, 1)->create(['name' => 'ADMIN']);
        factory(Role::class, 1)->create(['name' => 'USER_BASIC']);

        factory(Market::class, 1)->create(['name' => 'Futures']);
        factory(Instrument::class, 1)->create([
            'name' => "ES",
            'description' => 'E-mini SP500'
        ]);

        /*factory(User::class, 1)->create([
            'name' => 'admin',
            'last_name' => 'admin',
            'email' => 'admin@mail.com',
            'password' => bcrypt('secretsecretx2'),
            'role_id' => \App\Role::ADMIN
        ]);

        factory(User::class, 1)->create([
            'name' => 'user',
            'last_name' => 'lastname',
            'email' => 'user@mail.com',
            'password' => bcrypt('secret'),
            'role_id' => \App\Role::USER_BASIC
        ]);
        factory(Trade::class, 1000)->create()
            ->each(function(Trade $t){
                $t->created_at = Carbon::now()->subDays($t->id);
                $t->save();
            });*/
    }
}
