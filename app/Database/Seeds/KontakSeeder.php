<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class KontakSeeder extends Seeder
{
	public function run()
	{
		$data = [
			[
				'nomor_telepon' => '081256489630',
				'jam_kerja' 	=> 'Senin - Jumat (07.30 - 15.00 WIB)',
				'email' 		=> 'desakudesamu@sidesa.id',
				'web' 			=> 'desakudesamu.id',
				'alamat' 		=> 'Jalan Rengasdengklok Nomor 90',
				'provinsi' 		=> 'Jember'
			]
		];

		$this->db->table('kontak')->insertBatch($data);
	}
}
