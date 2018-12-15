<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Trip;
use AppBundle\Form\TripType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class TripController extends Controller
{
    /**
     * @param Request $request
     * @Route("/", name="index")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(Request $request)
    {
        $trips = $this->getDoctrine()->getRepository(Trip::class)->findAll();
        return $this->render('trip/index.html.twig', ['trips'=>$trips]);
    }

    /**
     * @param Request $request
     * @Route("/create", name="create")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function create(Request $request)
    {
        $trip = new Trip();
        $form = $this->createForm(TripType::class, $trip);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $em = $this->getDoctrine()->getManager();
            $em->persist($trip);
            $em->flush();
            return $this->redirect('/');
        }
        return $this->render('trip/create.html.twig', ['form' => $form->createView()]);
    }

    /**
     * @Route("/edit/{id}", name="edit")
     *
     * @param $id
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function edit($id, Request $request)
    {
        $trip = $this->getDoctrine()->getRepository(Trip::class)->find($id);
        $form = $this->createForm(TripType::class, $trip);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $em = $this->getDoctrine()->getManager();
            $em->merge($trip);
            $em->flush();
            return $this->redirect('/');
        }
        return $this->render('trip/edit.html.twig', ['trip'=>$trip, 'form' => $form->createView()]);
    }

    /**
     * @Route("/delete/{id}", name="delete")
     *
     * @param $id
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function delete($id, Request $request)
    {
        $trip = $this->getDoctrine()->getRepository(Trip::class)->find($id);
        $form = $this->createForm(TripType::class, $trip);
        $form->handleRequest($request);
        if($form->isSubmitted()){
            $em = $this->getDoctrine()->getManager();
            $em->remove($trip);
            $em->flush();
            return $this->redirect('/');
        }
        return $this->render('trip/delete.html.twig', ['trip'=>$trip, 'form' => $form->createView()]);
    }
}
