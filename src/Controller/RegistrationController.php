<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Forms;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Registration;


class RegistrationController extends AbstractController
{


    /**
     * @Route("/")
     * @Method({"GET", "POST"})
     */
    public function show(Request $request)
    {


       $data_form = $this->createFormBuilder(null, array(
           'action' => '/',
           'method' => 'POST'
       ))
            ->add('firstname', TextType::class)
            ->add('lastname', TextType::class)
            ->add('email', EmailType::class)
            ->add('phone', TelType::class)
            ->add('address', TextType::class)
            ->getForm();

       $data_form->handleRequest($request);

        if ($data_form->isSubmitted() && $data_form->isValid()) {

            //dump($data_form['lastname']->getData());
            $registration = new Registration();
            $registration->setFirstname($data_form['firstname']->getData())
                ->setLastname($data_form['lastname']->getData())
                ->setEmail($data_form['email']->getData())
                ->setPhone($data_form['phone']->getData())
                ->setAddress($data_form['address']->getData());

            $em = $this->getDoctrine()->getManager();
            $em->persist($registration);
            $em->flush();
            return $this->render('success.html.twig');

        }
        return $this->render('index.html.twig', array(
            'form' => $data_form->createView(),
        ));


    }



}