<?php

namespace App\Repositories\Criterias;

use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Class FilterByCreatorIdCriteria
 * @package namespace App\Repositories\Criterias;
 */
class FilterByCreatorIdCriteria implements CriteriaInterface
{
    protected $creatorId;
    public function __construct($creatorId){
        $this->creatorId = $creatorId;

    }
    /**
     * Apply criteria in query repository
     *
     * @param                     $model
     * @param RepositoryInterface $repository
     *
     * @return mixed
     */
    public function apply($model, RepositoryInterface $repository)
    {
        return $model->where('creator_id', $this->creatorId);
    }
}
