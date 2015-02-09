<?php



use Behat\Behat\Context\Context;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
use Behat\MinkExtension\Context\MinkContext;

/**
 * Defines application features from the specific context.
 */
class FeatureContext extends MinkContext implements Context, SnippetAcceptingContext
{
    /**
     * Initializes context.
     *
     * Every scenario gets its own context instance.
     * You can also pass arbitrary arguments to the
     * context constructor through behat.yml.
     */
    public function __construct()
    {

    }


    /**
     * @Given /^klicke den "(Button|Link)" "([^"]*)"$/
     */
    public function clickElement($type, $text)
    {
        $session = $this->getSession();

        $element = null;

        if($type == "Button"){

            $element = $session->getPage()->findButton($text);

            $element->click();

        }
        else if ($type == "Link"){

            $element = $session->getPage()->findLink($text);

            if (!$element->hasAttribute('href')) {
                throw new \Exception(sprintf('Element is a link but has no href Attribute : %s', $element->getHtml()));
            }
            else{
                $element->click();
            }
        }
    }

    /**
     * @Given /^fülle das Formular mit:$/
     */
    public function fillFields(TableNode $table)
    {
        $session = $this->getSession();

        foreach ($table->getRowsHash() as $name => $value)
        {
            $field = $session->getPage()->findField($name);

            switch($field->getTagName())
            {
                case 'input':
                    //echo "input";
                    $field->setValue($value);
                    break;
                case 'textarea':
                    //echo "textarea";
                    $field->setValue($value);
                    break;
            }
        }
    }

    /**
     * @Given /^finde letzten erstellten Kommentar mit Username "([^"]*)"$/
     */
    public function findComment($username)
    {
        $session = $this->getSession();

        $commentSection = $session->getPage()->findById('comments');

        if (!$commentSection->getTagName() == 'section') {
            throw new \Exception(sprintf('Element has no section tag : %s', $commentSection->getHtml()));
        }
        else {

            $comments = $commentSection->findAll('css', 'article.comment');

            $lastComment = (int)count($comments) - 1;
            $comment = $comments[$lastComment];


            $user = $comment->find('css', 'span')->getText();

            if ($username === $user){
                echo $username;
            }
            else{
                throw new \Exception(sprintf('Comment not found with username: %s ', $username));
            }

            $dateTime = new DateTime($comment->find('css', 'time')->getAttribute('datetime'));

            $timeDiff = strtotime("now") - strtotime($dateTime->format('H:i:s'));

            if ($timeDiff < 5) {
                return true;
            } else {
                throw new \Exception(sprintf('Last comment not found'));
            }
        }
    }

    /**
     * @Given /^siehst du "([^"]*)" als (Warnung|Info|Bestätigung)$/
     */
    public function siehstDuAlsWarnung($text, $state)
    {

            $elements = null;
            switch ($state) {
                case 'Info':
                    $elements = $this->getSession()->getPage()->findAll('css', '.alert-info');
                    break;
                case 'Warnung':
                    $elements = $this->getSession()->getPage()->findAll('css', '.alert-warning');
                    break;
                case 'Bestätigung':
                    $elements = $this->getSession()->getPage()->findAll('css', '.alert-success');
                    break;
            }

            foreach ($elements as $element) {
                if (strpos($element->getText(), $text) !== false) {
                    return true;
                }
            }
            throw new \Exception(sprintf('%s "%s" nicht gefunden.', $state, $text));

    }



    /**
     * @Given /^lade die Seite neu$/
     */
    public function reloadPage()
    {
        $this->getSession()->reload();
    }


    /**
     * @Given /^warte "([^"]*)"$/
     */
    public function waitTime($waitTime)
    {
        $session = $this->getSession();
        $session->wait($waitTime);
    }

}
