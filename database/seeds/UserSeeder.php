<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory (\App\Customer::class,10000)->create ()->each(function ($user) {
			return $user->address()->save(factory(App\Address::class)->make())->id;

		});
    }
}
