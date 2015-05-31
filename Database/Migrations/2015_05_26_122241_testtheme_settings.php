<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TestthemeSettings extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		\CMS::coreModuleSettings()->insert([
				[
				'key'           => 'English Logo',
				'input_type'    => 'file',
				'module_key'    => 'testtheme',
				],
				[
				'key'           => 'Arabic Logo',
				'input_type'    => 'file',
				'module_key'    => 'testtheme',
				],
				[
				'key'           => 'About',
				'input_type'    => 'text',
				'module_key'    => 'testtheme',
				],
				[
				'key'           => 'Email',
				'input_type'    => 'text',
				'module_key'    => 'testtheme',
				],
			]);
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		\CMS::coreModuleSettings()->delete('testtheme', 'module_key');
	}
}