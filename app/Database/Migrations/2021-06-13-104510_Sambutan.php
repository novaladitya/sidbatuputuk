<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Sambutan extends Migration
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
			'foto' => [
				'type'           => 'VARCHAR',
				'constraint'     => 255,
			],
			'nama' => [
				'type'           => 'VARCHAR',
				'constraint'     => 255,
			],
			'jabatan' => [
				'type'           => 'VARCHAR',
				'constraint'     => 255,
			],
			'pesan' => [
				'type'           => 'VARCHAR',
				'constraint'     => 255,
			]
		]);
		$this->forge->addKey('id', true);
		$this->forge->createTable('sambutan');
	}

	public function down()
	{
		$this->forge->dropTable('sambutan');
	}
}
