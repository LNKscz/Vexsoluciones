<?php
/**
 * Copyright © 2015 Vexsoluciones. All rights reserved.
 */

namespace Vexsoluciones\Linkser\Model\ResourceModel\Linkser;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected $_idFieldName = 'id';

    /**
     * Define resource model.
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Vexsoluciones\Linkser\Model\Linkser', 'Vexsoluciones\Linkser\Model\ResourceModel\Linkser');
    }
}