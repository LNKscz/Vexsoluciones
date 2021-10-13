<?php
/**
 * Copyright © 2015 Vexsoluciones. All rights reserved.
 */

namespace Vexsoluciones\Linkser\Model;

class Linkser extends \Magento\Framework\Model\AbstractModel
{
    /**
     * Constructor.
     *
     * @return void
     */
    protected function _construct()
    {
        parent::_construct();
        $this->_init('Vexsoluciones\Linkser\Model\ResourceModel\Linkser');
    }
}