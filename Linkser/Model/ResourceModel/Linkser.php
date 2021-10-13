<?php
/**
 * Copyright © 2015 Vexsoluciones. All rights reserved.
 */

namespace Vexsoluciones\Linkser\Model\ResourceModel;

class Linkser extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    /**
     * Model Initialization.
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('vex_orders_linkser', 'id');
    }
}