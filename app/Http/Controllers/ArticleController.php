<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
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
    	$cmsContent = file_get_contents(config('humbole.CMS_API_URL') . '/?json=get_post&post_slug=' . $slug);
		$cmsContentDecoded = json_decode($cmsContent);
		        
        
        return view('article', [
        'title'=>$cmsContentDecoded->post->title . ' | Humbole',
        'og_title'=>$cmsContentDecoded->post->title,
        'og_url'=>'http://www.humbole.com/article/' . $cmsContentDecoded->post->slug,
		'articleDetails'=>$cmsContentDecoded
		
		]);
    }

}
