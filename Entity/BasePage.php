<?php
/**
 * This file is part of the Presta Bundle project.
 *
 * @author Nicolas Bastien nbastien@prestaconcept.net
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace PrestaCMS\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PrestaCMS\CoreBundle\Entity\BasePage
 */
abstract class BasePage
{
    /**
     * @var boolean $is_active
     */
    protected $is_active;

    /**
     * @var string $url
     */
    protected $url;

    /**
     * @var integer $left
     */
    protected $left;

    /**
     * @var integer $rigth
     */
    protected $rigth;

    /**
     * @var integer $root
     */
    protected $root;

    /**
     * @var integer $level
     */
    protected $level;

    /**
     * @var \Doctrine\Common\Collections\ArrayCollection
     */
    protected $children;

    /**
     * @var \Doctrine\Common\Collections\ArrayCollection
     */
    protected $revisions;

    /**
     * @var \Doctrine\Common\Collections\ArrayCollection
     */
    protected $urlRewrites;

    /**
     * @var Application\PrestaCMS\CoreBundle\Entity\Website
     */
    protected $website;

    /**
     * @var Application\PrestaCMS\CoreBundle\Entity\Page
     */
    protected $parent;

    /**
     * Used locale to override Translation listener`s locale
     * this is not a mapped field of entity metadata, just a simple property
     */
    protected $locale;
    
    public function __construct()
    {
        $this->children = new \Doctrine\Common\Collections\ArrayCollection();
        $this->revisions = new \Doctrine\Common\Collections\ArrayCollection();
        $this->urlRewrites = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Set locale
     *
     * @param  string $locale
     * @return BasePage
     */
    public function setLocale($locale)
    {
        $this->locale = $locale;
        return $this;
    }
    
    /**
     * Set is_active
     *
     * @param boolean $isActive
     * @return BasePage
     */
    public function setIsActive($isActive)
    {
        $this->is_active = $isActive;
        return $this;
    }

    /**
     * Get is_active
     *
     * @return boolean 
     */
    public function getIsActive()
    {
        return $this->is_active;
    }

    /**
     * Set url
     *
     * @param string $url
     * @return BasePage
     */
    public function setUrl($url)
    {
        $this->url = $url;
        return $this;
    }

    /**
     * Get url
     *
     * @return string 
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set left
     *
     * @param integer $left
     * @return BasePage
     */
    public function setLeft($left)
    {
        $this->left = $left;
        return $this;
    }

    /**
     * Get left
     *
     * @return integer 
     */
    public function getLeft()
    {
        return $this->left;
    }

    /**
     * Set rigth
     *
     * @param integer $rigth
     * @return BasePage
     */
    public function setRigth($rigth)
    {
        $this->rigth = $rigth;
        return $this;
    }

    /**
     * Get rigth
     *
     * @return integer 
     */
    public function getRigth()
    {
        return $this->rigth;
    }

    /**
     * Set root
     *
     * @param integer $root
     * @return BasePage
     */
    public function setRoot($root)
    {
        $this->root = $root;
        return $this;
    }

    /**
     * Get root
     *
     * @return integer 
     */
    public function getRoot()
    {
        return $this->root;
    }

    /**
     * Set level
     *
     * @param integer $level
     * @return BasePage
     */
    public function setLevel($level)
    {
        $this->level = $level;
        return $this;
    }

    /**
     * Get level
     *
     * @return integer 
     */
    public function getLevel()
    {
        return $this->level;
    }

    /**
     * Add children
     *
     * @param Application\PrestaCMS\CoreBundle\Entity\Page $children
     * @return BasePage
     */
    public function addPage(\Application\PrestaCMS\CoreBundle\Entity\Page $children)
    {
        $this->children[] = $children;
        return $this;
    }

    /**
     * Get children
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getChildren()
    {
        return $this->children;
    }

    /**
     * Add revisions
     *
     * @param Application\PrestaCMS\CoreBundle\Entity\PageRevision $revisions
     * @return BasePage
     */
    public function addPageRevision(\Application\PrestaCMS\CoreBundle\Entity\PageRevision $revisions)
    {
        $this->revisions[] = $revisions;
        return $this;
    }

    /**
     * Get revisions
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getRevisions()
    {
        return $this->revisions;
    }

    /**
     * Add urlRewrites
     *
     * @param Application\PrestaCMS\CoreBundle\Entity\PageUrlRewrite $urlRewrites
     * @return BasePage
     */
    public function addPageUrlRewrite(\Application\PrestaCMS\CoreBundle\Entity\PageUrlRewrite $urlRewrites)
    {
        $this->urlRewrites[] = $urlRewrites;
        return $this;
    }

    /**
     * Get urlRewrites
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getUrlRewrites()
    {
        return $this->urlRewrites;
    }

    /**
     * Set website
     *
     * @param Application\PrestaCMS\CoreBundle\Entity\Website $website
     * @return BasePage
     */
    public function setWebsite(\Application\PrestaCMS\CoreBundle\Entity\Website $website = null)
    {
        $this->website = $website;
        return $this;
    }

    /**
     * Get website
     *
     * @return Application\PrestaCMS\CoreBundle\Entity\Website 
     */
    public function getWebsite()
    {
        return $this->website;
    }

    /**
     * Set parent
     *
     * @param Application\PrestaCMS\CoreBundle\Entity\Page $parent
     * @return BasePage
     */
    public function setParent(\Application\PrestaCMS\CoreBundle\Entity\Page $parent = null)
    {
        $this->parent = $parent;
        return $this;
    }

    /**
     * Get parent
     *
     * @return Application\PrestaCMS\CoreBundle\Entity\Page 
     */
    public function getParent()
    {
        return $this->parent;
    }
}