<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Services\WorkService as Service;

class WorkController extends Controller
{
	protected $service;
	public function __construct(Service $service){
		$this->service = $service;
	}

    public function store(){
    	$results = $this->service->store();
    	return response()->json($results);
    }

    public function lists(){
    	$results = $this->service->lists();
    	return response()->json($results);
    }

    /*本周工作列表*/
    public function recentLists(){
        $results = $this->service->recentLists();
        return response()->json($results);
    }
}
