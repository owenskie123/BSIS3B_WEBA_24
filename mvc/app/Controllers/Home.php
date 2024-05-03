<?php

class Home extends Controller
{
<<<<<<< HEAD
  public function index()
  {
    $this->view('home');
  }
}
=======
public function index()
{
    $user = new User();
    $data = $user->delete('5', 'lastname');
    show($data);

    $user = new User();
    $rows = $user->findAll();
    show($rows);

    




    $this->view('home');
}

}


>>>>>>> MARK
