<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestthemeSliders extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		\CMS::sliders()->insert([
				[
				'title'       => 'News',
				'description' => 'News Slider',
				'slider_slug' => 'news',
				'is_active'   => 1,
				'template'    => 'news',
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
		\CMS::sliders()->delete('testtheme', 'theme');
	}
}