<?php


$app->get('/', function ($request, $response, $args) {
  return $this->renderer->render($response, 'index.phtml', $args);
});



$app->group('/api/v1',function()use($app){
   
    $app->group('/ubigeo',function()use($app){
	$app->get('/distrito','App\Controllers\GeneralController:select_distrito');
    ;
    });

     $app->group('/general',function()use($app){
     $app->post('/reniec','App\Controllers\apiController:list');
     $app->post('/test','App\Controllers\apiController:listtest');
    ;
    });
	
	

    
});