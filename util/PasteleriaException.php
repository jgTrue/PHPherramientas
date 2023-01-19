<?php 

class PasteleriaException extends Exception{
    public function __construct(
        $message,
        $code = 0,
        Exception $previa = null)
    {
        parent::__construct($message,$code,$previa);
    }

    public function messageException(){
        return $this->message;
    }
}