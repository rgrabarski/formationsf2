<?php

namespace PortailPro\Bundle\CalogBundle\Controller;

use PortailPro\Bundle\CalogBundle\Form\ArticleProductType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use PortailPro\Bundle\CalogBundle\Entity\Product;
use PortailPro\Bundle\CalogBundle\Form\ProductType;

/**
 * Catalog controller.
 *
 */
class CatalogProductController extends Controller
{

    /**
     * Lists all Product entities.
     *
     * @Route("/show_product/{id}", name="catalog_product_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {

        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PortailProCalogBundle:Product')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Product entity.');
        }

        $article_form = $this->createForm(new ArticleProductType(), $entity, array(
            'action' => $this->generateUrl('category_create'),
            'method' => 'POST',
        ));

        $article_form->add('submit', 'submit', array('label' => 'Add to cart'));

        return array(
            'entity'      => $entity,
            'article_form'=> $article_form
        );
    }

}
