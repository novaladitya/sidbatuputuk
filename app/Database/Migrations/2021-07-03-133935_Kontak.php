<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Kontak extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id' => [
				'type'           => 'INT',
				'constraint'     => 100,
				'unsigned'       => true,
				'auto_increment' => true,
			],
			'nomor_telepon' => [
				'type'           => 'VARCHAR',
				'constraint'     => 255,
			],
			'jam_kerja' => [
				'type'           => 'VARCHAR',
				'constraint'     => 255,
			],
			'email' => [
				'type'           => 'VARCHAR',
				'constraint'     => 255,
			],
			'web' => [
				'type'           => 'VARCHAR',
				'constraint'     => 255,
			],
			'alamat' => [
				'type'           => 'VARCHAR',
				'constraint'     => 255,
			],
			'provinsi' => [
				'type'           => 'VARCHAR',
				'constraint'     => 255,
			]
		]);
		$this->forge->addKey('id', true);
		$this->forge->createTable('kontak');
	}

	public function down()
	{
		$this->forge->dropTable('kontak');
	}
}
