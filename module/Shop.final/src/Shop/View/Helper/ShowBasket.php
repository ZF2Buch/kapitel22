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
namespace Shop\View\Helper;

use Shop\Entity\BasketEntityInterface;
use Shop\Service\BasketServiceInterface;
use Zend\View\Helper\AbstractHelper;
use Zend\View\Model\ViewModel;

/**
 * Basket view helper
 * 
 * @package    Shop
 */
class ShowBasket extends AbstractHelper
{
    /**
     * @var BasketServiceInterface
     */
    protected $basketService;

    /**
     * Constructor
     *
     * @param  BasketServiceInterface $basketService
     */
    public function __construct(BasketServiceInterface $basketService)
    {
        $this->setBasketService($basketService);
    }

    /**
     * Sets shop basketService
     *
     * @param  BasketServiceInterface $basketService
     * @return AbstractHelper
     */
    public function setBasketService(BasketServiceInterface $basketService = null)
    {
        $this->basketService = $basketService;
        return $this;
    }
    
    /**
     * Returns BasketService
     *
     * @return BasketServiceInterface
     */
    public function getBasketService()
    {
        return $this->basketService;
    }
    
    /**
     * Outputs the basket
     *
     * @param string $type small or full  
     * @return string 
     */
    public function __invoke($type = 'small', $basket = null)
    {
        // get template
        $template = $type == 'small' 
                  ? 'widget/small-basket' 
                  : 'widget/full-basket';
        
        // get basket
        if (!$basket instanceof BasketEntityInterface) {
            $basket = $this->getBasketService()->getBasket();
            $change = true;
        } else {
            $change = false;
        }
        
        $vm = new ViewModel(array(
            'basket' => $basket,
            'change' => $change,
        ));
        $vm->setTemplate($template);
        
        return $this->getView()->render($vm);
    }
}
