<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestthemeMenus extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		\CMS::menus()->insert([
				[
				'title'       => 'Main Menu',
				'menu_slug'   => 'main_menu',
				'description' => 'Main Menu',
				'template'    => 'main_menu',
				'theme'       => 'testtheme',
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
		\CMS::menus()->delete('testtheme', 'theme');
	}
}