<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Carrousel extends Migration
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
			'gambar' => [
				'type'           => 'VARCHAR',
				'constraint'     => 255,
			],
			'judul' => [
				'type'           => 'VARCHAR',
				'constraint'     => 255,
			]
		]);
		$this->forge->addKey('id', true);
		$this->forge->createTable('carrousel');
	}

	public function down()
	{
		$this->forge->dropTable('carrousel');
	}
}
