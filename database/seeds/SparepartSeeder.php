<?php

use Illuminate\Database\Seeder;

use App\sparepart;

class SparepartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        foreach(range(1,20) as $i) {
            sparepart::create ([
                'kode_sparepart' => $faker->countryCode,
                'nama_sparepart' => $faker->name,
                'merk_sparepart' => $faker->name,
                'tipe_sparepart' => $faker->name,
                'gambar_sparepart' => $faker->phoneNumber,
                'jumlah_stok_sparepart' => $faker->numberBetween(1,50),
                'harga_beli_sparepart' => $faker->randomNumber(4),
                'harga_jual_sparepart' =>$faker->randomNumber(4),
                'jumlah_minimal' =>$faker->randomNumber(2)
            ]);
        }
    }
}
