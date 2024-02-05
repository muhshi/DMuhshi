<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class DummySeeder extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create('id_ID');
        for ($i = 0; $i <= 10; $i++) {
            $data = [
                'name' => $faker->name,
                'Jabatan' => "Prakom Pertama",
                'created_at' => \CodeIgniter\I18n\Time::now(),
            ];

            $this->db->table('dummy')->insert($data);
        }
    }
}
