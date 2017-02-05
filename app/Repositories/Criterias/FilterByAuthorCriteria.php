<?php

namespace App\Repositories\Criterias;

use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Class FilterByAuthorCriteria
 * @package namespace App\Repositories\Criterias;
 */
class FilterByAuthorCriteria implements CriteriaInterface
{
    protected $author;
    public function __construct($author){
        $this->author = $author;
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
        return $model->where('author', $this->author);
    }
}
