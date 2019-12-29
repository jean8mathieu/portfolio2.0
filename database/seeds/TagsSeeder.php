<?php

use Illuminate\Database\Seeder;
use App\Models\Tag;
use App\Models\User;

class TagsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = [
            'NodeJS' => Tag::TYPE_BACKEND,
            'PHP' => Tag::TYPE_BACKEND,
            'Laravel' => Tag::TYPE_BACKEND,
            'FuelPHP' => Tag::TYPE_BACKEND,
            'CakePHP' => Tag::TYPE_BACKEND,
            'Symfony' => Tag::TYPE_BACKEND,
            'Java' => Tag::TYPE_BACKEND,
            'CSS' => Tag::TYPE_FRONTEND,
            'HTML' => Tag::TYPE_FRONTEND,
            'Javascript' => Tag::TYPE_FRONTEND,
            'Ajax' => Tag::TYPE_FRONTEND,
            'JQuery' => Tag::TYPE_FRONTEND,
            'VueJS' => Tag::TYPE_FRONTEND,
            'AngularJS' => Tag::TYPE_FRONTEND,
            'ReactJS' => Tag::TYPE_FRONTEND,
            'SQL' => Tag::TYPE_DATABASE,
            'MySQL' => Tag::TYPE_DATABASE,
            'MSSQL' => Tag::TYPE_DATABASE,
            'OracleSQL' => Tag::TYPE_DATABASE,
            'MongoDB' => Tag::TYPE_DATABASE
        ];

        $user = User::query()->first();

        foreach($types as $key => $value) {
            Tag::create([
                'name' => $key,
                'type' => $value,
                'user_id' => $user->id
            ]);
        }
    }
}
