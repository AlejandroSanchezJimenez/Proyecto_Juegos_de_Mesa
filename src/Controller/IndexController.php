<?php
namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class IndexController extends AbstractController
{
    #[Route('/',name:'landing')]
    public function landing():Response 
    {
        $html = $this->render('header.html.twig');
        return $html;
    } 

    #[Route('/home/{user}')]
    public function request(String $user=null, Request $request):Response 
    {
        $id= $request->query->get('id');
        $html = $this->render('formu.html.twig', ['user' => $user,'id' => $id]);
        return $html;
    } 

    #[Route('/home/{idioma}&{user}', name:"home")] 
    public function home(String $user=null, String $idioma=null):Response
    {
        if ($idioma=="Español")
        {
            $html = $this->render('homepage.html.twig', ['user' => $user]);
            return $html;
        }
        else if ($idioma=="Ingles")
        {
            die("Welcome ".$user);
        }
        return new Response("Welcome");
    } 

    #[Route('/operador/{operador}&{num1}&{num2}', name:'operador')]
    public function opera(String $operador=null,int $num1=null, int $num2=null):Response
    {
        if ($operador=="suma") {
            $resul=$num1+$num2;
        }
        else if ($operador=="resta") {
            $resul=$num1-$num2;
        }
        else if ($operador=="multiplica") {
            $resul=$num1*$num2;
        }
        else if ($operador=="divide") {
            $resul=$num1/$num2;
        }

        die("El resultado es $resul");
    } 
}
?>