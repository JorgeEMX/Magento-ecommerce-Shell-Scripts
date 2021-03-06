<?php

require_once 'abstract.php';
class Mage_Shell_Lowes_ProductToNewWebsite extends Mage_Shell_Abstract
{
    public function run()
    {
        $websiteIds = array(1,3,4);
        $productIds= Mage::getResourceModel('catalog/product_collection')->getAllIds();
        Mage::getModel('catalog/product_website')->addProducts($websiteIds, $productIds);
    }
}

$shell = new Mage_Shell_Lowes_ProductToNewWebsite();

try{
    // fetch new data
    $shell->run();
} catch (Exception $e){
    echo $e->__toString();
}

echo "Done!\n Now run: `php -f indexer.php reindexall`";
