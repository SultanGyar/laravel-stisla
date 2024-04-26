<?php

namespace Database\Seeders;

use App\Models\KategoriPeralatan;
use App\Models\Penjadwalan;
use App\Models\Peralatan;
use App\Models\Perbaikan;
use App\Models\PointCheck;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DummyDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(KategoriPeralatanSeeder::class);
        $this->call(PeralatanSeeder::class);
        $this->call(PointCheckSeeder::class);
        // $this->call(PenjadwalanSeeder::class);
        // $this->call(PerbaikanSeeder::class);
    }
}


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'username' => 'admin',
            'password' => Hash::make('admin'), // Hash password menggunakan fasilitas bawaan Laravel
            'level' => 'Admin',
        ]);

        User::create([
            'username' => 'teknisi',
            'password' => Hash::make('teknisi'),
            'level' => 'Teknisi',
        ]);

        User::create([
            'username' => 'guru',
            'password' => Hash::make('guru'),
            'level' => 'Guru',
        ]);

        User::create([
            'username' => 'siswa',
            'password' => Hash::make('siswa'),
            'level' => 'Siswa',
        ]);
    }
}

class KategoriPeralatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        KategoriPeralatan::create([
            'kategori_alat' => 'Router',
        ]);

        KategoriPeralatan::create([
            'kategori_alat' => 'Switch',
        ]);

        KategoriPeralatan::create([
            'kategori_alat' => 'Access Point (AP)',
        ]);

        KategoriPeralatan::create([
            'kategori_alat' => 'Server',
        ]);

        KategoriPeralatan::create([
            'kategori_alat' => 'Perangkat firewall',
        ]);
    }
}

class PeralatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Mendapatkan ID kategori untuk setiap kategori alat
        $router = KategoriPeralatan::where('kategori_alat', 'Router')->first()->id;
        $switch = KategoriPeralatan::where('kategori_alat', 'Switch')->first()->id;
        $ap = KategoriPeralatan::where('kategori_alat', 'Access Point (AP)')->first()->id;
        $server = KategoriPeralatan::where('kategori_alat', 'Server')->first()->id;
        $firewall = KategoriPeralatan::where('kategori_alat', 'Perangkat firewall')->first()->id;

        // Memasukkan data awal ke dalam Tabel 'peralatan'
        Peralatan::create([
            'id_alat' => 'AL0001',
            'nama_alat' => 'Nama Router',
            'id_kategori_alat' => $router,
        ]);

        Peralatan::create([
            'id_alat' => 'AL0002',
            'nama_alat' => 'Nama Switch',
            'id_kategori_alat' => $switch,
        ]);

        Peralatan::create([
            'id_alat' => 'AL0003',
            'nama_alat' => 'Nama Access Point (AP)',
            'id_kategori_alat' => $ap,
        ]);

        Peralatan::create([
            'id_alat' => 'AL0004',
            'nama_alat' => 'Nama Server',
            'id_kategori_alat' => $server,
        ]);

        Peralatan::create([
            'id_alat' => 'AL0005',
            'nama_alat' => 'Nama Perangkat firewall',
            'id_kategori_alat' => $firewall,
        ]);
    }
}

class PointCheckSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PointCheck::create([
            'nama_point_check' => 'Point Check Satu',
        ]);

        PointCheck::create([
            'nama_point_check' => 'Point Check Dua',
        ]);

        PointCheck::create([
            'nama_point_check' => 'Point Check Tiga',
        ]);
    }
}

// class PenjadwalanSeeder extends Seeder
// {
//     /**
//      * Run the database seeds.
//      *
//      * @return void
//      */
//     public function run()
//     {
//         // Masukkan data awal ke dalam Tabel Dua
//         Penjadwalan::create([
//             'kolom_satu' => 'Nilai Satu',
//             'kolom_dua' => 'Nilai Dua',
//             // Masukkan kolom lainnya sesuai kebutuhan
//         ]);

//         // Tambahkan data lainnya sesuai kebutuhan
//     }
// }
// class PerbaikanSeeder extends Seeder
// {
//     /**
//      * Run the database seeds.
//      *
//      * @return void
//      */
//     public function run()
//     {
//         // Masukkan data awal ke dalam Tabel Dua
//         Perbaikan::create([
//             'kolom_satu' => 'Nilai Satu',
//             'kolom_dua' => 'Nilai Dua',
//             // Masukkan kolom lainnya sesuai kebutuhan
//         ]);

//         // Tambahkan data lainnya sesuai kebutuhan
//     }
// }
