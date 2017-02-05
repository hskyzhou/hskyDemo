<?php

namespace App\Repositories\Presenters;

use App\Repositories\Transformers\TagTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class TagPresenter
 *
 * @package namespace App\Repositories\Presenters;
 */
class TagPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new TagTransformer();
    }
}
