<?php

use App\Models\SiteSetting;
use Illuminate\Database\Seeder;

class FakeSiteSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $settings = [
            'about',
            'contact'
        ];

        foreach ($settings as $setting) {
            factory(SiteSetting::class)
                ->create([
                    'key' => $setting
                ]);
        }
    }
}
