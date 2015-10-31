<?php
namespace BaseBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class BaseController extends Controller
{
    public function indexAction($url)
    {

        $em = $this->getDoctrine()->getManager();
        $page = $em->getRepository('PageBundle:Page')->getPageBySlug($url);
        if($page == null) exit('Pagina niet gevonden');



        return $this->render(
            'BaseBundle:Item:index.html.twig',
            array('page' => $page)
        );
    }
    public function editAction()
    {
        exit('test');
    }
}