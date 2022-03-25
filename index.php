<?php
    require_once './Router.php';
   // echo Router::class;
    require_once './controller/CitaController.php';
    //echo CitaController::class;
   
    $router =new Router();
    //$router->get('inicio', [CitaController::class,'index']);  
    $router->get('inicio', [new CitaController,'index']);  
    $router->get('cita/editar', [new CitaController,'editar']); 
    $router->get('cita', 'fun_cita');
    $router->comprobarRutas();
?>