<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Wordpress;
use View;
use Config;
use Request;
use Session;

class IndexController extends Controller {
	
	private function setGender($gender)
	{
    	if($gender)
    	{ 
    		setcookie("gender", $gender, time() + (86400 * 365), "/");
    		Session::put("gender", $gender);
    	}
    	elseif(@$_COOKIE['gender'])
    	{
    		Session::put("gender", $_COOKIE['gender']);
    	}
    	else
    	{
    		Session::put("gender", 'male');
    	}
		
	}
	

    public function index(Request $request, $gender=null, $people=null, $topic=null )
    {
    	//print "Gender=$gender, People=$people, Topic=$topic";
    	$this->setGender($gender);
    	return view('home', ['showGenderButton'=>true]);
    }

}
