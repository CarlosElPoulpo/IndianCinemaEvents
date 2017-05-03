<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class FestivalController extends Controller
{
    /**
     * @Route("/festival", name="festival")
     */
    public function indexAction()
    {

        return $this->render('festival/default/festival.html.twig');
    }
}
