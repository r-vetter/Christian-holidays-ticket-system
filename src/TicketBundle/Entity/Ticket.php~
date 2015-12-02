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
    /**
     * @var string
     */
    private $description;


    /**
     * Set description
     *
     * @param string $description
     * @return Ticket
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }
    /**
     * @var string
     */
    private $title_business;


    /**
     * Set title_business
     *
     * @param string $titleBusiness
     * @return Ticket
     */
    public function setTitleBusiness($titleBusiness)
    {
        $this->title_business = $titleBusiness;

        return $this;
    }

    /**
     * Get title_business
     *
     * @return string 
     */
    public function getTitleBusiness()
    {
        return $this->title_business;
    }
    /**
     * @var string
     */
    private $date_time;


    /**
     * Set date_time
     *
     * @param string $dateTime
     * @return Ticket
     */
    public function setDateTime($dateTime)
    {
        $this->date_time = $dateTime;

        return $this;
    }

    /**
     * Get date_time
     *
     * @return string 
     */
    public function getDateTime()
    {
        return $this->date_time;
    }
    /**
     * @var string
     */
    private $address;


    /**
     * Set address
     *
     * @param string $address
     * @return Ticket
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return string 
     */
    public function getAddress()
    {
        return $this->address;
    }
    /**
     * @var string
     */
    private $price_1_title;

    /**
     * @var string
     */
    private $price_1;

    /**
     * @var string
     */
    private $price_2_title;

    /**
     * @var string
     */
    private $price_2;


    /**
     * Set price_1_title
     *
     * @param string $price1Title
     * @return Ticket
     */
    public function setPrice1Title($price1Title)
    {
        $this->price_1_title = $price1Title;

        return $this;
    }

    /**
     * Get price_1_title
     *
     * @return string 
     */
    public function getPrice1Title()
    {
        return $this->price_1_title;
    }

    /**
     * Set price_1
     *
     * @param string $price1
     * @return Ticket
     */
    public function setPrice1($price1)
    {
        $this->price_1 = $price1;

        return $this;
    }

    /**
     * Get price_1
     *
     * @return string 
     */
    public function getPrice1()
    {
        return $this->price_1;
    }

    /**
     * Set price_2_title
     *
     * @param string $price2Title
     * @return Ticket
     */
    public function setPrice2Title($price2Title)
    {
        $this->price_2_title = $price2Title;

        return $this;
    }

    /**
     * Get price_2_title
     *
     * @return string 
     */
    public function getPrice2Title()
    {
        return $this->price_2_title;
    }

    /**
     * Set price_2
     *
     * @param string $price2
     * @return Ticket
     */
    public function setPrice2($price2)
    {
        $this->price_2 = $price2;

        return $this;
    }

    /**
     * Get price_2
     *
     * @return string 
     */
    public function getPrice2()
    {
        return $this->price_2;
    }
}
