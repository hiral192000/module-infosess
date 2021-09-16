<?php

namespace SessionCrt\InfoSess\Model\Total;

class Customfee extends \Magento\Quote\Model\Quote\Address\Total\AbstractTotal
{
   /**
     * Collect grand total address amount
     *
     * @param \Magento\Quote\Model\Quote $quote
     * @param \Magento\Quote\Api\Data\ShippingAssignmentInterface $shippingAssignment
     * @param \Magento\Quote\Model\Quote\Address\Total $total
     * @return $this
     */
    protected $quoteValidator = null; 

    public function __construct(\Magento\Quote\Model\QuoteValidator $quoteValidator,\Magento\Framework\Session\SessionManagerInterface $session)
    {
        $this->quoteValidator = $quoteValidator;
        $this->session = $session;
    }
  public function collect(
        \Magento\Quote\Model\Quote $quote,
        \Magento\Quote\Api\Data\ShippingAssignmentInterface $shippingAssignment,
        \Magento\Quote\Model\Quote\Address\Total $total
    ) {
        parent::collect($quote, $shippingAssignment, $total);

       // $customfee = 5; //enter amount which you want to set
        $session_val = $this->getValue();

        $total->setGrandTotal($total->getGrandTotal() + $session_val);
        //$total->setBaseGrandTotal($total->getBaseGrandTotal() + $balance);


        return $this;
    } 

    public function getValue(){
        $this->session->start();
        return $this->session->getMessage();
    }

}