<?php

use Phalcon\Mvc\Controller;
class GetbookController extends Controller
{ 
    public function indexAction()
    {
       
    }

    public function searchAction()
    {
        $book = $this->request->get('searchBook');
        $book = urlencode($book);
        $bookresult = $this->api->searchBook($book);
        $this->session->set('detail',$bookresult['docs']);
        $this->view->bookresult = $bookresult['docs'];
    }
    public function detailsAction()
    {
         
         $isbn = $this->request->get('isbn');
         $data =$this->api->getIsbn($isbn);
         $book = $this->session->get('detail');
         $this->view->book = $book[$this->request->get('key')];
         $this->view->data = $data;
    }
   
}
