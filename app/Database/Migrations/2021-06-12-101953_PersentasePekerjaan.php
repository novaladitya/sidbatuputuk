<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class PersentasePekerjaan extends Migration
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
			'pekerjaan' => [
				'type'           => 'VARCHAR',
				'constraint'     => 255,
			],
			'persentase' => [
				'type'           => 'VARCHAR',
				'constraint'     => 255,
			]
		]);
		$this->forge->addKey('id', true);
		$this->forge->createTable('persentase_pekerjaan');
	}

	public function down()
	{
		$this->forge->dropTable('persentase_pekerjaan');
	}
}
