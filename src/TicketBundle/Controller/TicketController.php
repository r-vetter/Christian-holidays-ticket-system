<?php
namespace TicketBundle\Controller;
use TicketBundle\Entity\Ticket;
use TicketBundle\TicketBundle;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Cookie;
use Symfony\Component\HttpFoundation\Response;

class TicketController extends Controller
{



    public function indexAction($id = false, Request $request)
    {

        $ticket = $this->getDoctrine()->getRepository('TicketBundle:Ticket')->findOneBy(array('external'=>$id));

        $items = $ticket->getSubscribers();

        $response = new Response();
        $response->headers->setCookie(new Cookie("ticket_id", $id));
        $response->sendHeaders();

        return $this->render(
            'TicketBundle:Ticket:index.html.twig',
            array('items' => $items,'ticket'=>$ticket)
        );
    }

    public function editAction($id = false, Request $request)
    {

        $item = $this->getDoctrine()->getRepository('TicketBundle:Ticket')->findOneBy(array('external'=>$id));
        if($item == null){
            $item = new Ticket();
            $item->setExternal($id);
        }
        $form = $this->createFormBuilder($item);

        $form = $form
            ->add('title', 'text', array('required'=> true, 'label' => 'Titel'))
            ->add('price', 'money', array('required'=> false,'label' => 'Prijs per persoon'))
            ->add('save', 'submit', array('label' => 'Opslaan'))
            ->getForm();

        $form->handleRequest($request);
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $item->setTitle(trim($item->getTitle(),'/'));
            $item->setPrice($item->getPrice());
            $em->persist($item);
            $em->flush();
        }

        return $this->render('@Ticket/Ticket/edit.html.twig', array(
            'form' => $form->createView(),
            'item' => $item
        ));

    }
    public function addAction(Request $request)
    {
        $this->editAction('new',$request);
    }
}