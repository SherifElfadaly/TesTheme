<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestthemeContentTypes extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		\CMS::contentTypes()->insert([
				[
				'content_type_name' => 'Articles',
				'theme'             => 'testtheme',
				],
				[
				'content_type_name' => 'Projects',
				'theme'             => 'testtheme',
				]
			]);
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		\CMS::contentTypes()->delete('testtheme', 'theme');
	}
}