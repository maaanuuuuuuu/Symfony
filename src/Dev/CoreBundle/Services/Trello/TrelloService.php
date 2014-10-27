<?php
// src/Dev/CoreBundle/Services/Trello/TrelloService.php
namespace Dev\CoreBundle\Services\Trello;

use Dev\CoreBundle\Services\Trello\Trello as TrelloAPI;
use Symfony\Component\HttpKernel\Log\LoggerInterface;
use Doctrine\ODM\MongoDB\DocumentManager;

class TrelloService
{

    protected $trelloAPI;
    protected $dm;
    protected $consumer_key = "cc9a045ccdab27789626729aa33838ff";
    protected $shared_secret = "8a77413bf981d4ce93e69eb53d8d6596e0ed2456e6c354d36a88bd934f9bf380";
    protected $token = "6a880f4bddbf7bf46073157f232b1ff6866c036981cc37ae7a7ad29067902c54";
    protected $logger;

    public function __construct(DocumentManager $dm, LoggerInterface $logger = null)
    {
        // $consumer_key, $shared_secret = null, $token = null, $oauth_secret = null
        $this->trelloAPI = new TrelloAPI($this->consumer_key, $this->shared_secret, $this->token);
        $this->dm = $dm;
        $this->logger = $logger;
    }

    //cette fonction récupère les nouveaux élements de trello, ensuite avec des listener, ils sont ajoutés dans la table post avec le tag trello et le projet concerné par le changement
    public function fetchNewTrelloCards()
    {
        $trelloAPI = $this->trelloAPI;
        $projects = $this->dm->getRepository('DevCoreBundle:Project')->findAll();
        // $projects = $this->dm->getRepository('DevCoreBundle:Project')->findSortByCreated();
        foreach ($projects as $project) {
            $boardTrelloId = $project->getTrelloBoardLink();
            //on en déduit le board
            //récupérer toutes les cards
            //si elles sont nouvelles on les insert dans la table card
        }
    }

    //function that gets the trelloBoard from trello via the Trello API
    public function fetchTrelloBoard(String $boardTrelloId)
    {
    }

}
