<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Service;

class ServiceController extends Controller
{
     public function execute() {
		
		if(view()->exists('admin.services')) {
			
			/*$services = Service::all();
			//dump ($services);
			foreach ($services as $service) {
				echo $service->icon;
			}*/
			$services = DB::table('services')->paginate(2);
			//dump($services->url(2));

			//$services->withPath('custom/url');
			//dump ($services);
			/*echo '<br>';
			foreach ($services as $service) {
				echo $service->icon;
			}*/
			$data = [
					'title'=>'Сервисы',
					'services'=>$services
					];
			
			return view('admin.services',$data);
		}
		
	}
}
