<?php
class Gide_Task_Model_Observer
{
    public function beforeLoadLayout($observer){
        if(Mage::app()->getRequest()->getControllerName()=='product' && Mage::app()->getRequest()->getRouteName() == 'catalog'){
            $layout=$observer->getEvent()->getLayout();
            $layout->getUpdate()->addUpdate('<reference name="content"> 
                <block type="catalog/product_view" template="custom_template/product_data_script.phtml">
                </block>
            </reference>');
            $layout->generateXml();
        }
    }
}
