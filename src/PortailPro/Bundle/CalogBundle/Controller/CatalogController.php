<?php

namespace PortailPro\Bundle\CalogBundle\Controller;

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
class CatalogController extends Controller
{

    /**
     * Lists all Product entities.
     *
     * @Route("/", name="homepage")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('PortailProCalogBundle:Product')->findAllWithRandom();

        return array(
            'entities' => $entities,
        );
    }

}
