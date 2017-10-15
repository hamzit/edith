<?php



namespace HamzaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

use FOS\UserBundle\Model\UserManagerInterface;


class DefaultController extends Controller
{

  public function numberAction(Request $request)
  {
    // MAIN ROUTE /
    // Login form
    $form1 = $this->get('form.factory')
    ->createNamedBuilder('login', 'form',null, array('attr' => array('id' => 'login-form')))
    ->getForm();


    if('POST' === $request->getMethod()) { //Interception de LOGIN / REGISTER

      $task = $request->request->all();

      // var_dump($request->request->all()); // debug

      if ($request->request->has('login-submit')) { //si login Redirect
        $response = $this->forward('HamzaBundle:Login:authenticate', array(
          'lname'  => $task['Lastname'],
          'fname' => $task['Firstname'],
        ));
        return $response;
      }

      if ($request->request->has('register-submit')) { //si register Redirect

        $response = $this->forward('HamzaBundle:Login:register', array(
          'lname'  => $task['Lastname'],
          'fname' => $task['Firstname'],
        ));
        return $response;
        
      }


    }

    // cas d'ouverture de page normal sans envoie de form
    return $this->render('@HamzaBundle/Default/index.html.twig', ['login' => $form1->createView()]);
  }

}
