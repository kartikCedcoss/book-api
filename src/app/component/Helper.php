<?php

namespace App\Component;


class Helper 
{
    public function searchBook($book){
        $url = "https://openlibrary.org/search.json?q=$book&mode=ebooks&has_fulltext=true";
        $response = $this->getResponse($url);
        return $response;
         
    }
    public function getIsbn($isbn){
        $url = "https://openlibrary.org/api/books?bibkeys=ISBN:$isbn&jscmd=details&format=json";
        $response = $this->getResponse($url);
        return $response;
         
    }
    public function getResponse($url){
        $ch = curl_init();
     curl_setopt($ch,CURLOPT_URL,$url);
     curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
      $result = curl_exec($ch);
     $book_arr = json_decode($result,true);
    return $book_arr;
    
   }
}