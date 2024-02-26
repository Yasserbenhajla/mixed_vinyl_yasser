<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use function  Symfony\Component\String\u ;

class vinylController
{
    #[Route("/")]
    function homepage() : Response
    {
        return new Response ("bonjour <strong>DSI22 G1 </strong>");
    }
    #[Route("/browse/{slug}")]
    function browse(string $slug = null) : Response
    {
        if ($slug){
        $title="Genre: ".u(str_replace("-"," ",$slug))->title(true);
        }
        else {
            $title="all Genre";
        }
            return new Response ($title);
    }
}

?> 