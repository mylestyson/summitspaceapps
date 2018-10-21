<?php
namespace App\Controllers;
class PagesController
{

  public function home()
  {
     return view('index');
  }
  public function about()
  {
    return view('about');
  }
  public function twod_view()
  {
    return view('2d_view');
  }


}

 ?>
