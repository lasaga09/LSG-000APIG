<?php

namespace App\Controllers;

use Slim\Views\Twig;
use Psr\Log\LoggerInterface;
use PDO;
use Slim\Http\Request;
use Slim\Http\Response;
use App\Models\apiModel;


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
          }elseif($search2->success == true){

          $dt = $search2->result;
      
          $rs = [
            "dni"=>$dt->dni,
            "nombres"=>$dt->nombre,
            "apellidos"=>$dt->paterno ." ". $dt->materno
          ];

          }else{

            $rs='0';
          
          }
          
           
        }else{
            $rs='Content-Type invalid';
        }
  
    	return $this->response->withJson($rs);
    
     

 }


public function monedaletra($request,$response){
       $contentType = $request->getHeaderLine('Content-Type');
     if (strstr($contentType, 'application/json')) {
        $monto = $request->getParsedBody()['amount'];
        $moneda=$request->getParsedBody()['currency'];
        if(is_numeric($monto) && is_numeric($moneda)){
             $rs =apiModel::convertirMonto($monto,$moneda);
        }else{
            $rs='invalid values';
        }
       
    
     }else{
        $rs='request invalid';
     }
      return  $this->response->withJson($rs);
    
}






}