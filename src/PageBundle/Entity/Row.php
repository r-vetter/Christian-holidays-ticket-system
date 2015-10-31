<?php
namespace PageBundle\Entity;

class Row
{    
      /**
     * @var integer
     */
    private $id;

    /**
     * @var integer
     */
    private $full_width;

    /**
     * @var integer
     */
    private $position;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $columns;

    /**
     * @var \PageBundle\Entity\Page
     */
    private $page;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->columns = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set full_width
     *
     * @param integer $fullWidth
     * @return Row
     */
    public function setFullWidth($fullWidth)
    {
        $this->full_width = $fullWidth;

        return $this;
    }

    /**
     * Get full_width
     *
     * @return integer 
     */
    public function getFullWidth()
    {
        return $this->full_width;
    }

    /**
     * Set position
     *
     * @param integer $position
     * @return Row
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
     * Add columns
     *
     * @param \PageBundle\Entity\Pillar $columns
     * @return Row
     */
    public function addColumn(\PageBundle\Entity\Pillar $columns)
    {
        $this->columns[] = $columns;

        return $this;
    }

    /**
     * Remove columns
     *
     * @param \PageBundle\Entity\Pillar $columns
     */
    public function removeColumn(\PageBundle\Entity\Pillar $columns)
    {
        $this->columns->removeElement($columns);
    }

    /**
     * Get columns
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getColumns()
    {
        return $this->columns;
    }

    /**
     * Set page
     *
     * @param \PageBundle\Entity\Page $page
     * @return Row
     */
    public function setPage(\PageBundle\Entity\Page $page = null)
    {
        $this->page = $page;

        return $this;
    }

    /**
     * Get page
     *
     * @return \PageBundle\Entity\Page 
     */
    public function getPage()
    {
        return $this->page;
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $pillar;


    /**
     * Add pillar
     *
     * @param \PageBundle\Entity\Pillar $pillar
     * @return Row
     */
    public function addPillar(\PageBundle\Entity\Pillar $pillar)
    {
        $this->pillar[] = $pillar;

        return $this;
    }

    /**
     * Remove pillar
     *
     * @param \PageBundle\Entity\Pillar $pillar
     */
    public function removePillar(\PageBundle\Entity\Pillar $pillar)
    {
        $this->pillar->removeElement($pillar);
    }

    /**
     * Get pillar
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPillar()
    {
        return $this->pillar;
    }
}
