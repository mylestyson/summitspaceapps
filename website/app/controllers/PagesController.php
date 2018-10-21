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
  public function data()
  {
      //die(var_dump($_GET['date']));
      $grain = $_GET['date'];
      return view('data',$grain);
  }
  public function threed_view()
  {

      return view('3d_view');
  }


}

 ?>
