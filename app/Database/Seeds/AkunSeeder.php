<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AkunSeeder extends Seeder
{
	public function run()
	{
		$data = [
			[
				'username' => 'admin',
				'password' => 'admin'
			]
		];

		$this->db->table('akun')->insertBatch($data);
	}
}
