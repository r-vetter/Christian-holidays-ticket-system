<?php
namespace TicketBundle\Controller;
use TicketBundle\Entity\Ticket;
use TicketBundle\Entity\Subscriber;
use TicketBundle\TicketBundle;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Cookie;

class SubscriberController extends Controller
{
    private $orderStates =  array(
            'created'       => 'Aangemaakt (Betaling nog niet verwerkt)',
            'order_submit'  => 'Betaling nog niet verwerkt',
            'order_failed'  => 'Mislukt',
            'paid'          => 'Betaald'
        );


    public function editAction($id = false, Request $request)
    {

        $ticketId = $request->cookies->get('ticket_id');
        $ticket = $this->getDoctrine()->getRepository('TicketBundle:Ticket')->find($ticketId);

        $item = $this->getDoctrine()->getRepository('TicketBundle:Subscriber')->find($id);
        if ($item == null) {
            $item = new Subscriber();
            $item->setTicket($ticket);
            $item->setCreated();
        }

        $form = $this->createFormBuilder($item);

        $form = $form
            ->add('first_name', 'text', array('required' => true, 'label' => 'Voornaam'))
            ->add('last_name', 'text', array('required' => true,'label' => 'Achternaam'))
            ->add('email', 'text', array('required' => true,'label' => 'E-mail'))
            ->add('number_of_persons', 'integer', array('required' => true,'label' => 'Aantal personen'))
            ->add('commentary', 'textarea', array('required' => false, 'label' => 'Opmerking'))
            ->add('payment_state', 'choice', array(
                'choices' => $this->orderStates,
                'label' => 'Betaal status'
                )
            )
            ->add('save', 'submit', array('label' => 'Opslaan'))
            ->getForm();

        $form->handleRequest($request);
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $item->setUpdated();
            $em->persist($item);
            $em->flush();

            return $this->redirect($this->generateUrl('subscriber_edit', array('id' => $item->getId())));

        }

        return $this->render('@Ticket/Subscriber/edit.html.twig', array(
            'form' => $form->createView(),
            'ticket' => $ticket,
            'item' => $item
        ));

    }

    public function frontendSubmitAction($id = false, Request $request)
    {

        $item = false;
        $ticket = $this->getDoctrine()->getRepository('TicketBundle:Ticket')->find($id);
        $ticket = $ticket != null ? $ticket : $request->cookies->get('ticket_id');

        $subscriberId = $request->cookies->get('subscriber_id');
        if($subscriberId != false){
            $item = $this->getDoctrine()->getRepository('TicketBundle:Subscriber')->find($subscriberId);
        }
        if ($item == null) {
            $item = new Subscriber();
            $item->setTicket($ticket);
            $item->setCreated();
        }

        $form = $this->createFormBuilder($item);

        $form = $form
            ->add('first_name', 'text', array('required' => true, 'label' => 'Voornaam'))
            ->add('last_name', 'text', array('required' => true,'label' => 'Achternaam'))
            ->add('email', 'text', array('required' => true,'label' => 'E-mail'))
            ->add('number_of_persons', 'integer', array('required' => true,'label' => 'Aantal personen'))
            ->add('commentary', 'textarea', array('required' => false,'label'=>'Opmerking'))
            ->add('save', 'submit', array('label' => 'Volgende'))
            ->getForm();

        $form->handleRequest($request);
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $item->setPaymentState('created');
            $item->setUpdated();
            $em->persist($item);
            $em->flush();

            $response = new Response();
            $response->headers->setCookie(new Cookie("subscriber_id", $item->getId()));
            $response->sendHeaders();

            return $this->redirect($this->generateUrl('subscriber_frondend_overview'));

        }

        return $this->render('@Ticket/Subscriber/frontend.html.twig', array(
            'form' => $form->createView(),
            'ticket' => $ticket,
            'item' => $item
        ));

    }

    public function frontendResetAction($id = false){

        $response = new Response();
        $response->headers->setCookie(new Cookie("subscriber_id", false));
        $response->sendHeaders();
        return $this->redirect($this->generateUrl('subscriber_frondend_submit',array('id' => $id)));
    }

    public function frontendOverviewAction(Request $request)
    {
        $subscriberId = $request->cookies->get('subscriber_id');

        $item = $this->getDoctrine()->getRepository('TicketBundle:Subscriber')->find($subscriberId);

        $em = $this->getDoctrine()->getManager();
        $item->setPaymentState('order_submit');
        $item->setUpdated();
        $em->persist($item);
        $em->flush();

        $kernel = $this->get('kernel');

        return $this->render('@Ticket/Subscriber/overview.html.twig', array(
            'item' => $item,
            'orderState' => $this->orderStates[$item->getPaymentState()],
            'debug' => $kernel->isDebug()
        ));

    }

    public function frontendConfirmationAction ($id){

        $item = $this->getDoctrine()->getRepository('TicketBundle:Subscriber')->find($id);

        $em = $this->getDoctrine()->getManager();
        $item->setPaymentState('paid');
        $item->setUpdated();
        $em->persist($item);
        $em->flush();

        return $this->render('@Ticket/Subscriber/confirmation.html.twig', array(
            'item' => $item
        ));
    }

}