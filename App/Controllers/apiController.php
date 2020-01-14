<?php

namespace App\Controllers;

use Slim\Views\Twig;
use Psr\Log\LoggerInterface;
use PDO;
use Slim\Http\Request;
use Slim\Http\Response;


class apiController{

 protected $container;


 public function __construct($container){
      $this->container = $container;
 }  

 public function __get($property)
 {
    if ($this->container->{$property}) {
        return $this->container->{$property};
    }
 }

 public function list($request, $response){
    $reniec = new \jossmp\reniec\padron(); // Padron electoral RENIEC
    $jne = new \jossmp\jne\rop(); // Registro de Org. Politicas JNE

    $contentType = $request->getHeaderLine('Content-Type');
     if (strstr($contentType, 'application/json')) {

          $dni = $request->getParsedBody()['dni'];
          
          $search1 = $reniec->consulta( $dni );
          $search2 = $jne->consulta( $dni );
          
          if( $search1->success == true )
          {
            $rs = $search1->result;
          }else{
            $rs='0';
          }
          
         /* if( $search2->success == true )
          {
          $rs = $search2->result;
          }*/
           
        }else{
            $rs='Content-Type invalid';
        }

  
    	return $this->response->withJson($rs);
    
     

 }




}