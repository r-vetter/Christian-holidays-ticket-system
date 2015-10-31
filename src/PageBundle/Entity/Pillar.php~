<?php
namespace PageBundle\Entity;

class Pillar
{    /**
     * @var integer
     */
    private $id;

    /**
     * @var integer
     */
    private $offset;

    /**
     * @var integer
     */
    private $width;

    /**
     * @var integer
     */
    private $position;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $blocks;

    /**
     * @var \PageBundle\Entity\Row
     */
    private $row;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->blocks = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set offset
     *
     * @param integer $offset
     * @return Pillar
     */
    public function setOffset($offset)
    {
        $this->offset = $offset;

        return $this;
    }

    /**
     * Get offset
     *
     * @return integer 
     */
    public function getOffset()
    {
        return $this->offset;
    }

    /**
     * Set width
     *
     * @param integer $width
     * @return Pillar
     */
    public function setWidth($width)
    {
        $this->width = $width;

        return $this;
    }

    /**
     * Get width
     *
     * @return integer 
     */
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * Set position
     *
     * @param integer $position
     * @return Pillar
     */
    public function setPosition($position)
    {
        $this->position = $position;

        return $this;
    }

    /**
     * Get position
     *
     * @return integer 
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * Add blocks
     *
     * @param \PageBundle\Entity\Block $blocks
     * @return Pillar
     */
    public function addBlock(\PageBundle\Entity\Block $blocks)
    {
        $this->blocks[] = $blocks;

        return $this;
    }

    /**
     * Remove blocks
     *
     * @param \PageBundle\Entity\Block $blocks
     */
    public function removeBlock(\PageBundle\Entity\Block $blocks)
    {
        $this->blocks->removeElement($blocks);
    }

    /**
     * Get blocks
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getBlocks()
    {
        return $this->blocks;
    }

    /**
     * Set row
     *
     * @param \PageBundle\Entity\Row $row
     * @return Pillar
     */
    public function setRow(\PageBundle\Entity\Row $row = null)
    {
        $this->row = $row;

        return $this;
    }

    /**
     * Get row
     *
     * @return \PageBundle\Entity\Row 
     */
    public function getRow()
    {
        return $this->row;
    }
}
