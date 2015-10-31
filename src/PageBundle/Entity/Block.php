<?php
namespace PageBundle\Entity;

class Block
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var array
     */
    private $module;

    /**
     * @var integer
     */
    private $position;

    /**
     * @var \PageBundle\Entity\Pillar
     */
    private $pillar;


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
     * Set module
     *
     * @param array $module
     * @return Block
     */
    public function setModule($module)
    {
        $this->module = $module;

        return $this;
    }

    /**
     * Get module
     *
     * @return array
     */
    public function getModule()
    {
        return $this->module;
    }

    /**
     * Set position
     *
     * @param integer $position
     * @return Block
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
     * Set pillar
     *
     * @param \PageBundle\Entity\Pillar $pillar
     * @return Block
     */
    public function setPillar(\PageBundle\Entity\Pillar $pillar = null)
    {
        $this->pillar = $pillar;

        return $this;
    }

    /**
     * Get pillar
     *
     * @return \PageBundle\Entity\Pillar
     */
    public function getPillar()
    {
        return $this->pillar;
    }
}
