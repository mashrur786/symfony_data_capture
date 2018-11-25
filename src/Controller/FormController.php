<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Forms;


class FormController extends AbstractController
{

    /**
     * @Route("/")
     * @Method({"GET"})
     */
    public function show()
    {

        $formFactory = Forms::createFormFactory();
         return $this->render('index.html.twig');
    }
}