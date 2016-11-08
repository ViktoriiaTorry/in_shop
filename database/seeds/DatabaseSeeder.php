<?php
use App\Models\Categories;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call('CitiesSeeder');
    }
}
class CitiesSeeder extends Seeder
{
    public function run()
    {
         DB::table('cities')->insert([
            'city' => 'Odessa'
            ]);
             DB::table('cities')->insert([
            'city' => 'Kharkov'
            ]);
             DB::table('cities')->insert([
            'city' => 'Lvov'
            ]);
             DB::table('cities')->insert([
            'city' => 'Dnepr'
            ]);
             DB::table('cities')->insert([
            'city' => 'Nikolaev'
              ]);

    }
}
