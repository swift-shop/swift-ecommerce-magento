<?php

namespace Core\Template\Presenters;

use Core\Base\Presenters\Presenter;
use Core\Template\Services\PlaceholderService;
use Core\Template\Transformers\PlaceholderTransformer;

class PlaceholderPresenter extends Presenter
{
    public function __construct(
        private readonly PlaceholderService     $placeholderService,
        private readonly PlaceholderTransformer $placeholderTransformer,
    ) {

    }

}
