<?php namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use App\Http\Controllers\Controller;
use Config;
use View;
class ConfigController extends Controller {

    public function makeConfig()
    {
        $js_config = Config::get('humbole');

        $view = View::make('config')
            ->with('js_config', json_encode($js_config))
            ->render();

        return response($view, 200, array('content-type' => 'application/javascript'));
    }

}
