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
     * @var string
     */
    private $email;

    /**
     * @var integer
     */
    private $number_of_persons;

    /**
     * @var string
     */
    private $commentary;

    /**
     * @var string
     */
    private $payment_state;

    /**
     * @var string
     */
    private $total_price;

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

    /**
     * Set payment_state
     *
     * @param int|string $paymentState
     * @return $this 'created'|'order_submit'|'order_failed'|'order_pending'|'paid'
     */
    public function setPaymentState($paymentState = 'created'|'order_submit'|'order_failed'|'order_pending'|'paid')
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
     * Set total_price
     *
     * @param string $totalPrice
     * @return Subscriber
     */
    public function setTotalPrice($totalPrice)
    {
        $this->total_price = $totalPrice;

        return $this;
    }

    /**
     * Get total_price
     *
     * @return string 
     */
    public function getTotalPrice()
    {
        return $this->total_price;
    }

    /**
     * Set created
     *
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
     * @var integer
     */
    private $number_of_price1;

    /**
     * @var integer
     */
    private $number_of_price2;


    /**
     * Set number_of_price1
     *
     * @param integer $numberOfPrice1
     * @return Subscriber
     */
    public function setNumberOfPrice1($numberOfPrice1)
    {
        $this->number_of_price1 = $numberOfPrice1;

        return $this;
    }

    /**
     * Get number_of_price1
     *
     * @return integer 
     */
    public function getNumberOfPrice1()
    {
        return $this->number_of_price1;
    }

    /**
     * Set number_of_price2
     *
     * @param integer $numberOfPrice2
     * @return Subscriber
     */
    public function setNumberOfPrice2($numberOfPrice2)
    {
        $this->number_of_price2 = $numberOfPrice2;

        return $this;
    }

    /**
     * Get number_of_price2
     *
     * @return integer 
     */
    public function getNumberOfPrice2()
    {
        return $this->number_of_price2;
    }
}
