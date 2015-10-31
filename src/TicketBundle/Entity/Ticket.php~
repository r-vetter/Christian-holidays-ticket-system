<?php
namespace TicketBundle\Entity;

class Ticket
{    

    /**
     * @var integer
     */
    private $id;

    /**
     * @var integer
     */
    private $external;

    /**
     * @var string
     */
    private $title;

    /**
     * @var string
     */
    private $price;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $subscribers;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->subscribers = new \Doctrine\Common\Collections\ArrayCollection();
    }

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
     * Set external
     *
     * @param integer $external
     * @return Ticket
     */
    public function setExternal($external)
    {
        $this->external = $external;

        return $this;
    }

    /**
     * Get external
     *
     * @return integer 
     */
    public function getExternal()
    {
        return $this->external;
    }

    /**
     * Set title
     *
     * @param string $title
     * @return Ticket
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set price
     *
     * @param string $price
     * @return Ticket
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return string 
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Add subscribers
     *
     * @param \TicketBundle\Entity\Subscriber $subscribers
     * @return Ticket
     */
    public function addSubscriber(\TicketBundle\Entity\Subscriber $subscribers)
    {
        $this->subscribers[] = $subscribers;

        return $this;
    }

    /**
     * Remove subscribers
     *
     * @param \TicketBundle\Entity\Subscriber $subscribers
     */
    public function removeSubscriber(\TicketBundle\Entity\Subscriber $subscribers)
    {
        $this->subscribers->removeElement($subscribers);
    }

    /**
     * Get subscribers
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getSubscribers()
    {
        return $this->subscribers;
    }
}
