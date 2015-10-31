<?php
namespace MusicBundle\Controller;
use MusicBundle\MusicBundle;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Filesystem\Exception\IOExceptionInterface;

class MusicController extends Controller
{

    public function __construct()
    {
        /*$item = new Item();
        $item->setTitle('titel construct');
        var_dump($item);
        exit;*/

        /*$MusicItems = $this->getDoctrine()->getRepository('MusicBundle:Item')->findAll();
        var_dump($products);
        exit('test');*/
    }


    public function indexAction()
    {
        $dir = 'media/';
        $files = $this->getFiles($dir);

        $postFiles = $this->get('request')->request->get('files');

        if($postFiles != null){
            $fs = new Filesystem();
            $i = 100;
            foreach($postFiles as $postFile){

                if($fs->exists($dir . $postFile)){
                    $newTitle = $this->getFileTitle($postFile);
                    $newTitle = $i . ' '  . $newTitle;
                    if(!$fs->exists($dir . $newTitle)){
                        $fs->rename($dir . $postFile, $dir . $newTitle);
                    }
                    $i++;
                }
            }
        }


        $files = $this->getFiles($dir);
        $i = 1;
        $musicItems = array();
        foreach($files as $file){
            $musicItems[$i]['id'] = $i;
            $musicItems[$i]['file'] = $file;
            $musicItems[$i]['search'] = urlencode(trim($this->getAuthor($file) . ' ' . $this->getNumberTitle($file)));
            $musicItems[$i]['author'] = $this->getAuthor($file);
            $musicItems[$i]['title'] = $this->getNumberTitle($file);
            $i++;
        }


        return $this->render(
            'MusicBundle:Music:index.html.twig',
            array('musicItems' => $musicItems)
        );
    }

    public function hadIndex($file){
        $firstCar = substr($file, 0, 3);
        return is_numeric(trim($firstCar));
    }

    public function getFileTitle($file){

        if($this->hadIndex($file)){
            $firstCar = substr($file, 0, 3);
            $index = trim($firstCar);

            $title = str_replace($index,'',$file);
            return trim($title);
        } else {
            return trim($file);
        }
    }

    public function getAuthor($file){
        $titlePieces = explode(' - ', $file);
        if(count($titlePieces) > 1){
            return $this->getFileTitle($titlePieces[0]);
        }
        return '';
    }

    public function getNumberTitle($file){
        $author = $this->getAuthor($file);
        return str_replace(array(' - ', '.mp3', $author), '', $this->getFileTitle($file));
    }

    public function getFiles($dir){
        return array_diff(scandir($dir), array('..', '.'));
    }
}