<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Kabupaten;
use App\Models\Kecamatan;
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
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        // $data = new Kabupaten();
        // $data->id_kabupaten = \Ramsey\Uuid\Uuid::uuid4()->toString();
        // $data->nama_kabupaten = "Bekasi";
        // $data->save();

        $data = new Kecamatan();
        $data->id_kecamatan = \Ramsey\Uuid\Uuid::uuid4()->toString();
        $data->nama_kecamatan = "Cibitung";
        $data->id_kabupaten = "040c7007-0be8-4d4b-a18e-fee27dc5f52c";
        $data->save();

        $data = new Kecamatan();
        $data->id_kecamatan = \Ramsey\Uuid\Uuid::uuid4()->toString();
        $data->nama_kecamatan = "Cikarang ";
        $data->id_kabupaten = "040c7007-0be8-4d4b-a18e-fee27dc5f52c";
        $data->save();

        $data = new Kecamatan();
        $data->id_kecamatan = \Ramsey\Uuid\Uuid::uuid4()->toString();
        $data->nama_kecamatan = "Kedungwaringin";
        $data->id_kabupaten = "040c7007-0be8-4d4b-a18e-fee27dc5f52c";
        $data->save();
    }
}
