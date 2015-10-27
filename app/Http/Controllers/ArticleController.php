<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\External\Cms\Content;
use App\Models\Wordpress;
use View;
use Config;
use Request;

class ArticleController extends Controller {
	

    public function index(Request $request, $slug)
    {
    	
    	$this->setGender();
    	
    	// TODO: apply memcache here
    	// fetch article using REST API
    	$cmsContent = @file_get_contents(config('humbole.CMS_API_URL') . '/?json=get_post&post_slug=' . $slug);
    	if(!$cmsContent)
    	{
    		return view('errors.404');
    	}
		
		$cmsContentDecoded = json_decode($cmsContent);
		$cmsContentView = new Content();
    	$cmsContentView->updateViewCount($cmsContentDecoded->post->id);
		$shareCount = $cmsContentView->getShareCount($cmsContentDecoded->post->id);
		
		$tags = [];
		foreach($cmsContentDecoded->post->tags as $tag) {
			$tags[] = $tag->slug;
		}
		$tags = implode(",", $tags);
        
        return view('article', [
        'title'=>$cmsContentDecoded->post->title . ' | Humbole',
        'og_title'=>$cmsContentDecoded->post->title,
        'og_url'=>'http://www.humbole.com/article/' . $cmsContentDecoded->post->slug,
		'articleDetails'=>$cmsContentDecoded,
		'tags'=>$tags,
		'share_count'=>$shareCount
		]);
    }
	
	public function shareCount($post_id){
		$cmsContent = new Content();
    	$cmsContent->updateShareCount($post_id);
	}
	
	

}
