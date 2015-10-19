<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Wordpress;
use View;
use Config;
use Request;
use Session;

class IndexController extends Controller {

    public function index(Request $request, $gender=null, $people=null, $topic=null )
    {
    	//print "Gender=$gender, People=$people, Topic=$topic";
    	$title = $people ? ucwords(str_replace("-", " ", $people)) . " | Humbole" : "Humbole | Your Daily Dose" ;
    	$this->setGender($gender);
    	return view('home', ['showGenderButton'=>true, 'title'=>$title]);
    }

}
