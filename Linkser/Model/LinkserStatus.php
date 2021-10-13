<?php

namespace Vexsoluciones\Linkser\Model;

use Magento\Framework\Data\OptionSourceInterface;

class LinkserStatus implements OptionSourceInterface
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
                            'label' => __('Pendiente'),
                            'value' => 1,
                        ],
                        [
                            'label' => __('Pagado'),
                            'value' => 2,
                        ],
                        [
                            'label' => __('Reverso'),
                            'value' => 3,
                        ],
                        [
                            'label' => __('Error'),
                            'value' => 0,
                        ],
                    ];

        return $options;
    }
}