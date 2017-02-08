<?php 

namespace App\Services;

use App\Repositories\Contracts\WorkRepository;

class WorkService{
	protected $workRepo;
	public function __construct(WorkRepository $workRepo){
		$this->workRepo = $workRepo;
	}

	public function store(){
		$results = [
			'code' => '2001',
			'result' => false,
			'message' => '保存失败',
		];
		$data = request()->all();
		if($this->workRepo->create($data)){
			$results = array_merge($results, [
				'message' => '保存成功',
				'result' => true,
				'code' => '2000',
			]);
		}

		return $results;
	}

	public function lists(){
		$workList = $this->workRepo->all()->map(function($item, $key){
			return [
				'name' => $item->name,
			];
		});
		
		return [
			'result' => true,
			'data' => $workList,
		];
	}
}