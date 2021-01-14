<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Create Admin
        DB::table('admin')->insert([
            'national_id' => '198217281219212',
            'name' => 'Rian Iregho',
            'email' => 'rianiregho@gmail.com',
            'username' => 'admin',
            'password' => bcrypt('admin'),
            'phone' => '0813 7617 3959',
        ]);

        // Create Dummy Data for Province And City
        $province = ['Sumatera Utara','DKI Jakarta'];
        $city = ['Medan','Deli Serdang', 'Jakarta Utara', 'Jakarta Selatan'];
        for($i=1; $i<=count($province); $i++){
            DB::table('province')->insert([
                'id' => $i,
                'name' => $province[$i-1],
            ]);
            if($i<=1){
                for($j=0; $j<2; $j++){
                    DB::table('city')->insert([
                        'province_id' => $i,
                        'name' => $city[$j],
                    ]);
                }
            }else{
                for($j=2; $j<4; $j++){
                    DB::table('city')->insert([
                        'province_id' => $i,
                        'name' => $city[$j],
                    ]);
                }
            }
        }

        // Create Dummy Data for People
        // $people = ['Pelapor 1', 'Pelapor 2'];
        // for($i=0; $i<count($people); $i++){
        //     DB::table('members')->insert([
        //         'national_id' => '00000'.strval($i),
        //         'province_id' => $i,
        //         'city_id' => $i,
        //         'first_name' => $people[$i],
        //         'last_name' => '-',
        //         'idcard_image' => '-',
        //         'selfie_idcard_image' => '-',
        //     ]);
        // }

        // Dummy Adds
        $title = ['Protokol Covid Terbaru', 'Makanan Bergizi Kuatkan Imun'];
        $des = ['Pemerintah menerapkan aturan baru untuk protokol kesehatan', 'Warga dihimbau untuk mengkonsumsi makanan bergizi hindari covid'];
        for($i=0; $i<count($title); $i++){
            DB::table('adds')->insert([
                'title' => $title[$i],
                'description' => $des[$i],
            ]);
        }
    }
}
