<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $repository = $this->getDoctrine()->getRepository("AppBundle:Member");
        $members = $repository->findBy(array(), array('arrange' => 'ASC'));

        return $this->render('default/index.html.twig', array("members"=> $members));
    }

    /**
     * @Route("/about", name="about")
     */
    public function aboutAction(Request $request)
    {
        $repository = $this->getDoctrine()->getRepository("AppBundle:Member");
        $members = $repository->findBy(array(), array('arrange' => 'ASC'));

        return $this->render('default/about.html.twig', array("members"=> $members));
    }

    /**
     * @Route("/indian-cinema", name="indian_cinema")
     */
    public function indianCinemaAction(Request $request)
    {
        $repository = $this->getDoctrine()->getRepository("AppBundle:Personality");
        $personalities = $repository->findBy(array(), array('name' => 'ASC'));

        return $this->render('default/indian_cinema.html.twig', array("personalities"=> $personalities));
    }

    /**
     * @Route("/personality/{id}/{slug}", name="personality")
     */
    public function personalityAction($id, $slug)
    {
        $repository = $this->getDoctrine()->getRepository("AppBundle:Personality");
        $personality = $repository->findOneBy(array('id'   => $id, 'slug' => $slug));

        return $this->render('default/personality.html.twig', array("personality"=> $personality));
    }

    /**
     * @Route("/events", name="events")
     */
    public function eventsAction()
    {
        $repository = $this->getDoctrine()->getRepository("AppBundle:Event");
        $present_events = $repository->present();
        $old_events = $repository->archived();

        return $this->render('default/events.html.twig', array("present_events"=> $present_events, "old_events"=> $old_events));
    }

    /**
     * @Route("/event/{id}/{slug}", name="detail_event")
     */
    public function detailEventAction($id, $slug)
    {
        $repository = $this->getDoctrine()->getRepository("AppBundle:Event");
        $event = $repository->findOneBy(array('id'   => $id, 'slug' => $slug));

        return $this->render('default/detail_event.html.twig', array("event"=> $event));
    }

    /**
     * @Route("/films", name="films")
     */
    public function filmsAction()
    {
        /*$repository = $this->getDoctrine()->getRepository("AppBundle:Event");
        $present_events = $repository->present();
        $old_events = $repository->archived();*/

        return $this->render('default/films.html.twig');
    }

    /**
     * @Route("/gallery", name="gallery")
     */
    public function galleryAction()
    {
        /*$repository = $this->getDoctrine()->getRepository("AppBundle:Event");
        $present_events = $repository->present();
        $old_events = $repository->archived();*/

        return $this->render('default/gallery.html.twig');
    }
}
