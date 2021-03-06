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

        if($ticket == null){
            return $this->redirect($this->generateUrl('ticket_edit',array('id' => $id)));
        }
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

        $defaultPriceTitle = $item->getPrice1Title() == '' ? 'Aantal personen' : $item->getPrice1Title();
        $form = $form
            ->add('title', 'text', array('required'=> true, 'label' => 'Titel ticket',
                'data' => $item->getTitle() == null ? $request->query->get('title') : $item->getTitle()
            ))
            ->add('date_time', 'text', array('required'=> true, 'label' => 'Datum en tijd',
                'data' => $item->getDateTime() == null ? $request->query->get('date') : $item->getDateTime()
            ))
            ->add('title_business', 'text', array('required'=> true,'label' => 'Titel bedrijf',
                'data' => $item->getTitleBusiness() == null ? $request->query->get('title_business') : $item->getTitleBusiness()
            ))
            ->add('address', 'textarea', array('required'=> false,'label' => 'Adres',
                'data' => $item->getAddress() == null ? $request->query->get('address') : $item->getAddress()
            ))
            ->add('description', 'textarea', array('required'=> false,'label' => 'Extra omschrijving', 'attr' => array('style'=>'margin-bottom:20px;')))

            ->add('price_1_title', 'text', array('required'=> true,'label' => 'Titel prijs 1', 'data'=> $defaultPriceTitle))
            ->add('price1', 'money', array('required'=> true,'label' => 'Prijs 1',
                'data' => $item->getPrice1() == null ? $request->query->get('price') : $item->getPrice1()
            ))
            ->add('price_2_title', 'text', array('required'=> false,'label' => 'Titel prijs 2'))
            ->add('price2', 'money', array('required'=> false,'label' => 'prijs 2'))

            ->add('save', 'submit', array('label' => 'Opslaan'))
            ->getForm();

        $form->handleRequest($request);
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
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