<?php

class Session
{
    public function startSession(){
        session_start();
    }

    public function killSessions(){
        session_destroy();
    }

    public function unsetSession($sessionVar){
        unset($sessionVar);
    }

}