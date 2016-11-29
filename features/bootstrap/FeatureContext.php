<?php

use Behat\Behat\Context\ClosuredContextInterface,
    Behat\Behat\Context\TranslatedContextInterface,
    Behat\Behat\Context\BehatContext,
    Behat\Behat\Exception\PendingException;
use Behat\Gherkin\Node\PyStringNode,
    Behat\Gherkin\Node\TableNode;
	
use Behat\Mink\Mink,
    Behat\Mink\Session,
    Behat\Mink\Driver\Selenium2Driver;

require_once 'vendor/autoload.php';

//
// Require 3rd-party libraries here:
//
//   require_once 'PHPUnit/Autoload.php';
//   require_once 'PHPUnit/Framework/Assert/Functions.php';
//

/**
 * Features context.
 */
class FeatureContext extends BehatContext
{
    /**
     * Initializes context.
     * Every scenario gets its own context object.
     *
     * @param array $parameters context parameters (set them up through behat.yml)
     */
    public function __construct(array $parameters)
    {
        // Initialize your context here
		
		
        $mink = new Mink(array(
            'selenium2' => new Session(new Selenium2Driver($parameters['wd_capabilities']['browser'], $parameters['wd_capabilities'], $parameters['wd_host'])),
        ));

        $this->gui = $mink->getSession('selenium2');

    }

	/**
     * @Given /^I go to wikipedia$/
     */
    public function iGoToWikipedia()
    {
        $this->gui->start();
		$this->gui->visit("https://en.wikipedia.org/wiki/Main_Page");
		$this->gui->wait(5000);
		
    
    }
	/**
     * @When /^I search "([^"]*)"$/
     */
    public function iFillInTheFollowing($arg1)
    {
		$page = $this->gui->getPage();
		$page->fillField("search", $arg1);
		
    }
	
	 /**
     * @Given /^I press "([^"]*)"$/
     */
    public function iPress($arg1)
    {
       $page = $this->gui->getPage();
	   $button = $page->findButton('go');
	   $button->click();
    }



}
