<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Destinasi;

class DestinasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Destinasi::truncate();
 
        Destinasi::create([
        'nama' => 'Pulau Mentawai',
        'deskripsi' => 'Kepulauan Mentawai adalah gugusan pulau di lepas pantai barat Sumatera Barat yang terkenal sebagai destinasi surfing kelas dunia berkat ombaknya yang panjang dan konsisten, disejajarkan dengan Hawaii. Selain itu, Mentawai menawarkan pantai berpasir putih yang masih sepi, hutan tropis untuk trekking, serta budaya suku asli yang masih terjaga — mulai dari rumah adat uma hingga tradisi Sikerei sebagai tabib dan pemuka spiritual.',
        'gambar' => 'Mentawai.jpeg',
        'jam_buka' => '06:00:00',
        'jam_tutup' => '17:59:00',
        'lokasi' => 'Kab. Kepulauan Mentawai, Provinsi Sumatera Barat',
    ]);
 
    Destinasi::create([
        'nama' => 'Ngarai Sianok',
        'deskripsi' => 'Ngarai Sianok adalah sebuah lembah yang terletak di Kabupaten Agam, Sumatera Barat. Lembah ini dikenal dengan pemandangan alam yang indah, termasuk tebing tinggi, sungai yang jernih, dan hutan tropis yang masih asli.',
        'gambar' => 'ngarai-sianok.jpg',
        'jam_buka' => '06:00:00',
        'jam_tutup' => '17:59:00',
        'lokasi' => 'Kecamatan Guguk Panjang, Kelurahan Kayu Kubu',
    ]);
    
    Destinasi::create([
        'nama' => 'Danau Maninjau',
        'deskripsi' => 'Danau Maninjau adalah sebuah danau yang terletak di Kabupaten Agam, Sumatera Barat. Danau ini dikenal dengan pemandangan alam yang indah, termasuk pemandangan gunung, hutan tropis, dan keanekaragaman hayati yang kaya.',
        'gambar' => 'danau-maninjau.jpg',
        'jam_buka' => '06:00:00',
        'jam_tutup' => '17:59:00',
        'lokasi' => 'Kecamatan Tanjung Raya, Nagari Maninjau',
    ]);
}}
