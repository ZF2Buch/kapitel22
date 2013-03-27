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
namespace Shop\Hydrator;

use Zend\Serializer\Serializer;
use Zend\Stdlib\Hydrator\HydratorInterface;

/**
 * Order hydrator
 * 
 * @package    Shop
 */
class OrderHydrator implements HydratorInterface
{
    /**
     * Extract values from an object
     *
     * @param  OrderEntity $object
     * @return array
     */
    public function extract($object)
    {
        $data = $object->getArrayCopy();
        $data['positions'] = Serializer::serialize($data['positions']);
        
        return $data;
    }

    /**
     * Hydrate $object with the provided $data.
     *
     * @param  array $data
     * @param  OrderEntity $object
     * @return object
     */
    public function hydrate(array $data, $object)
    {
        $data['positions'] = Serializer::unserialize($data['positions']);
        
        $object->exchangeArray($data);
                   
        return $object;
    }
}
