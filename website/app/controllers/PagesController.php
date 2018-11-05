<?php
namespace App\Controllers;
class PagesController
{

  public function home()
  {
     $title = 'Home';
     return view('index',compact('title'));
  }
  public function about()
  {
    $title = 'About';
    return view('about',compact('title'));
  }
  public function twod_view()
  {
    $title = '2D View';
    return view('2d_view',compact('title'));
  }
  public function data()
  {
      //die(var_dump($_GET['date']));
      $grain = $_GET['date'];
      $title = 'About';
      return view('data',compact('title'));
  }
  public function threed_view()
  {
      $title = '3D View';
      return view('3d_view',compact('title'));
  }


}

 ?>
