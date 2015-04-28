<?php namespace App\Modules\TestTheme\Http\Controllers;

use App\Http\Controllers\Controller;
use \ContentRepository;
use \AclRepository;
use \GalleryRepository;
use \CommentRepository;

use Illuminate\Http\Request;

class SiteController extends Controller {

	public function __construct()
	{
		if(\Auth::check())
		{
			\Auth::user()->groups = AclRepository::getUser(\Auth::user()->id)->groups;
		}
	}

	public function getIndex()
	{
		return redirect('/test-theme/contents');
	}

	public function getContent($id)
	{
		$content               = ContentRepository::getContentWithData($id, \Lang::locale());
		$content->contentImage = GalleryRepository::getImageThumbnail($content->content_image, '900*300');
		$commentTemplate       = CommentRepository::getCommentTemplate('content', $id);
		$permissions           = array();

		if(\Auth::check())
		{
			$permissions = AclRepository::getUserItemPermissions('content', $id, \Auth::user());
		}

		//if( ! in_array('show', $permissions)) abort(403, 'Unauthorized');

		return view('test-theme::content' ,compact('content', 'permissions', 'commentTemplate'));
	}

	public function getContents()
	{
		$contents = ContentRepository::getAllContentsWithData(\Lang::locale());

		$contents->each(function($content){
			$content->contentImage = GalleryRepository::getImageThumbnail($content->content_image, '900*300');
		});

		$contents->setPath(url('test-theme/contents'));

		$title    = $contents->isEmpty() ? trans('test-theme::content.notfound') : trans('test-theme::content.Contents');

		return view('test-theme::contents' ,compact('contents', 'title'));
	}

	public function getCategory($id)
	{
		$contents = ContentRepository::getSectionContentsWithData($id, \Lang::locale());

		$contents->each(function($content){
			$content->contentImage = GalleryRepository::getImageThumbnail($content->content_image, '900*300');
		});

		$contents->setPath(url("test-theme/category/$id"));

		$title    = $contents->isEmpty() ? trans('test-theme::content.notfound') : 
		$contents->first()->contentSections->first()->section_name . ' ' . trans('test-theme::content.Contents');

		return view('test-theme::contents' ,compact('contents', 'title'));
	}

	public function getTag($id)
	{
		$contents = ContentRepository::getTagContentsWithData($id, \Lang::locale());

		$contents->each(function($content){
			$content->contentImage = GalleryRepository::getImageThumbnail($content->content_image, '900*300');
		});

		$contents->setPath(url("test-theme/category/$id"));

		$title    = $contents->isEmpty() ? trans('test-theme::content.notfound') : 
		$contents->first()->contentSections->first()->section_name . ' ' . trans('test-theme::content.Contents');

		return view('test-theme::contents' ,compact('contents', 'title'));
	}

	public function getSearch(Request $request, $query = false)
	{
		$query    = $query ?: $request->get('query');

		$contents = ContentRepository::search($query);
		
		$contents->each(function($content){
			$content->contentImage = GalleryRepository::getImageThumbnail($content->content_image, '900*300');
		});

		$contents->setPath(url("/test-theme/search/$query"));

		$title    = $contents->isEmpty() ? trans('test-theme::content.notfound') : 
		trans('test-theme::content.search') . ' : ' . $query;

		return view('test-theme::contents' ,compact('contents', 'title'));
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