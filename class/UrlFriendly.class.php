<?php

class UrlFriendly{

    private $u_friendly;

    

    public function __construct($param){

        
        if ($param[0]) :

            if(file_exists($param[0].'.php')) :

                $this->u_friendly = $param[0].'.php';

            else :

                $this->u_friendly = '404.php';
                //die(json_encode(array('message' => 'Parametro inválido.')));


            endif;

        else :

            $this->u_friendly = 'index.php';
            

        endif;


    }


    public function __toString(){

        return $this->u_friendly;
    }


    
}

