<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class PersentasepekerjaanSeeder extends Seeder
{
	public function run()
	{
		$data = [
			[
				'pekerjaan'  => 'Petani',
				'persentase' => '95'
			],
			[
				'pekerjaan'  => 'Karyawan Swasta',
				'persentase' => '85'
			],
			[
				'pekerjaan'  => 'Ibu Rumah Tangga',
				'persentase' => '75'
			],
			[
				'pekerjaan'  => 'Wirausaha',
				'persentase' => '65'
			],
			[
				'pekerjaan'  => 'Sekolah',
				'persentase' => '65'
			],
			[
				'pekerjaan'  => 'Tidak Bekerja',
				'persentase' => '65'
			],
		];

		$this->db->table('persentase_pekerjaan')->insertBatch($data);
	}
}
