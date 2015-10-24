<?php
namespace App\Http\Controllers;

use App\External\Cms\Content;
use App\Http\Controllers\Controller;
use App\Lib\Sitemap;
use Response;

class SitemapController extends Controller
{
	public function generate()
	{ 	
        $cmsContent = new Content();
        try
        {
        	$data = $cmsContent->getCmsContents();
        	//return Response::json($data, 200);
        }
        catch(Exception $e)
        {
        	// 
        }
        
        
		$sitemap = new Sitemap('http://humbole.com');  
		$sitemap->setPath(public_path() .'/xmls/'); 
		$sitemap->addItem('/', '1.0', 'daily', 'Today');
		$sitemap->addItem('/about-us', '0.6', 'monthly', 'Jun 25');
		$sitemap->addItem('/disclaimer', '0.6', 'yearly', '14-12-2009');
		
		foreach ($data->posts as $post) {
		    $sitemap->addItem('/article/' . $post->post_name, '0.9', 'weekly', $post->post_modified_gmt);
		}
		
		$sitemap->createSitemapIndex('http://humbole.com/xmls/', 'Today');
		
		$header['Content-Type'] = 'application/xml';
		return Response::make(file_get_contents(public_path() .'/xmls/sitemap-index.xml'), 200, $header);
		
		//return Response("Sitemap generated successfully under /public/xmls/sitemap.xml", 200);
    }
}
