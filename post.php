<?php

class Post 
{
    private $error = "";
    public function create_post($data){
        if(!empty($data['post']))
        {

        }else{
            $this->error = "Please type something to post!<br>";
        }

        return $this->error;
    }
}