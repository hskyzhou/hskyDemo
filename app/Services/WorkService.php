<?php 

namespace App\Services;

use App\Repositories\Contracts\WorkRepository;

use Carbon\Carbon;

use Illuminate\Support\Facades\Mail;

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

	public function sendWeekWork(){
		$results = [
			'result' => false,
			'message' => '发送失败',
		];
		$mail = new Mail();

		$sender = request('sender');
		$cc = request('cc');

		/*处理发送周报内容*/
		$list = $this->getDateList()->groupBy('belong_project');

		if(empty($sender)){
			$results = array_merge($results, [
				'message' => '发送者不能为空'
			]);
		}else{
			$mail = Mail::to($sender);
			if(!empty($cc)){
				$mail = $mail->bcc($cc);
			}

			try {
				$c = $mail->send(new \App\Mail\WeekWork($list));

				$results = array_merge($results, [
					'result' => true,
					'message' => '发送成功',
				]);
			} catch (Exception $e) {
				
			}
		}

		return $results;
	}

	protected function getDateList(){
		$weekStart =  (new Carbon())->startOfWeek()->toDateTimeString();
		$weekEnd =  (new Carbon())->endOfWeek()->toDateTimeString();

		$this->workRepo->scopeQuery(function($query) use ($weekStart, $weekEnd){
			return $query->where('created_at', '>=', $weekStart)
				->where('created_at', '<', $weekEnd)
				->orderBy('created_at', 'asc');
		});

		return $this->workRepo->all();
	}
}