<?php 
namespace App\Controllers;

// Recursos Necessarios
use MF\Controller\Action;
use MF\Model\Container;
// Models


class AppController extends Action{
    
    public function timeline(){

        session_start();

        if($_SESSION['id'] != '' && $_SESSION['nome'] != ''){
            $this->render('Timeline');
        }else{
            header('Location: /?login=erro');
        }
    }
}
?>