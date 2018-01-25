<?php
class Gide_Task_Helper_Data extends Mage_Catalog_Helper_Data
{
    /**
     * Getting reviews
     */
     public function getReviews( $id ){
         $reviews = Mage::getModel('review/review')
             ->getResourceCollection()
             ->addStoreFilter(Mage::app()->getStore()->getId())
             ->addEntityFilter('product', $id)
             ->addStatusFilter(Mage_Review_Model_Review::STATUS_APPROVED)
             ->setDateOrder()
             ->addRateVotes();

         $avg = 0;
         $ratings = array();
         $totalReviews = count($reviews);
         if ($totalReviews > 0) {
             foreach ($reviews->getItems() as $review) {
                 foreach( $review->getRatingVotes() as $vote ) {
                     $ratings[] = $vote->getPercent();
                 }
             }
             if(count($ratings) > 0) {
                 $avg = array_sum($ratings)/count($ratings);
             }
         }

         return array( 'totalCount'=> $totalReviews ,'avg'=> $avg );
     }
    /**
     * Getting Media Gallery
     */
     public function getImages( $id ){
         $_images = Mage::getModel('catalog/product')->load( $id )->getMediaGalleryImages();
         $result = "";
         foreach( $_images as $image ){
             $result .= $image->getUrl().',';
         }
         return rtrim( $result , ',' );
     }
    /**
     * Getting Price
     */
     public function getSpecialPrice( $_product ){
         $result = array();
         if( $_product->getTypeId() == Mage_Catalog_Model_Product_Type::TYPE_BUNDLE ){
             $result['price'] = $_product->getFinalPrice();
             $result['validDate'] = '';
         }else{
             $result['price'] = $_product->getSpecialPrice();
             $result['validDate'] = date('Y-m-d',strtotime($_product->getSpecialToDate()));
         }
         return $result;
     }
}