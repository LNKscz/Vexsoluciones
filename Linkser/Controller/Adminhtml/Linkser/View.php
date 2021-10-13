<?php
/**
 * Blog.
 *
 * @author Slava Yurthev
 */

namespace Vexcarrier\Servientrega\Controller\Adminhtml\Servientrega;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;

class View extends Action
{
    protected $_resultPageFactory;
    protected $_resultPage;
    protected $_commentFactory;

    public function __construct(Context $context, PageFactory $resultPageFactory, \Vexcarrier\Servientrega\Model\BrandFactory $brandFactory)
    {
        parent::__construct($context);
        $this->_resultPageFactory = $resultPageFactory;
        $this->_commentFactory = $brandFactory;
    }

    public function execute()
    {
        $this->_setPageData();

        return $this->getResultPage();
    }

    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Vexcarrier_Servientrega::view');
    }

    public function getResultPage()
    {
        if (is_null($this->_resultPage)) {
            $this->_resultPage = $this->_resultPageFactory->create();
        }

        return $this->_resultPage;
    }

    protected function _setPageData()
    {
        $resultPage = $this->getResultPage();
        $id = $this->getRequest()->getParam('id');
        $rowData = $this->_commentFactory->create()->getCollection();
        $re = false;

        if ($id) {
            $rowData->addFieldToFilter('id', ['eq' => $id]);

            if (!count($rowData)) {
                $this->messageManager->addError(__('This information does not exist.'));
                $this->_redirect('Vexcarrier_Servientrega/servientega/index');

                return;
            } else {
                $re = true;
            }
        }

        //$this->_coreRegistry->register('staff_grid', $rowData);
        $resultPage->getConfig()->getTitle()->prepend(__('Shipping data to servientega'));

        $resultPage->getConfig()->getTitle()
            ->prepend(($re) ? __('See data') : __('See data'));

        return $resultPage;
    }
}