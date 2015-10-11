<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Wordpress;
use View;
use Config;
use Request;

class ArticleController extends Controller {
	

    public function index(Request $request, $slug)
    {
    	
    	// TODO: apply memcache here
    	// fetch article using REST API
    	$cmsContent = file_get_contents(config('humbole.CMS_API_URL') . '/?json=get_post&post_slug=' . $slug);
		$cmsContentDecoded = json_decode($cmsContent);
		//print_r($cmsContentDecoded->post); die;
		        
        return view('article', ['articleDetails'=>$cmsContentDecoded]);
    }

}
