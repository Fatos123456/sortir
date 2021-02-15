<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegisterType;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Container\ContainerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;


class UserController extends AbstractController
{

    /**
     * @Route("/register", name="user_register")
     */
    public function register(Request $request, EntityManagerInterface $em, UserPasswordEncoderInterface $encoder)
    {
        $user = new User();

        $registerForm = $this->createForm(RegisterType::class, $user);

        $registerForm->handleRequest($request);
        if ($registerForm->isSubmitted() && $registerForm->isValid()) {
            //hasher le mdp OBLIGATOIRE
            $hashed = $encoder->encodePassword($user, $user->getPassword());
            $user->setPassword($hashed);

            $em->persist($user);
            $em->flush();

        }

        return $this->render("user/register.html.twig", [
            "registerForm" => $registerForm->createView()

        ]);
    }

    /**
     * @Route("/profil", name="profil")
     */
    public function profil()
    {

        $userRepo = $this->getDoctrine()->getRepository(User::class);
        $user = $userRepo->findAll();

        return $this->render('user/profil.html.twig', [
            "user" => $user
        ]);
    }

    /**
     * @Route("/user/login", name="login")
     */
    public function login()
    {

        //$this->addFlash('success', 'Vous êtes connecté');


        return $this->render('user/login.html.twig', []);
    }

    /**
     * @Route("/logout", name="logout")
     */
    public function logout()
    {
        //symfony gère entierement cette route
    }

    public function accountInfo()
    {
        // allow any authenticated user - we don't care if they just
        // logged in, or are logged in via a remember me cookie
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_REMEMBERED');

        // ...
    }

    public function resetPassword()
    {
        // require the user to log in during *this* session
        // if they were only logged in via a remember me cookie, they
        // will be redirected to the login page
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');

        // ...
    }



}
