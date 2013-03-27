<?php
/**
 * ZF2 Buch Kapitel 22
 * 
 * Das Buch "Zend Framework 2 - Von den Grundlagen bis zur fertigen Anwendung"
 * von Ralf Eggert ist im Addison-Wesley Verlag erschienen. 
 * ISBN 978-3-8273-2994-3
 * 
 * @package    Shop
 * @author     Ralf Eggert <r.eggert@travello.de>
 * @copyright  Alle Listings sind urheberrechtlich geschützt!
 * @link       http://www.zendframeworkbuch.de/ und http://www.awl.de/2994
 */

/**
 * namespace definition and usage
 */
namespace Shop\Table;

use Shop\Hydrator\OrderHydrator;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Order table factory
 * 
 * Generates the Order table object
 * 
 * @package    Shop
 */
class OrderTableFactory implements FactoryInterface
{
    /**
     * Create Service Factory
     * 
     * @param ServiceLocatorInterface $serviceLocator
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $adapter  = $serviceLocator->get('Zend\Db\Adapter\Adapter');
        $entity   = $serviceLocator->get('Shop\Entity\Order');
        $hydrator = new OrderHydrator();
        $table    = new OrderTable($adapter, $entity, $hydrator);
        return $table;
    }
}
