<?php

class Router{
    public static function redirect (string $action = "default", bool $isConnected = false){
        
        switch($action){
            case 'connexion':
                if($isConnected){
                    require(CONTROLER .'/backoffice.php');
                }
                else{
                   require(CONTROLER . '/connexion.php'); 
                }
                break;

            case 'backoffice':
                if($isConnected){
                    require(CONTROLER .'/backoffice.php');
                }
                else{
                   require(CONTROLER . '/connexion.php'); 
                }
                break;
                
            default:
                require(CONTROLER . '/form-questionnaire_ctl.php');

                
        }
    }
}