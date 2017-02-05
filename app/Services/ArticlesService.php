<?php 
	
 namespace App\Services;

use Prettus\Validator\Contracts\ValidatorInterface;
use App\Repositories\Contracts\ArticleRepository;
use App\Repositories\Criterias\FilterByCreatorIdCriteria;
use App\Repositories\Criterias\FilterByAuthorCriteria;

 class ArticlesService{

 	protected $validator;

 	protected $repository;

 	public function __construct(ArticleRepository $repository){
 		$this->repository = $repository;
 	}

 	public function index(){
 		// $article = $this->repository->find(1);
 		$articles = $this->repository->pushCriteria(new FilterByAuthorCriteria(2))->all();

 		dd($articles);

 		return [
 			'article' => $article,
 		];
 	}

 	public function store(){
 		$results = [
 			'code' => '',
 			'message' => '保存失败',
 			'result' => false,
 		];
 		try {

            /*保存*/
            $article = $this->repository->create(request()->all());

            $results = array_merge($results, [
            	'result' => true,
            	'message' => '保存成功',
            ]);

        } catch (ValidatorException $e) {
        }

        return $results;
 	}
 }