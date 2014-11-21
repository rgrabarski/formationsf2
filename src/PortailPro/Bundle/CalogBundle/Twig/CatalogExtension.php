<?php
namespace PortailPro\Bundle\CalogBundle\Twig;


use PortailPro\Bundle\CalogBundle\Entity\Product;
use Symfony\Component\PropertyAccess\PropertyAccess;

/**
 * Created by PhpStorm.
 * User: Robin
 * Date: 21/11/2014
 * Time: 12:37
 */

class CatalogExtension extends \Twig_Extension {

    /**
     * Returns the name of the extension.
     *
     * @return string The extension name
     */
    public function getName()
    {
        return 'catalog';
    }

    public function getFunctions()
    {
        return array(
            new \Twig_SimpleFunction('selector', array($this, 'selector'),array('is_safe'=>array('html')))
        );

    }

    public function selector(Product $produit, $attribut){

        $html = "<select>";
        $accessor = PropertyAccess::createPropertyAccessor();
        $articles =  $produit->getArticles();

        foreach($articles as $article) {
            $html .= sprintf("<option>%s</option>", $accessor->getValue($article, $attribut));
        }
        $html .= "</select>";

        return $html;

    }



}