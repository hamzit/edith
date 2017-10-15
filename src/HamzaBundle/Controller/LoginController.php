<?php

namespace HamzaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;
use Symfony\Component\Security\Http\Event\InteractiveLoginEvent;
use Symfony\Component\HttpFoundation\Response;

use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use HamzaBundle\Entity\Utilisateur;
use HamzaBundle\Entity\Templates;
use Symfony\Component\HttpFoundation\Session\SessionInterface;



class LoginController extends Controller
{


  // manual encoding of authentification
  public function authenticateAction(Request $request,$lname,$fname)
  {

    $form1 = $this->get('form.factory')
    ->createNamedBuilder('login', 'form',null, array('attr' => array('id' => 'login-form')))
    ->getForm();
    // **** debug *******
    //        var_dump($user);
    //        var_dump($pass);


    // manually getting the user
    $user = $this->getDoctrine()->getRepository("HamzaBundle:Utilisateur")->
    findOneBy(array("lname" => $lname, "fname" => $fname));

    // var_dump($this->getDoctrine()->getRepository("HamzaBundle:Utilisateur")->findAll());
    /// End Retrieve user

    // Check if the user exists
    if(!$user){
      $content = $this->renderView('@HamzaBundle/Default/index.html.twig',
      array('error' => 'User Does not exist, Verify Login!','login' => $form1->createView())
    );

    return new Response($content);
  } else {
    // var_dump($user);
    // set and get session attributes
    $session = $request->getSession();
    $session->set('id', $user->getId());
    $session->set('name', $user->getLastName());
    // var_dump($session);

    //redirecting user
    return $this->redirectToRoute('welcome');
  }



}



public function RegisterAction(Request $request,$lname,$fname){
  // TODO : Manuel Form Validation

  $form1 = $this->get('form.factory')
  ->createNamedBuilder('login', 'form',null, array('attr' => array('id' => 'login-form')))
  ->getForm();



  // manually getting the user
  $user = $this->getDoctrine()->getRepository("HamzaBundle:Utilisateur")->
  findOneBy(array("fname" => $fname,"lname" => $lname));


  // Check if the user exists and infos are not empty
  if(!$user and !empty($fname) and !empty($lname) ){

    //getting DB manager
    $userManager = $this->getDoctrine()->getManager();

    //adding user
    $user = new Utilisateur();
    $user->setFirstName($fname);
    $user->setLastName($lname);
    $userManager->persist($user);
    $userManager->flush();

    // adding templates
    $template1 = new Templates();
    $template1->setIdentification($user->getId());
    $template1->setFname($user->getFirstName());
    $template1->setLname($user->getLastName());
    $template1->setTemplateID(1);

    $template2 = new Templates();
    $template2->setIdentification($user->getId());
    $template2->setFname($user->getFirstName());
    $template2->setLname($user->getLastName());
    $template2->setTemplateID(2);

    // tells Doctrine you want to (eventually) save the templates (no queries yet)
    $userManager->persist($template1);
    $userManager->persist($template2);

    // actually executes the queries (i.e. the INSERT query)
    $userManager->flush();


    //redirect
    $content = $this->renderView('@HamzaBundle/Default/index.html.twig',
    array('sucess' => 'User Created, You can Login Now!','login' => $form1->createView()));

  } else { // if User exists
    $content = $this->renderView('@HamzaBundle/Default/index.html.twig',
    array('error' => 'User Already exists or name not valid, Please choose another name!','login' => $form1->createView())
  );

  //return response
  return new Response($content);
}


return new Response($content);
}

public function logoutAction(Request $request){

  // LOGIN FORM
  $form1 = $this->get('form.factory')
  ->createNamedBuilder('login', 'form',null, array('attr' => array('id' => 'login-form')))
  ->getForm();

  // deletes session
  $session = $request->getSession();
  $session->clear(); //here we can now clear the session.

  //redirecting user
  return $this->redirectToRoute('hamza_homepage');
}


}
