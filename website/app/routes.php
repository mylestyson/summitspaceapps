<?php
$router->get('', 'PagesController@home');
$router->get('about', 'PagesController@about');
$router->get('2d_view', 'PagesController@twod_view');
$router->get('3d_view', 'PagesController@threed_view');
$router->get('data', 'PagesController@data');
