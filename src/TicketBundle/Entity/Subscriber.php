<?php
/**
 * Created by PhpStorm.
 * User: Reindert
 * Date: 18-10-2015
 * Time: 21:27
 */

namespace TicketBundle\Entity;


class Subscriber {

    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $first_name;

    /**
     * @var string
     */
    private $last_name;

    /**
     * @var integer
     */
    private $number_of_persons;

    /**
     * @var string
     */
    private $payment_state;

    /**
     * @var \DateTime
     */
    private $created;

    /**
     * @var \DateTime
     */
    private $updated;

    /**
     * @var \TicketBundle\Entity\Ticket
     */
    private $ticket;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set first_name
     *
     * @param string $firstName
     * @return Subscriber
     */
    public function setFirstName($firstName)
    {
        $this->first_name = $firstName;

        return $this;
    }

    /**
     * Get first_name
     *
     * @return string 
     */
    public function getFirstName()
    {
        return $this->first_name;
    }

    /**
     * Set last_name
     *
     * @param string $lastName
     * @return Subscriber
     */
    public function setLastName($lastName)
    {
        $this->last_name = $lastName;

        return $this;
    }

    /**
     * Get last_name
     *
     * @return string 
     */
    public function getLastName()
    {
        return $this->last_name;
    }

    /**
     * Set number_of_persons
     *
     * @param integer $numberOfPersons
     * @return Subscriber
     */
    public function setNumberOfPersons($numberOfPersons)
    {
        $this->number_of_persons = $numberOfPersons;

        return $this;
    }

    /**
     * Get number_of_persons
     *
     * @return integer 
     */
    public function getNumberOfPersons()
    {
        return $this->number_of_persons;
    }

    /**
     * Set payment_state
     *
     * @param string $paymentState
     * @return Subscriber
     */
    public function setPaymentState($paymentState)
    {
        $this->payment_state = $paymentState;

        return $this;
    }

    /**
     * Get payment_state
     *
     * @return string 
     */
    public function getPaymentState()
    {
        return $this->payment_state;
    }

    /**
     * Set created
     *
     * @param \DateTime
     * @return Subscriber
     */
    public function setCreated()
    {
        $this->created = new \DateTime("now");

        return $this;
    }

    /**
     * Get created
     *
     * @return \DateTime 
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * Set updated
     *
     * @param \DateTime
     * @return Subscriber
     */
    public function setUpdated()
    {
        $this->updated = new \DateTime("now");

        return $this;
    }

    /**
     * Get updated
     *
     * @return \DateTime 
     */
    public function getUpdated()
    {
        return $this->updated;
    }

    /**
     * Set ticket
     *
     * @param \TicketBundle\Entity\Ticket $ticket
     * @return Subscriber
     */
    public function setTicket(\TicketBundle\Entity\Ticket $ticket = null)
    {
        $this->ticket = $ticket;

        return $this;
    }

    /**
     * Get ticket
     *
     * @return \TicketBundle\Entity\Ticket 
     */
    public function getTicket()
    {
        return $this->ticket;
    }
    /**
     * @var string
     */
    private $email;


    /**
     * Set email
     *
     * @param string $email
     * @return Subscriber
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }
    /**
     * @var string
     */
    private $commentary;


    /**
     * Set commentary
     *
     * @param string $commentary
     * @return Subscriber
     */
    public function setCommentary($commentary)
    {
        $this->commentary = $commentary;

        return $this;
    }

    /**
     * Get commentary
     *
     * @return string 
     */
    public function getCommentary()
    {
        return $this->commentary;
    }
}
