<?php 

namespace App\Services;

use App\Repositories\Contracts\WorkRepository;

use Carbon\Carbon;

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
		$dayStart =  (new Carbon())->startOfDay()->toDateTimeString();
		$dayEnd =  (new Carbon())->endOfDay()->toDateTimeString();

		$this->workRepo->scopeQuery(function($query) use ($dayStart, $dayEnd){
			return $query->where('created_at', '>=', $dayStart)
				->where('created_at', '<', $dayEnd)
				->orderBy('created_at', 'asc');
		});
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

	public function recentLists(){
		$weekStart =  (new Carbon())->startOfWeek()->toDateTimeString();
		$weekEnd =  (new Carbon())->endOfWeek()->toDateTimeString();

		$this->workRepo->scopeQuery(function($query) use ($weekStart, $weekEnd){
			return $query->where('created_at', '>=', $weekStart)
				->where('created_at', '<', $weekEnd)
				->orderBy('created_at', 'asc');
		});
		$workList = $this->workRepo->all()->map(function($item, $key){
			return [
				'name' => $item->name,
				'created_at' => $item->created_at->format('Y-m-d'),
			];
		})->groupBy('created_at');

		return [
			'result' => true,
			'data' => $workList,
		];
	}
}