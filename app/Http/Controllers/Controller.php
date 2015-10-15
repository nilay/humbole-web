<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Session;

abstract class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    
    	
	protected function setGender($gender=null)
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
	
    
}
