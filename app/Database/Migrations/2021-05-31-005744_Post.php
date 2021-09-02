<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Post extends Migration
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
			'sampul' => [
				'type'           => 'VARCHAR',
				'constraint'     => 255,
			],
			'kategori' => [
				'type'           => 'VARCHAR',
				'constraint'     => 255,
			],
			'judul' => [
				'type'           => 'VARCHAR',
				'constraint'     => 255,
			],
			'slug' => [
				'type'           => 'VARCHAR',
				'constraint'     => 255,
			],
			'isi' => [
				'type'           => 'VARCHAR',
				'constraint'     => 5000,
			],
			'updated_at' => [
				'type'			=> 'VARCHAR',
				'constraint'    => '255',
			]
		]);
		$this->forge->addKey('id', true);
		$this->forge->createTable('post');
	}

	public function down()
	{
		$this->forge->dropTable('post');
	}
}
