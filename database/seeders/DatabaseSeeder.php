<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\BidangKeahlian;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(50)->create([
            'foto' => 'https://png.pngtree.com/png-clipart/20221227/original/pngtree-host-and-admin-marketing-job-vacancies-vector-png-image_8815346.png',
            'kategori' => '0'
        ]);
        \App\Models\User::factory(50)->create([
            'foto' => 'https://png.pngtree.com/png-clipart/20221227/original/pngtree-host-and-admin-marketing-job-vacancies-vector-png-image_8815346.png',
            'kategori' => '1'
        ]);
        \App\Models\User::factory(100)->create([
            'foto' => 'https://png.pngtree.com/png-clipart/20221227/original/pngtree-host-and-admin-marketing-job-vacancies-vector-png-image_8815346.png',
            'kategori' => '2'
        ]);

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        BidangKeahlian::insert([
            ['image' => 'bx bx-bar-chart-alt', 'nama' => 'SOSPEN'],
            ['image' => 'bx bxs-component', 'nama' => 'KOMPUTASI'],
            ['image' => 'bx bx-line-chart', 'nama' => 'ANDEF'],
            ['image' => 'bx bx-slideshow', 'nama' => 'LINGKES'],
            ['image' => 'bx bx-shape-triangle', 'nama' => 'SBI'],
            ['image' => 'bx bx-file-blank', 'nama' => 'DATA ANALISIS'],
            ['image' => 'bx bx-folder-open', 'nama' => 'ANALISIS TA'],
        ]);
        
        // $table->string('foto')->nullable();
        // $table->string('name');
        // $table->string('email')->unique();
        // $table->timestamp('email_verified_at')->nullable();
        // $table->string('password');
        // $table->string('instansi')->nullable();
        // $table->string('deskripsi')->nullable();
        // $table->string('saldo')->default('0');
        // $table->string('harga')->default('1000');
        // $table->integer('role')->default(0);
        // $table->integer('kategori')->default(0);
        // $table->foreignId('bidangKeahlian_id')->default(0);
    }
}
