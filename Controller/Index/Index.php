<?php
namespace SessionCrt\InfoSess\Controller\Index;

class Index extends \Magento\Framework\App\Action\Action
{
	protected $_pageFactory;
	public function __construct(
		\Magento\Framework\App\Action\Context $context,
		\Magento\Framework\View\Result\PageFactory $pageFactory,
		\Magento\Framework\Session\SessionManagerInterface $session)
	{
		$this->_pageFactory = $pageFactory;
		$this->session = $session;
		return parent::__construct($context);
	}

	public function execute()
	{
		$data = 50;
		$setSess = $this->setValue($data);

		$session_val = $this->getValue();
		print_r($session_val); 
		return $this->_pageFactory->create();
	}

	public function setValue($value){
        $this->session->start();
        $this->session->setMessage($value);
     }

    public function getValue(){
        $this->session->start();
        return $this->session->getMessage();
    }
}

