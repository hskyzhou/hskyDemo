<?php

namespace App\Repositories\Transformers;

use League\Fractal\TransformerAbstract;
use App\Models\Article;

/**
 * Class ArticleTransformer
 * @package namespace App\Repositories\Transformers;
 */
class ArticleTransformer extends TransformerAbstract
{

    /**
     * Transform the \Article entity
     * @param \Article $model
     *
     * @return array
     */
    public function transform(Article $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */
            'full_name' => $model->title . $model->short_title,

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];

        // $model->full_name = $model->title . $model->short_title;

        // return $model->toArray();
    }
}
