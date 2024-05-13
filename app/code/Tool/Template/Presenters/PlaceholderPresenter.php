<?php

namespace Tool\Template\Presenters;

use Core\Base\Presenters\Presenter;
use Tool\Template\Services\PlaceholderService;
use Tool\Template\Transformers\PlaceholderTransformer;

class PlaceholderPresenter extends Presenter
{
    public function __construct(
        private readonly PlaceholderService     $placeholderService,
        private readonly PlaceholderTransformer $placeholderTransformer,
    ) {

    }

}
