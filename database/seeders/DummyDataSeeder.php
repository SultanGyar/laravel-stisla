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
        $this->call(PenjadwalanSeeder::class);
        $this->call(PerbaikanSeeder::class);
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
            'nama_alat' => 'Router RB3690S',
            'id_kategori_alat' => $router,
        ]);

        Peralatan::create([
            'id_alat' => 'AL0002',
            'nama_alat' => 'Switch XYZ2000',
            'id_kategori_alat' => $switch,
        ]);

        Peralatan::create([
            'id_alat' => 'AL0003',
            'nama_alat' => 'Access Point (AP) AC1200',
            'id_kategori_alat' => $ap,
        ]);

        Peralatan::create([
            'id_alat' => 'AL0004',
            'nama_alat' => 'Server Dell PowerEdge R740',
            'id_kategori_alat' => $server,
        ]);

        Peralatan::create([
            'id_alat' => 'AL0005',
            'nama_alat' => 'Perangkat firewall FortiGate 100F',
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

class PenjadwalanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Data Seeder 1
        Penjadwalan::create([
            'id_penjadwalan' => 'PJ001',
            'tanggal' => '2024-04-01',
            'nama_alat' => 'Router RB3690S',
            'id_nama_alat' => 1,
            'id_point_check' => 1,
            'ruangan' => 'A101',
            'tanggal_jadwal' => '2024-04-01',
        ]);

        // Data Seeder 2
        Penjadwalan::create([
            'id_penjadwalan' => 'PJ002',
            'tanggal' => '2024-04-02',
            'nama_alat' => 'Switch XYZ2000',
            'id_nama_alat' => 2,
            'id_point_check' => 2,
            'ruangan' => 'B202',
            'tanggal_jadwal' => '2024-04-02',
        ]);

        // Data Seeder 3
        Penjadwalan::create([
            'id_penjadwalan' => 'PJ003',
            'tanggal' => '2024-04-03',
            'nama_alat' => 'Access Point (AP) AC1200',
            'id_nama_alat' => 3,
            'id_point_check' => 3,
            'ruangan' => 'C303',
            'tanggal_jadwal' => '2024-04-03',
        ]);
    }
}


class PerbaikanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Data Seeder 1
        Perbaikan::create([
            'id_perbaikan' => 'PB001',
            'id_user' => 1,
            'tanggal' => '2024-04-01',
            'nama_alat' => 'Router RB3690S',
            'id_alat_form' => 1,
            'nama_pelapor' => 'John Doe',
            'kelas' => 'XII IPA',
            'keterangan' => 'Router mengalami gangguan jaringan',
        ]);

        // Data Seeder 2
        Perbaikan::create([
            'id_perbaikan' => 'PB002',
            'id_user' => 2,
            'tanggal' => '2024-04-02',
            'nama_alat' => 'Switch XYZ2000',
            'id_alat_form' => 2,
            'nama_pelapor' => 'Jane Smith',
            'kelas' => 'XII IPS',
            'keterangan' => 'Switch mati total',
        ]);

        // Data Seeder 3
        Perbaikan::create([
            'id_perbaikan' => 'PB003',
            'id_user' => 3,
            'tanggal' => '2024-04-03',
            'nama_alat' => 'Access Point (AP) AC1200',
            'id_alat_form' => 3,
            'nama_pelapor' => 'Michael Johnson',
            'kelas' => 'XII Bahasa',
            'keterangan' => 'Access Point tidak dapat diakses dari jarak jauh',
        ]);
    }
}
