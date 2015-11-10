<?php
namespace PageBundle\Controller;
use PageBundle\Entity\Page;
use PageBundle\Entity\Row;
use PageBundle\PageBundle;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class PageController extends Controller
{

    public $settings;
    public function __construct()
    {
        /*$Page = new Page();
        $item->setTitle('titel construct');
        var_dump($item);
        exit;*/

        /*$menuPages = $this->getDoctrine()->getRepository('PageBundle:Page')->findAll();
        var_dump($products);
        exit('test');*/
    }


    public function indexAction()
    {
        /* test 11 */


        $request = $this->get('request')->request;

        $em = $this->getDoctrine()->getManager();
        $deletePages = $request->get('deletePages');
        $selecedPages = $request->get('selected_items');

        $items = $em->getRepository('PageBundle:Page');
        if($selecedPages != null && $deletePages != null) {
            foreach ($selecedPages as $selecedPage) {

                $item = $items->find($selecedPage);
                if($item != null)
                $em->remove($item);

            }

            $em->flush();
        }

        $pages = $em->getRepository('PageBundle:Page')->findAll();



        return $this->render(
            'PageBundle:Page:index.html.twig',
            array('pages' => $pages)
        );
    }
    public function editAction($id = false, Request $request)
    {

        $this->settings = array('base' => $this->get('request')->getSchemeAndHttpHost().$this->container->get('router')->getContext()->getBaseUrl().'/');

        $item = $this->getDoctrine()->getRepository('PageBundle:Page')->find($id);
        if($item == null){
            $item = new Page();
        }
        $form = $this->createFormBuilder($item);

        $form = $form
            ->add('title', 'text', array('label' => 'Titel'))
            ->add('url', 'prefixed_text', array(
                'url_prefix' => $this->get('request')->getSchemeAndHttpHost().$this->container->get('router')->getContext()->getBaseUrl().'/',
                'required'=> false,
                'attr' => array("autocomplete" => "off"),
            ))
            ->add('meta_title', 'text', array('required'=> false,'label' => 'Meta Titel', 'attr'=> array('placeholder' => 'Standaard overnemen'),))
            ->add('meta_description', 'textarea', array('required'=> false,'label' => 'Omschrijving', 'attr'=> array('placeholder' => 'Standaard overnemen'),))
            ->add('meta_tags', 'text', array('required'=> false,'label' => 'Zoekwoorden', 'attr'=> array('placeholder' => 'Standaard overnemen'),))
            ->add('save', 'submit', array('label' => 'Opslaan'))
            ->getForm();

        $form->handleRequest($request);
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $item->setUrl(trim($item->getUrl(),'/'));
            $item->setType('page');
            $em->persist($item);
            $em->flush();

            /*$row = new Row();
            $row->setPosition(1);
            $row->setFullWidth(false);
            $row->setPage($item);
            $em->persist($row);
            $em->flush();*/


            /*foreach($item->getRows() as $row){
                dump($row);
                exit('test');
            }*/
        }

        $pageEnity = $this->getDoctrine()->getRepository('PageBundle:Page');
        $usedUrls = $pageEnity->getUrls();
        $parentData = $pageEnity->getDataFromParent($item);
        $defaultData = $pageEnity->getDataFromParent($item, true);

        return $this->render('@Page/Page/edit.html.twig', array(
            'settings' => $this->settings,
            'form' => $form->createView(),
            'item' => $item,
            'parent_data' => $parentData,
            'default_data' => $defaultData,
            'urls' => $usedUrls
        ));

    }
    public function addAction(Request $request)
    {
        $this->editAction('new',$request);
    }
}