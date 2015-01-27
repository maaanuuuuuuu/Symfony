<?php

namespace MovieMash\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Component\Httpfoundation\Response;
use Symfony\Component\Httpfoundation\Request;

use MovieMash\CoreBundle\Document\Movie;

/**
 * The default controller
 */
class DefaultController extends Controller
{
    /**
     * The index
     * @return [type] [description]
     */
    public function indexAction()
    {
        // get 2 random movies
        $documentManager = $this->get('doctrine.odm.mongodb.document_manager');
        $allMovies = $documentManager->getRepository("MovieMashCoreBundle:Movie")->findAll();
        $leftIndex = rand(0, count($allMovies)-1);
        $rightIndex = rand(0, count($allMovies)-1);
        while ($leftIndex == $rightIndex) {
            $rightIndex = rand(0, count($allMovies)-1);
        }
        $i = 0;
        foreach ($allMovies->getCollection()->find() as $movie) {
            if ($leftIndex == $i) {
                $leftMovie = $movie;
            }
            if ($rightIndex == $i) {
                $rightMovie = $movie;
            }
            $i++;
        }
        return $this->render('MovieMashCoreBundle:Default:index.html.twig', array(
            'leftMovie' => $leftMovie,
            'rightMovie' => $rightMovie
        ));
    }

    /**
     * Action that votes
     * @param Movie $winner the winner
     * @param Movie $looser the looser
     * @ParamConverter("winner", class="MovieMashCoreBundle:Movie", options={"id" = "id"})
     * @ParamConverter("looser", class="MovieMashBundle:Movie", options={"id" = "order"})
     * @return null
     */
    public function voteAction($winner, $looser)
    {

    }

    /**
     * Action that populates the database
     * 
     * @return null
     */
    public function populateDBAction()
    {
        $path = $this->get('kernel')->getRootDir() . '/Resources/100firstMovies.json';
        $movies = file_get_contents($path);
        $movies = json_decode($movies, true);
        $documentManager = $this->get('doctrine.odm.mongodb.document_manager');

        //{ "name": "Les évadés", "date": "1994", "imdbRating": "9.3", "views": "1,374,102" }
        foreach ($movies as $movieArray) {
            $movie = new Movie($movieArray["name"], $movieArray["imdbRating"], $movieArray["date"], $movieArray["views"]);
            $documentManager->persist($movie);
        }
        $documentManager->flush();

        return new Response("Created");
    }
}
