<?php

namespace KoT\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use KoT\CoreBundle\Document\Player;
use KoT\CoreBundle\Document\Game;
use KoT\CoreBundle\Form\PlayerType;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $dm = $this->get('doctrine.odm.mongodb.document_manager');

    	//formulaire de création d'un Player
    	$newPlayer = new Player();
        $newPlayerForm = $this->createForm(new PlayerType(), $newPlayer);

        $request = $this->getRequest();
        if ($request->getMethod() == 'POST') {
            $newPlayerForm->bind($request);

            if($newPlayerForm->isValid()) {
              	//l'associer à un jeux  (le premier de la liste)
            	$notStartedGames = $dm->getRepository("KoTCoreBundle:Game")->findByStarted(false);
                //chercher un jeux avec de la place
                $game = null;
                foreach ($notStartedGames as $notStartedGame) {
                    if($notStartedGame->getPlayers()->count() < Game::MAX_PLAYER_NUMBER){
                        $game = $notStartedGame;
                        break;
                    }
                }
                if(is_null($game)){
                    //s'il n'y a pas de jeux en créer un
                    $game = new Game();                
                }
                $newPlayer->setCurrentGame($game);
                $game->addPlayer($newPlayer);

                $dm->persist($game);
                $dm->persist($newPlayer);
                $dm->flush();

                //rediriger vers l'interface de la partie
                return $this->forward('KoTCoreBundle:Default:gameInterface', array(
                    'gameId'    => $game->getId(),
                    'mainPlayer' => $newPlayer
                ));
                
            }
        }

        return $this->render('KoTCoreBundle:Default:index.html.twig', array(
            'newPlayerForm' => $newPlayerForm->createView()
        ));
    }

    public function gameInterfaceAction($gameId, $mainPlayer){

        $dm = $this->get('doctrine.odm.mongodb.document_manager');
        $request = $this->getRequest();
        // $mainPlayer = $request->request->get('mainPlayer');
        $game = $dm->getRepository('KoTCoreBundle:Game')->find($gameId);
        return $this->render('KoTCoreBundle:Default:gameInterface.html.twig', array(
            'game' => $game,
            'mainPlayer' => $mainPlayer
        ));
    }

}
