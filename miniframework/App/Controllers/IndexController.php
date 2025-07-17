<?php 
namespace App\Controllers;

use MF\Controller\Action;


class IndexController extends Action{
    
    public function index(){
        $this->view->dados = ['teclado', 'gabinete', 'mouse'];
        $this->render('index', 'layout1');
    }
    
    public function sobre(){
        $this->view->dados = ['placa de video', 'fonte', 'memoria ram'];
        $this->render('sobre', 'layout2');
    }
}
?>