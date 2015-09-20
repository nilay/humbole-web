<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Response;

class ApiController extends Controller
{
    protected function dummy()
    {
		$data = [
			[ "name" =>'Roshila', "age" => '16', "thumb"=>"/images/cute.jpg"],
			[ "name" =>'Marina',"age" =>'22', "thumb"=>"/images/jessica.jpg"],
			[ "name" =>'Marina',"age" =>'22', "thumb"=>"/images/jessica.jpg"],
			[ "name" =>'Marina',"age" =>'22', "thumb"=>"/images/jessica.jpg"],
			[ "name" =>'Marina',"age" =>'22', "thumb"=>"/images/jessica.jpg"],
			[ "name" =>'Marina',"age" =>'22', "thumb"=>"/images/jessica.jpg"],
			[ "name" =>'Marina',"age" =>'22', "thumb"=>"/images/jessica.jpg"],
			[ "name" =>'Marina',"age" =>'22', "thumb"=>"/images/jessica.jpg"],
			[ "name" =>'Marina',"age" =>'22', "thumb"=>"/images/jessica.jpg"],
			[ "name" =>'Marina',"age" =>'22', "thumb"=>"/images/jessica.jpg"],
			[ "name" =>'Marina',"age" =>'22', "thumb"=>"/images/jessica.jpg"],
			[ "name" =>'Marina',"age" =>'22', "thumb"=>"/images/jessica.jpg"],
			[ "name" =>'Marina',"age" =>'22', "thumb"=>"/images/jessica.jpg"],
			[ "name" =>'Marina',"age" =>'22', "thumb"=>"/images/jessica.jpg"],
			[ "name" =>'Marina',"age" =>'22', "thumb"=>"/images/jessica.jpg"],
			[ "name" =>'Marina',"age" =>'22', "thumb"=>"/images/jessica.jpg"],
			[ "name" =>'Marina',"age" =>'22', "thumb"=>"/images/jessica.jpg"],
			[ "name" =>'Marina',"age" =>'22', "thumb"=>"/images/jessica.jpg"],
			[ "name" =>'Maria',"age" =>'23', "thumb"=>"/images/jessica.jpg"]
		];
		
        
        return Response::json($data, 200);
		
    }
}


