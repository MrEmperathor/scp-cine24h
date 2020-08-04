<?php 
error_reporting(E_ERROR | E_WARNING | E_PARSE);

include 'class.php';

$url = $_GET['url'];

$class = new PedirEnlaces();

if (preg_match('/peliculas\/page/', parse_url($url, PHP_URL_PATH))) {
    $urls = $class->ListarEnlaces($url);
    $pelis = array();
    foreach ($urls as $key => $i) {
        $pelis[$key] = $class->AbrirPeli($i);
    }
    echo json_encode($pelis);

}elseif (isset($_GET["name"])) {
    $nombre_peli = $_GET["name"];
    include('TMDb.php');
 
    $tmdb           = new TMDb('be58b29465062a3b093bc17dacef8bf3', 'es');
    $pelis          = $tmdb->searchMovie($nombre_peli);

    echo json_encode($pelis);
}
else{
    $pelis = array($class->AbrirPeli($url));
    echo json_encode($pelis);

}
// $a = array(
//     "" => array(
//         "name" => "iroman",
//         "id" => "12"
//     ),
//     "item" => array(
//         "name" => "el hombre araa",
//         "id" => "14"
//     ),
//     "item" => array(
//         "name" => "batman",
//         "id" => "20"
//     )

// );

// foreach ($a as $key => $value) {
//     var_dump($value);
// }


// var_dump($class->ListarEnlaces('https://cine24h.net/peliculas/page/35/'));

// $class->AbrirPeli('https://cine24h.net/movie/capitana-marvel-es/');
?>