<?php
/**
 * This file is part of the Presta Bundle project.
 *
 * @author Nicolas Bastien nbastien@prestaconcept.net
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace PrestaCMS\CoreBundle\Block\Dashboard;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Templating\EngineInterface;

use Sonata\AdminBundle\Admin\Pool;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Validator\ErrorElement;
use Sonata\BlockBundle\Model\BlockInterface;
use PrestaCMS\CoreBundle\Block\BaseBlockService;

/**
 * Dashboard CMS Management block
 * 
 * @author Nicolas Bastien nbastien@prestaconcept.net
 */
class CmsBlockService extends BaseBlockService
{
    /**
     * @var \Sonata\AdminBundle\Admin\Pool  
     */
    protected $pool;
    
    /**
     * @param string                                                     $name
     * @param \Symfony\Bundle\FrameworkBundle\Templating\EngineInterface $templating
     * @param \Sonata\AdminBundle\Admin\Pool                             $pool
     */
    public function __construct($name, EngineInterface $templating, Pool $pool)
    {
        parent::__construct($name, $templating);

        $this->pool = $pool;
    }
    
    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'Dashboard CMS';
    }
    
    /**
     * {@inheritdoc}
     */
    public function execute(BlockInterface $block, Response $response = null)
    {
        $settings = array_merge($this->getDefaultSettings(), $block->getSettings());

        return $this->renderResponse('PrestaCMSCoreBundle:Block/Dashboard:block_cms.html.twig', array(
            'block'     => $block,
            'blockId'   => 'block-cmsr',
            'websiteAdmin' => $this->pool->getAdminByAdminCode('presta_cms.website.admin.website'),
            'settings'  => $settings
        ), $response);
    }
}