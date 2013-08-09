<?php

namespace Presta\CMSCoreBundle\Features\Context;

use Behat\Behat\Context\BehatContext;
use Behat\Gherkin\Node\TableNode;
use Behat\Behat\Exception\PendingException;
use Behat\MinkExtension\Context\MinkContext;
use Behat\Symfony2Extension\Context\KernelAwareInterface;
use Symfony\Component\HttpKernel\KernelInterface;

use Presta\CMSCoreBundle\Document\Theme;

/**
 * Description of ThemeContext
 *
 * @author David Epely <depely@prestaconcept.net>
 */
class ThemeContext extends BehatContext
{
    /**
     * @Then /^I should see (\d+) themes$/
     */
    public function iShouldSeeThemes($arg1)
    {
        $this->getMainContext()->assertNumElements($arg1, '.sonata-ba-content table tbody tr');
    }
    
    /**
     * @Then /^I should see the creative theme configuration$/
     */
    public function iShouldSeeTheCreativeThemeConfiguration() 
    {
        $this->getMainContext()->assertPageContainsText('General informations');
    }

    /**
     * @Given /^I should see (\d+) locales$/
     */
    public function iShouldSeeLocales($arg1) 
    {
        $this->getMainContext()->assertNumElements($arg1, 'ul#website-locale li');
    }
}
