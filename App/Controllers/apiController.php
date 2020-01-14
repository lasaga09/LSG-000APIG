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

 public function listtest($request,$response){
     $contentType = $request->getHeaderLine('Content-Type');
     if (strstr($contentType, 'application/json')) {
    

$rs = array(
    array("id"=>1,"nombre"=>"Samson","edad"=>90,"telefono"=>"16011123 4142"),
    array("id"=>2,"nombre"=>"Logan","edad"=>23,"telefono"=>"16820405 6405"),
    array("id"=>3,"nombre"=>"Jarrod","edad"=>37,"telefono"=>"16421003 0070"),
    array("id"=>4,"nombre"=>"Eliana","edad"=>100,"telefono"=>"16020530 3258"),
    array("id"=>5,"nombre"=>"Reese","edad"=>15,"telefono"=>"16680910 3556"),
    array("id"=>6,"nombre"=>"Quincy","edad"=>37,"telefono"=>"16100902 7655"),
    array("id"=>7,"nombre"=>"Kenyon","edad"=>66,"telefono"=>"16740616 0643"),
    array("id"=>8,"nombre"=>"Yvette","edad"=>10,"telefono"=>"16000723 2382"),
    array("id"=>9,"nombre"=>"Heather","edad"=>99,"telefono"=>"16360316 7432"),
    array("id"=>10,"nombre"=>"Malcolm","edad"=>13,"telefono"=>"16450327 0649"),
    array("id"=>11,"nombre"=>"Cheyenne","edad"=>74,"telefono"=>"16020909 3087"),
    array("id"=>12,"nombre"=>"Forrest","edad"=>97,"telefono"=>"16040210 5605"),
    array("id"=>13,"nombre"=>"Jin","edad"=>75,"telefono"=>"16411223 8110"),
    array("id"=>14,"nombre"=>"Randall","edad"=>99,"telefono"=>"16540210 4508"),
    array("id"=>15,"nombre"=>"Jesse","edad"=>29,"telefono"=>"16561201 0271"),
    array("id"=>16,"nombre"=>"Carly","edad"=>27,"telefono"=>"16040411 8564"),
    array("id"=>17,"nombre"=>"Josiah","edad"=>23,"telefono"=>"16140214 5104"),
    array("id"=>18,"nombre"=>"Sylvia","edad"=>71,"telefono"=>"16860115 4548"),
    array("id"=>19,"nombre"=>"Tate","edad"=>80,"telefono"=>"16170908 1713"),
    array("id"=>20,"nombre"=>"Hamilton","edad"=>85,"telefono"=>"16330108 7742"),
    array("id"=>21,"nombre"=>"Declan","edad"=>81,"telefono"=>"16130228 6768"),
    array("id"=>22,"nombre"=>"Pandora","edad"=>53,"telefono"=>"16420108 6172"),
    array("id"=>23,"nombre"=>"Theodore","edad"=>64,"telefono"=>"16980126 1042"),
    array("id"=>24,"nombre"=>"Joan","edad"=>91,"telefono"=>"16220628 4073"),
    array("id"=>25,"nombre"=>"Carol","edad"=>81,"telefono"=>"16270128 2663"),
    array("id"=>26,"nombre"=>"Giselle","edad"=>96,"telefono"=>"16920301 0815"),
    array("id"=>27,"nombre"=>"Kennan","edad"=>45,"telefono"=>"16451228 1512"),
    array("id"=>28,"nombre"=>"Thane","edad"=>14,"telefono"=>"16740306 3857"),
    array("id"=>29,"nombre"=>"Amal","edad"=>32,"telefono"=>"16110408 4122"),
    array("id"=>30,"nombre"=>"Maryam","edad"=>89,"telefono"=>"16100219 7950"),
    array("id"=>31,"nombre"=>"Lisandra","edad"=>73,"telefono"=>"16060302 4522"),
    array("id"=>32,"nombre"=>"Victor","edad"=>16,"telefono"=>"16340418 5286"),
    array("id"=>33,"nombre"=>"Quincy","edad"=>79,"telefono"=>"16700817 5775"),
    array("id"=>34,"nombre"=>"Adrian","edad"=>35,"telefono"=>"16730516 8978"),
    array("id"=>35,"nombre"=>"Aphrodite","edad"=>44,"telefono"=>"16480927 7199"),
    array("id"=>36,"nombre"=>"Gary","edad"=>83,"telefono"=>"16681119 4320"),
    array("id"=>37,"nombre"=>"Adele","edad"=>18,"telefono"=>"16940403 0596"),
    array("id"=>38,"nombre"=>"Nomlanga","edad"=>28,"telefono"=>"16480906 7723"),
    array("id"=>39,"nombre"=>"Joseph","edad"=>70,"telefono"=>"16350814 1821"),
    array("id"=>40,"nombre"=>"Colleen","edad"=>19,"telefono"=>"16530729 8454"),
    array("id"=>41,"nombre"=>"Brian","edad"=>60,"telefono"=>"16071102 3507"),
    array("id"=>42,"nombre"=>"Fiona","edad"=>89,"telefono"=>"16570513 9920"),
    array("id"=>43,"nombre"=>"William","edad"=>54,"telefono"=>"16400205 3645"),
    array("id"=>44,"nombre"=>"Adam","edad"=>76,"telefono"=>"16911218 8892"),
    array("id"=>45,"nombre"=>"Ferdinand","edad"=>63,"telefono"=>"16370704 8751"),
    array("id"=>46,"nombre"=>"Sebastian","edad"=>33,"telefono"=>"16250710 8609"),
    array("id"=>47,"nombre"=>"Idola","edad"=>60,"telefono"=>"16111102 7544"),
    array("id"=>48,"nombre"=>"Benjamin","edad"=>54,"telefono"=>"16150928 8096"),
    array("id"=>49,"nombre"=>"Rhiannon","edad"=>61,"telefono"=>"16810409 8531"),
    array("id"=>50,"nombre"=>"Tanek","edad"=>77,"telefono"=>"16160725 3877"),
    array("id"=>51,"nombre"=>"Ayanna","edad"=>53,"telefono"=>"16330915 3488"),
    array("id"=>52,"nombre"=>"Oprah","edad"=>59,"telefono"=>"16110625 5720"),
    array("id"=>53,"nombre"=>"Kimberley","edad"=>69,"telefono"=>"16370802 8927"),
    array("id"=>54,"nombre"=>"Hamish","edad"=>63,"telefono"=>"16240305 8296"),
    array("id"=>55,"nombre"=>"Ifeoma","edad"=>90,"telefono"=>"16110624 4690"),
    array("id"=>56,"nombre"=>"Laith","edad"=>72,"telefono"=>"16440306 1247"),
    array("id"=>57,"nombre"=>"Rachel","edad"=>84,"telefono"=>"16600603 9124"),
    array("id"=>58,"nombre"=>"Nehru","edad"=>92,"telefono"=>"16990317 7245"),
    array("id"=>59,"nombre"=>"Mason","edad"=>86,"telefono"=>"16360809 2882"),
    array("id"=>60,"nombre"=>"Brendan","edad"=>67,"telefono"=>"16370509 4518"),
    array("id"=>61,"nombre"=>"Remedios","edad"=>36,"telefono"=>"16361124 7218"),
    array("id"=>62,"nombre"=>"Melanie","edad"=>46,"telefono"=>"16121018 3982"),
    array("id"=>63,"nombre"=>"Olga","edad"=>13,"telefono"=>"16840106 5423"),
    array("id"=>64,"nombre"=>"Darrel","edad"=>29,"telefono"=>"16400113 2127"),
    array("id"=>65,"nombre"=>"August","edad"=>11,"telefono"=>"16180826 1380"),
    array("id"=>66,"nombre"=>"Mariko","edad"=>96,"telefono"=>"16910408 4570"),
    array("id"=>67,"nombre"=>"Hasad","edad"=>53,"telefono"=>"16971106 3561"),
    array("id"=>68,"nombre"=>"Pearl","edad"=>36,"telefono"=>"16350412 7667"),
    array("id"=>69,"nombre"=>"Nash","edad"=>100,"telefono"=>"16060101 1075"),
    array("id"=>70,"nombre"=>"Geoffrey","edad"=>88,"telefono"=>"16471223 2091"),
    array("id"=>71,"nombre"=>"Kylee","edad"=>75,"telefono"=>"16270519 8915"),
    array("id"=>72,"nombre"=>"Brett","edad"=>92,"telefono"=>"16580501 5244"),
    array("id"=>73,"nombre"=>"Brody","edad"=>64,"telefono"=>"16810622 5108"),
    array("id"=>74,"nombre"=>"Yvonne","edad"=>65,"telefono"=>"16460918 3381"),
    array("id"=>75,"nombre"=>"Kiona","edad"=>43,"telefono"=>"16380708 8624"),
    array("id"=>76,"nombre"=>"Akeem","edad"=>91,"telefono"=>"16650224 7684"),
    array("id"=>77,"nombre"=>"Tanya","edad"=>54,"telefono"=>"16430902 1766"),
    array("id"=>78,"nombre"=>"Octavius","edad"=>69,"telefono"=>"16060103 6981"),
    array("id"=>79,"nombre"=>"Madonna","edad"=>71,"telefono"=>"16850308 2367"),
    array("id"=>80,"nombre"=>"Armand","edad"=>63,"telefono"=>"16890607 9754"),
    array("id"=>81,"nombre"=>"Brittany","edad"=>27,"telefono"=>"16140220 1923"),
    array("id"=>82,"nombre"=>"Kathleen","edad"=>27,"telefono"=>"16321129 8702"),
    array("id"=>83,"nombre"=>"Margaret","edad"=>97,"telefono"=>"16140818 0709"),
    array("id"=>84,"nombre"=>"Wade","edad"=>95,"telefono"=>"16430201 6847"),
    array("id"=>85,"nombre"=>"Darrel","edad"=>55,"telefono"=>"16300815 5172"),
    array("id"=>86,"nombre"=>"Yolanda","edad"=>50,"telefono"=>"16330211 1459"),
    array("id"=>87,"nombre"=>"Hamilton","edad"=>26,"telefono"=>"16841022 5992"),
    array("id"=>88,"nombre"=>"Jasper","edad"=>100,"telefono"=>"16440417 6804"),
    array("id"=>89,"nombre"=>"Renee","edad"=>15,"telefono"=>"16590913 8868"),
    array("id"=>90,"nombre"=>"Bryar","edad"=>68,"telefono"=>"16100502 2593"),
    array("id"=>91,"nombre"=>"Edward","edad"=>97,"telefono"=>"16231007 1739"),
    array("id"=>92,"nombre"=>"Aileen","edad"=>93,"telefono"=>"16651126 4522"),
    array("id"=>93,"nombre"=>"Irene","edad"=>76,"telefono"=>"16701121 4611"),
    array("id"=>94,"nombre"=>"Julie","edad"=>73,"telefono"=>"16330704 4879"),
    array("id"=>95,"nombre"=>"Phillip","edad"=>10,"telefono"=>"16440425 7943"),
    array("id"=>96,"nombre"=>"Tyrone","edad"=>23,"telefono"=>"16910513 3145"),
    array("id"=>97,"nombre"=>"Tamekah","edad"=>75,"telefono"=>"16220122 7069"),
    array("id"=>98,"nombre"=>"Britanni","edad"=>90,"telefono"=>"16770216 1717"),
    array("id"=>99,"nombre"=>"Roth","edad"=>46,"telefono"=>"16960628 8687"),
    array("id"=>100,"nombre"=>"Tamekah","edad"=>15,"telefono"=>"16310109 7404")
);



     }else{
        $rs = 's';

     }
     return $this->response->withJson($rs);

 }




}