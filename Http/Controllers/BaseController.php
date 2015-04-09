<?php namespace App\Modules\TestTheme\Http\Controllers;

use App\Http\Controllers\Controller;
use \ContentRepository;
use \LanguageRepository;
use \AclRepository;

class BaseController extends Controller {

	public function __construct()
	{
		$categories = ContentRepository::getSectionTree(url('test-theme/category/'));
		$languages  = LanguageRepository::getAllLanguages();

		if(\Auth::check())
		{
			\Auth::user()->groups = AclRepository::getUser(\Auth::user()->id)->groups;
		}

		//Set the site language
		\Lang::setlocale(\Session::get('language', \Lang::locale()));

		view()->share('categories', $categories);
		view()->share('languages', $languages);
	}
}