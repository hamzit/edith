<?php

namespace HamzaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use HamzaBundle\Entity\Templates;

class WelcomeController extends Controller
{


  // display main
  public function welcomeAction(Request $request){

    // obtention session
    $session = $request->getSession();
    if ( $session->has('id')){ // si le session est valid
      $content = $this->renderView('@HamzaBundle/Default/home.html.twig');

      $content = $this->forward('HamzaBundle:Welcome:load');
      return $content;

    } else { // si le session n'est pas valid, redirect to root
      $form1 = $this->get('form.factory')
      ->createNamedBuilder('login', 'form',null, array('attr' => array('id' => 'login-form')))
      ->getForm();

      $content = $this->renderView('@HamzaBundle/Default/index.html.twig',
      array('error' => 'Not authenticated!',
      'login' => $form1->createView())
    );
    return new Response($content);

  }



}


// Template Loading
public function loadAction(Request $request){
  //session
  $session = $request->getSession();
  $id = $session->get('id');
  $lname = $session->get('name');
  // get User
  $user = $this->getDoctrine()->getRepository("HamzaBundle:Utilisateur")->
  findBy(array("id" => $id));

  if($user){ // si user exist
    // $template1 = $this->getDoctrine()->getRepository("HamzaBundle:Utilisateur")->
    // findOneBy(array("identification" => $id,"LastName" => $lname,"templateID" => '1'));

    $templates = $this->getDoctrine()->getRepository("HamzaBundle:Templates")->
    findBy(array("identification" => $id,"lname" => $lname));

    $content = $this->renderView('@HamzaBundle/Default/home.html.twig',
    array('users' => $templates)
  );



}else {
  $form1 = $this->get('form.factory')
  ->createNamedBuilder('login', 'form',null, array('attr' => array('id' => 'login-form')))
  ->getForm();
  $content = $this->renderView('@HamzaBundle/Default/index.html.twig',
  array('error' =>   $lname,'login' => $form1->createView()));

}

return new Response($content);

}


// set chosen Template in session
public function setTemplateAction(Request $request){

  $session = $request->getSession();
  if ( $session->has('id')){ // si l'utilisateur est authenticated
    $session = $request->getSession();
    $session->set('template', $request->request->get('template'));

    //************* Recuperation des templates
    $id = $request->getSession()->get('id');
    $lname = $request->getSession()->get('name');

    $alltemplates = $this->getDoctrine()->getRepository("HamzaBundle:Templates")->
    findBy(array("identification" => $id));

    //  $myresponse = "Template SET : " . $request->request->get('template');

    //  RETURN CHOSEN TEMPLATE
    $templatenum = $request->request->get('template');
    if ($templatenum == 1){

      $template =  $this->render('@HamzaBundle/Default/template1.html.twig',
      array('users' => $alltemplates))->getContent();


    } else {

      $template =  $this->render('@HamzaBundle/Default/template2.html.twig',
      array('users' => $alltemplates))->getContent();

    }
    $myresponse =new JsonResponse($template);
    return $myresponse;

  } else {
    $form1 = $this->get('form.factory')
    ->createNamedBuilder('login', 'form',null, array('attr' => array('id' => 'login-form')))
    ->getForm();

    $content = $this->renderView(
      '@HamzaBundle/Default/index.html.twig',array('error' => 'Not authenticated!', 'login' => $form1->createView())
    );
    return new Response($content);

  }







}


// Update de Lettre de motivation
public function updateAction(Request $request){

  $session = $request->getSession();
  if ( $session->has('id')){
    // if authenticateds
    // get session variables
    $session = $request->getSession();
    $id = $session->get('id');
    $lname = $session->get('name');
    $templateNum = $session->get('template');


    $userManager = $this->getDoctrine()->getManager();
    $template = $userManager->getRepository("HamzaBundle:Templates")->
    findOneBy(array("identification" => $id,"templateID" => $templateNum));


    // $user = new Templates();
    $template->setFname($request->request->get('fname'));
    $template->setLname($request->request->get('lname'));
    $template->setStatus($request->request->get('status'));
    $template->setAddress($request->request->get('adress'));
    $template->setTel($request->request->get('tel'));
    $template->setEmail($request->request->get('email'));
    $template->setTowhom($request->request->get('to'));
    $template->setDear($request->request->get('dear'));
    $template->setTextone($request->request->get('message1'));
    $template->setTexttwo($request->request->get('message2'));
    $template->setTextthree($request->request->get('message3'));
    $template->setGreetings($request->request->get('cordialement'));
    $template->setSignature($request->request->get('signature'));

    $userManager->flush();

    $data = ['fname' => $request->request->get('fname'),
    'lname' => $request->request->get('lname'),
    'status' => $request->request->get('status'),
    'adress' => $request->request->get('adress'),
    'tel' => $request->request->get('tel'),
    'email' => $request->request->get('email'),
    'to' => $request->request->get('to'),
    'dear' => $request->request->get('dear'),
    'message1' => $request->request->get('message1'),
    'message2' => $request->request->get('message2'),
    'message3' => $request->request->get('message3'),
    'cordialement' => $request->request->get('cordialement'),
    'signature' => $request->request->get('signature'),
  ];



  // return new JsonResponse($myresponse);
  $receivedData = $request->request->all();

  // var_dump($receivedData);


  return new JsonResponse($data);

} else {
  $form1 = $this->get('form.factory')
  ->createNamedBuilder('login', 'form',null, array('attr' => array('id' => 'login-form')))
  ->getForm();

  $content = $this->renderView(
    '@HamzaBundle/Default/index.html.twig',array('error' => 'Not authenticated!', 'login' => $form1->createView())
  );
  return new Response($content);

}


}


//Generate pdf


  // display main
  public function pdfAction(Request $request){

    $session = $request->getSession();

    if ( $session->has('id')){ // si l'utilisateur est authenticated
      $session = $request->getSession();

      //************* Recuperation des templates
      $id = $request->getSession()->get('id');

      $alltemplates = $this->getDoctrine()->getRepository("HamzaBundle:Templates")->
      findBy(array("identification" => $id));

      //  $myresponse = "Template SET : " . $request->request->get('template');

      //  RETURN CHOSEN TEMPLATE
      $templatenum = $request->request->get('template');
      if ($templatenum == 1){

        $template =  $this->render('@HamzaBundle/Default/template1.html.twig',
        array('users' => $alltemplates));

        $filename = sprintf('test-%s.pdf', date('Y-m-d'));



      } else {

        $template =  $this->render('@HamzaBundle/Default/template1.html.twig',
        array('users' => $alltemplates));

        $filename = sprintf('test-%s.pdf', date('Y-m-d'));

      }


      return new Response($this->get('knp_snappy.pdf')->getOutputFromHtml($template), 200,
                          ['Content-Type'=> 'application/pdf',
                           'Content-Disposition' => sprintf('attachment; filename="%s"', $filename),]
      );

    } else {
      $form1 = $this->get('form.factory')
      ->createNamedBuilder('login', 'form',null, array('attr' => array('id' => 'login-form')))
      ->getForm();

      $content = $this->renderView(
        '@HamzaBundle/Default/index.html.twig',array('error' => 'Not authenticated!', 'login' => $form1->createView())
      );
      return new Response($content);

    }




}






}
