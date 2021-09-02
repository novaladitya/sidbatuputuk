<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ProdukDesa extends Migration
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
			'nama' => [
				'type'           => 'VARCHAR',
				'constraint'     => 255,
			],
			'penjual' => [
				'type'           => 'VARCHAR',
				'constraint'     => 255,
			],
			'deskripsi' => [
				'type'           => 'VARCHAR',
				'constraint'     => 2000,
			],
			'ketegori' => [
				'type'           => 'VARCHAR',
				'constraint'     => 255,
			],
			'notelepon' => [
				'type'           => 'VARCHAR',
				'constraint'     => 255,
			]
		]);
		$this->forge->addKey('id', true);
		$this->forge->createTable('produkdesa');
	}

	public function down()
	{
		$this->forge->dropTable('produkdesa');
	}
}
