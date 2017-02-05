<?php

namespace App\Repositories\Eloquents;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\Contracts\ArticleRepository;
use App\Models\Article;
use App\Repositories\Validators\ArticleValidator;
use App\Repositories\Presenters\ArticlePresenter;

/**
 * Class ArticleRepositoryEloquent
 * @package namespace App\Repositories\Eloquents;
 */
class ArticleRepositoryEloquent extends BaseRepository implements ArticleRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Article::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return ArticleValidator::class;
    }

    public function presenter(){
        return ArticlePresenter::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
