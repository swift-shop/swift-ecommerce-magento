<?php
/**
 * User: BenHuang
 * Email: benhuang1024@gmail.com
 * Date: 2022/4/2
 * Time: 15:00
 */

declare(strict_types=1);

namespace Swift\Catalog\Repositories;

use Core\Base\Repositories\Repository;
use Magento\Catalog\Model\ProductFactory;

class ProductRepository extends Repository
{
    public function __construct(
        private ProductFactory $productFactory
    )
    {

    }

    public function getData()
    {
        
    }
    

}
