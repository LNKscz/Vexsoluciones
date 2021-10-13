<?php

namespace Vexsoluciones\Linkser\Model;

use Magento\Framework\Data\OptionSourceInterface;

class LinkserType implements OptionSourceInterface
{
    /**
     * Get options.
     *
     * @return array
     */
    public function toOptionArray()
    {
        $options = [
                        [
                            'label' => __('Cybersource'),
                            'value' => 1,
                        ],
                        [
                            'label' => __('Linkser'),
                            'value' => 2,
                        ],
                    ];

        return $options;
    }
}