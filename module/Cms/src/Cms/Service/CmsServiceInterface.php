<?php
/**
 * ZF2 Buch Kapitel 22
 * 
 * Das Buch "Zend Framework 2 - Von den Grundlagen bis zur fertigen Anwendung"
 * von Ralf Eggert ist im Addison-Wesley Verlag erschienen. 
 * ISBN 978-3-8273-2994-3
 * 
 * @package    Cms
 * @author     Ralf Eggert <r.eggert@travello.de>
 * @copyright  Alle Listings sind urheberrechtlich geschützt!
 * @link       http://www.zendframeworkbuch.de/ und http://www.awl.de/2994
 */

/**
 * namespace definition and usage
 */
namespace Cms\Service;

/**
 * Cms Service interface
 * 
 * @package    Cms
 */
interface CmsServiceInterface
{
    /**
     * Load content block
     *
     * @param string $block
     * @return string
     */
    public function loadBlock($block);
    
    /**
     * Get form data
     *
     * @param array $data
     * @return array
     */
    public function getFormData($data);
    
    /**
     * Get form
     *
     * @param string $block
     * @param string $url
     * @return ContentBlockFormInterface
     */
    public function getForm($block, $url);
    
    /**
     * Save content block
     *
     * @param string $block
     * @param string $content
     * @return string
     */
    public function saveBlock($block, $content);
}
