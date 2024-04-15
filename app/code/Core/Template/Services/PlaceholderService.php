<?php
/**
 * User: BenHuang
 * Email: benhuang1024@gmail.com
 * Date: 2022/4/2
 * Time: 15:00
 */

declare(strict_types=1);

namespace Core\Template\Services;

use Core\Base\Services\Service;
use Core\Template\Formatters\PlaceholderFormatter;

class PlaceholderService extends Service
{
    public function __construct(
        PlaceholderFormatter $placeholderFormatter,
    ) {
    }
}
