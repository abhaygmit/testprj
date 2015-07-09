<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

$route['default_controller'] = "home";

$route['([a-zA-Z0-9-_]+).html'] = "home/about_us/1";
$route['([a-zA-Z0-9-_]+).html'] = "home/help/9";
$route['([a-zA-Z0-9-_]+).html'] = "home/faq/6";

/*$route['articles/([a-zA-Z0-9-_%.@]+)-([a-zA-Z0-9-]+).html'] = "articlesdetails/view/$2";

$route['view-more.html'] = "viewmore";

$route['([a-zA-Z0-9-_]+).html'] = "photo/photopage/$1";
$route['([a-zA-Z0-9-_]+)/([a-zA-Z0-9-_]+).html'] = "photo/photopage/$1/$2";

$route['news-list.html'] = "newsinfo";
$route['news/([a-zA-Z0-9-_%.@]+)-([a-zA-Z0-9-]+).html'] = "newsinfo/newsdetails/$2";*/

/*$route['gallery/product/([0-9])'] = "photo/photopage/$1";
$route['gallery/portraiture-and-events/([0-9])'] = "photo/photopage/$1";
$route['gallery/architecture/([0-9])'] = "photo/photopage/$1";

$route['gallery/aerial/aerial-photography/([0-9])/([0-9])'] = "photo/photopage/$1/$2";

$route['gallery/aerial/aerial-hd-video/([0-9])/([0-9])'] = "photo/photopage/$1/$2";

$route['gallery/product/still-products/([0-9])/([0-9])'] = "photo/photopage/$1/$2";

$route['gallery/product/3D-rotating-images/([0-9])/([0-9])'] = "photo/photopage/$1/$2";

$route['gallery/product/food/([0-9])/([0-9])'] = "photo/photopage/$1/$2";

$route['gallery/portraiture-and-events/commercial-portraits/([0-9])/([a-zA-Z0-9-_]+)'] = "photo/photopage/$1/$2";

$route['gallery/portraiture-and-events/corporate-events/([0-9])/([a-zA-Z0-9-_]+)'] = "photo/photopage/$1/$2";

$route['gallery/portraiture-and-events/school-formals/([0-9])/([a-zA-Z0-9-_]+)'] = "photo/photopage/$1/$2";

$route['gallery/portraiture-and-events/school-groups-portraits/([0-9])/([a-zA-Z0-9-_]+)'] = "photo/photopage/$1/$2";

$route['gallery/portraiture-and-events/preschool-groups-portraits/([0-9])/([a-zA-Z0-9-_]+)'] = "photo/photopage/$1/$2";

$route['gallery/portraiture-and-events/sports-teams/([0-9])/([a-zA-Z0-9-_]+)'] = "photo/photopage/$1/$2";

$route['gallery/architecture/residential-property/([0-9])/([a-zA-Z0-9-_]+)'] = "photo/photopage/$1/$2";

$route['gallery/architecture/commercial-property/([0-9])/([a-zA-Z0-9-_]+)'] = "photo/photopage/$1/$2";

$route['gallery/architecture/structures/([0-9])/([a-zA-Z0-9-_]+)'] = "photo/photopage/$1/$2";

*/
$route['404_override'] = '';


/* End of file routes.php */
/* Location: ./application/config/routes.php */