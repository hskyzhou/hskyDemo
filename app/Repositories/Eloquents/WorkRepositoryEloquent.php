<?php

namespace App\Repositories\Eloquents;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\Contracts\workRepository;
use App\Models\Work;
use App\Repositories\Validators\WorkValidator;

/**
 * Class WorkRepositoryEloquent
 * @package namespace App\Repositories\Eloquents;
 */
class WorkRepositoryEloquent extends BaseRepository implements WorkRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Work::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
