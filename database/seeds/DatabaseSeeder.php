<?php

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
        $this->call(UserSeeder::class);
        $this->call(NotifySeeder::class);
        $this->call(SubSyohinCategorySeeder::class);
        $this->call(SyohinCategorySeeder::class);
        $this->call(TaisyoSyohinSeeder::class);
//         $this->call(PolicySeeder::class);
        $this->call(TaisyoSyohin20Seeder::class);
        $this->call(BuilderSeeder::class);
        $this->call(FaqSeeder::class);
        $this->call(TaisyoSyohinV2Seeder::class);
        $this->call(TaisyoSyohinV3Seeder::class);
        $this->call(TaisyoSyohinEdit20Seeder::class);
        $this->call(TaisyoSyohinV4Seeder::class);
        $this->call(FaqV2Seeder::class);
        $this->call(AddNewDataBuilderSeeder::class);
        $this->call(TaisyoSyohinUpdateSeeder::class);
    }

}
