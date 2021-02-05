<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
class DokterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$faker = Faker::create('id_ID');
    	for($i = 1; $i <= 5; $i++){
    		$names = array('Perawatan Wajah', 'Perawatan Kulit','Bedah Plastik');
    		$spesialis = $names[mt_rand(0, sizeof($names) - 1)];
    		
    		$awal = array('Senin', 'Selasa','Rabu');
    		$hari_awal = $awal[mt_rand(0, sizeof($awal) - 1)];
    		$akhir = array('Kamis', 'Jumat','Sabtu');
    		$hari_akhir = $akhir[mt_rand(0, sizeof($akhir) - 1)];

    		$mulai = array('07:00', '08:00','09:00');
    		$jam_mulai = $mulai[mt_rand(0, sizeof($mulai) - 1)];
    		$selesai = array('11:00','12:00','13:00');
    		$jam_selesai = $selesai[mt_rand(0, sizeof($selesai) - 1)];
    	      // insert data ke table dokter menggunakan Faker
    		$id =  \App\dokter::create([
    			'nama_dokter' => $faker->name,
    			'spesialis' => $spesialis,
    			'created_at' => date("Y-m-d H:i:s"),
    			'updated_at' => date("Y-m-d H:i:s")
    		])->id_dokter;

    		 \App\jadwaldokter::create([
    			'id_dokter' => $id,
    			'hari_awal' => $hari_awal,
    			'hari_akhir' => $hari_akhir,
    			'jam_mulai' => $jam_mulai,
    			'jam_selesai' => $jam_selesai,
    			'created_at' => date("Y-m-d H:i:s"),
    			'updated_at' => date("Y-m-d H:i:s")
    		]);

    	}
    }
}
