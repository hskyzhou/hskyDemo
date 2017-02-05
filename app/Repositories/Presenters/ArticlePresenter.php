<?php

namespace App\Repositories\Presenters;

use App\Repositories\Transformers\ArticleTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class ArticlePresenter
 *
 * @package namespace App\Repositories\Presenters;
 */
class ArticlePresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new ArticleTransformer();
    }
}
