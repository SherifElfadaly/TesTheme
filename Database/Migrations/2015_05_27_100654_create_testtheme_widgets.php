<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestthemeWidgets extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		\CMS::widgetTypes()->insert([
				[
				'widget_type_name' => 'About',
				'template'         => 'about',
				'theme'            => 'testtheme',
				],
				[
				'widget_type_name' => 'Projects',
				'template'         => 'projects',
				'theme'            => 'testtheme',
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
		\CMS::widgetTypes()->delete('testtheme', 'theme');
	}
}