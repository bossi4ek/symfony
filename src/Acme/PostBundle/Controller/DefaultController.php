<?php

namespace Acme\PostBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Acme\PostBundle\Entity\Post;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $post = $this->getDoctrine()->getRepository('AcmePostBundle:Post')->findAll();
//        if (!$post) {
//            throw $this->createNotFoundException('Post not found');
//        }
//        else {
            return $this->render('AcmePostBundle:Default:index.html.twig', array('post' => $post));
//        }
    }

    public function addAction()
    {
        $post = new Post();
        $post->setTitle($this->generateRandomString());
        $post->setDescription($this->generateRandomString(50));
        $post->setUnsername($this->generateRandomString());
        $post->setDateCreate(time());

        $em = $this->getDoctrine()->getManager();
        $em->persist($post);
        $em->flush();

        return new Response('Created new post with id '.$post->getId().'<br/><br/><a href="'.$this->generateUrl('post_homepage').'">back</a>');
    }

    public function updateAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $post = $em->getRepository('AcmePostBundle:Post')->find($id);

        if (!$post) {
            throw $this->createNotFoundException('No post found for id '.$id);
        }

        $post->setTitle($this->generateRandomString());
        $post->setDescription($this->generateRandomString(50));
        $em->flush();

        return $this->redirect($this->generateUrl('post_homepage'));
    }

    public function delAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $post = $em->getRepository('AcmePostBundle:Post')->findOneById($id);
        $em->remove($post);
        $em->flush();

        return $this->redirect($this->generateUrl('post_homepage'));
    }

    //Рандомный string
    public function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ ';
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, strlen($characters) - 1)];
        }
        return $randomString;
    }
}
