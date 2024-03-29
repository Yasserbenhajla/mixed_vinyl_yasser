<?php
namespace App\Controller;

use Twig\Environment;
use function  Symfony\Component\String\u ;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Session\Storage\Proxy\AbstractProxy;

class vinylController extends AbstractController 
{
    #[Route("/",name:'app_homepage')]
    function homepage(Environment $twig) : Response
    {
        $tracks = [
            ['song' => 'Gangsta\'s Paradise', 'artist' => 'Coolio'],
            ['song' => 'Waterfalls', 'artist' => 'TLC'],
            ['song' => 'Creep', 'artist' => 'Radiohead'],
            ['song' => 'Kiss from a Rose', 'artist' => 'Seal'],
            ['song' => 'On Bended Knee', 'artist' => 'Boyz II Men'],
            ['song' => 'Fantasy', 'artist' => 'Mariah Carey'],
        ];
       
        $html= $twig->render ('vinyl/homepage.html.twig',[
            'title'=>'ISET kélibia',
            'tracks'=> $tracks 
        ]);
        return new Response ($html);
    }
    #[Route("/browse/{slug}",name:"app_browse")]
    function browse(string $slug = null) : Response
    {
     $genre=$slug ? u(str_replace("-", " ",$slug))->title(true) : null ;
        return $this->render('vinyl/browse.html.twig',[
                'genre'=> $genre ,
            ]);
    }
}
