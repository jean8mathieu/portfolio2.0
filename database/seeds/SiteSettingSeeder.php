<?php

use App\Models\SiteSetting;
use Illuminate\Database\Seeder;

class SiteSettingSeeder extends Seeder
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
            if (SiteSetting::get($setting) === "") {
                SiteSetting::set($setting, '');
            }
        }
    }
}
