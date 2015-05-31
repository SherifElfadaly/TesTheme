<?php namespace App\Modules\Testtheme\Http\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class SiteController extends Controller {

	
	public function getIndex()
	{
		return redirect('contents');
	}

	public function getContent($id)
	{
		$content               = \CMS::contentItems()->getContent($id, \Lang::locale());
		$content->contentImage = \cms::galleries()->getImageThumbnail($content->content_image, '900*300');
		$commentTemplate       = \cms::comments()->getCommentTemplate('content', $id, 1);

		return view('testtheme::content' ,compact('content', 'permissions', 'commentTemplate'));
	}

	public function getContents()
	{
		$contents = \CMS::contentItems()->getAllContents('Articles', \Lang::locale());

		$contents->each(function($content){
			$content->contentImage = \cms::galleries()->getImageThumbnail($content->content_image, '900*300');
		});

		$contents->setPath(url('contents'));

		$title    = $contents->isEmpty() ? trans('testtheme::content.notfound') : trans('testtheme::content.Contents');

		return view('testtheme::contents' ,compact('contents', 'title'));
	}

	public function getCategory($id)
	{
		$contents = \CMS::sections()->getSectionContents($id, \Lang::locale());

		$contents->each(function($content){
			$content->contentImage = \cms::galleries()->getImageThumbnail($content->content_image, '900*300');
		});

		$contents->setPath(url("category/$id"));

		$title    = $contents->isEmpty() ? trans('testtheme::content.notfound') : 
		$contents[0]->sections->first()->section_name . ' ' . trans('testtheme::content.Contents');

		return view('testtheme::contents' ,compact('contents', 'title'));
	}

	public function getTag($id)
	{
		$contents = \CMS::tags()->getTagContents($id, \Lang::locale());

		$contents->each(function($content){
			$content->contentImage = \cms::galleries()->getImageThumbnail($content->content_image, '900*300');
		});

		$contents->setPath(url("category/$id"));

		$title    = $contents->isEmpty() ? trans('testtheme::content.notfound') : 
		$contents[0]->sections->first()->section_name . ' ' . trans('testtheme::content.Contents');

		return view('testtheme::contents' ,compact('contents', 'title'));
	}

	public function getSearch(Request $request, $query = false)
	{
		$query    = $query ?: $request->get('query');

		$contents = \CMS::contentItems()->search($query, \Lang::locale());
		
		$contents->each(function($content){
			$content->contentImage = \cms::galleries()->getImageThumbnail($content->content_image, '900*300');
		});

		$contents->setPath(url("search/$query"));

		$title    = $contents->isEmpty() ? trans('testtheme::content.notfound') : 
		trans('testtheme::content.search') . ' : ' . $query;

		return view('testtheme::contents' ,compact('contents', 'title'));
	}

	public function getLanguage($key)
	{
		if($key)
		{
			\Session::put('language', $key);
			\Lang::setlocale($key);
		}
		return redirect()->back();
	}
}