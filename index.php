<?php
    require_once './Router.php';
   // echo Router::class;
    require_once './controller/CitaController.php';
    //echo CitaController::class;
   
    $router =new Router();
    //$router->get('inicio', [CitaController::class,'index']);
    $router->get('index.php', [new CitaController,'index']);
    $router->get('inicio', [new CitaController,'index']);
    $router->post('cita/guardar', [new CitaController,'guardar']);
    $router->get('cita/listar', [new CitaController,'listar']);
    $router->post('cita/listar', [new CitaController,'listar']);
    $router->get('cita/editar', [new CitaController,'editar']); 
    $router->post('cita/editar', [new CitaController,'editar']); 
    $router->get('cita/nuevo', [new CitaController,'nuevo']); 
    $router->post('cita/nuevo', [new CitaController,'nuevo']); 
    $router->get('cita', 'fun_cita');
    $router->comprobarRutas();
?>