<?php
// error_reporting(E_ERROR | E_WARNING | E_PARSE);
ini_set('error_reporting', E_ALL|E_STRICT);
ini_set('display_errors', '1');

include 'header.php';
if($_GET['url']) {

    function curl($url){

        $userAgent = 'Mozilla/5.0 (Windows NT 5.1; rv:31.0) Gecko/20100101 Firefox/31.0';
        $curl_handle=curl_init();
        curl_setopt($curl_handle, CURLOPT_URL,$url);
        curl_setopt($curl_handle, CURLOPT_CONNECTTIMEOUT, 2);
        curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl_handle, CURLOPT_USERAGENT, $userAgent);
        $salidaEnlacee = curl_exec($curl_handle);
        curl_close($curl_handle);
        return $salidaEnlacee;
    
    }

    $host = 'http://'.$_SERVER['HTTP_HOST'].'/api.php?url='.$_GET['url'];
    $urlTMDB = 'http://'.$_SERVER['HTTP_HOST'].'/api.php?name=';
    // $result = json_decode(file_get_contents($host), true);

    $result = json_decode(curl($host), true);


    $card = '';
    $modal = '';
    $penlaces = '';
    $pdownload = '';
    $pcalidad = '';
    $panel = '';


    foreach ($result as $key => $value) {
        // var_dump($value['items'][0]['titulo']);
        // echo('<pre>');
        // print_r($value[0][0]['items']['0']);
        $url = $value['items'][0]['url'];
        $titulo = $value['items'][0]['titulo'];
        $image = $value['items'][0]['image'];
        $SubTitle = $value['items'][0]['SubTitle'];
        $year = $value['items'][0]['year'];

        $player = $value['items'][0]['enlaces']['player'];
        $checked_esp = '';
        $checked_lat = '';
        $checked_sub = '';
        foreach ($player as $keyi => $pi) {

            if ($keyi == 'VIP👑 ESP - 720HD') {
                $iframe = $pi;
                $idiomavip = $keyi;
                $checked_esp = 'checked';
            }elseif ($keyi == 'VIP👑 LAT - 720HD') {
                $iframe = $pi;
                $idiomavip = $keyi;
                $checked_lat = 'checked';
            }elseif ($keyi == 'VIP👑 SUB - 720HD') {
                $iframe = $pi;
                $idiomavip = $keyi;
                $checked_sub = 'checked';
            }
            // if($keyi == 'VIP👑 ESP - 720HD') $iframe = $pi;
            // if($keyi == 'VIP👑 LAT - 720HD') $iframe = $pi;
            // if($keyi == 'VIP👑 SUB - 720HD') $iframe = $pi;
            // $idiomavip = $keyi;
            // $iframe = ($keyi == 'VIP👑 ESP - 720HD') ? $pi : '';
            // $iframe = ($keyi == 'VIP👑 LAT - 720HD') ? $pi : '';
            // $iframe = ($keyi == 'VIP👑 SUB - 720HD') ? $pi : '';
            $penlaces .= $pi;
            
        }
        $download = $value['items'][0]['enlaces']['download'];
        foreach ($download as $kie => $di) {
            $pcalidad .= '<tr><td>'.trim($kie).'</td><td>'.$di.'</td></tr>';
            $pdownload .= $di.'<br>';
        }
        $urlIDTMDB = $urlTMDB . urlencode($SubTitle);
        $reutlt_tmdb = json_decode(curl($urlIDTMDB), true);
        $tmdb_datos = "";
        foreach ($reutlt_tmdb["results"] as $kt => $tmdbr) {
            // echo('<pre>');
            // echo "numenro kt: ". $kt;
            // var_dump($tmdbr);
            // echo('</pre>');
            
            $tmdb_image = ($tmdbr["poster_path"]) ? $tmdbr["poster_path"] : '';
            $tmdb_id = ($tmdbr["id"]) ? $tmdbr["id"] : '';
            $tmdb_title = ($tmdbr["original_title"]) ? $tmdbr["original_title"] : '';
            $tmdb_fecha = (isset($tmdbr["release_date"])) ? $tmdbr["release_date"] : '';

            $tmdb_id_val = ($kt == 0) ? $tmdb_id : '';


            $tmdb_datos .= '<div class="col-lg-4 col-md-6 mb-4">
            <div class="card">
                <div class="view overlay">
                    <img src="https://image.tmdb.org/t/p/w600_and_h900_bestv2'.$tmdb_image.'"
                        class="card-img-top" alt="" />
                    <a href="'.$url.'"
                        target="_blank">
                        <div class="mask rgba-white-slight"></div>
                    </a>
                </div>
                <div class="card-body">
                    <h4 class="card-title">'.$tmdb_id.'</h4>
                    <p class="card-text">
                    '.$tmdb_title.'
                    <strong>'.$tmdb_fecha.'</strong>
                    </p>
                </div>
            </div>
            </div>';

        }
        // echo('<pre>');
        // var_dump($urlIDTMDB);
        // var_dump($reutlt_tmdb);
        // echo('</pre>');
        
        // echo('</>');
        $idtitulo = 'titulo'.$key;
        $idtituloOriginal = 'tituloOriginal'.$key;
        $idano = 'ano'.$key;
        $idtmdb = 'tmdb'.$key;
        $idenlaceD = 'enlaceD'.$key;
        $idid1080 = 'idid1080'.$key;
        $idid720 = 'idid720'.$key;
        $idall = 'idall'.$key;
        $idlat = 'idlat'.$key;
        $idesp = 'idesp'.$key;
        $idsub = 'idsub'.$key;
        $idtextArea = 'idtextArea'.$key;
        $idgenerarComandos = 'idgenerarComandos'.$key;

        // FORMULARIO DENTRO DEL MODAL
        $panel .= '<div class="card">

        <h5 class="card-header info-color white-text text-center py-4">
            <strong>Sign up</strong>
        </h5>

        <!--Card content-->
        <div class="card-body px-lg-5 pt-0">

            <!-- Form -->
            <form class="text-center" style="color: #757575;" action="#!">

                <div class="form-row">
                    <div class="col">
                        <!-- First name -->
                        <div class="md-form">
                            <input type="text" value="'.$titulo.'" id="'.$idtitulo.'" class="form-control">
                            <label for="'.$idtitulo.'">Nombre</label>
                        </div>
                    </div>
                    <div class="col">
                        <!-- Last name -->
                        <div class="md-form">
                            <input type="text" value="'.$SubTitle.'" id="'.$idtituloOriginal.'" class="form-control">
                            <label for="'.$idtituloOriginal.'">Nombre original</label>
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col">
                        <!-- First name -->
                        <div class="md-form">
                            <input type="text" value="'.$year.'" id="'.$idano.'" class="form-control">
                            <label for="'.$idano.'">Año</label>
                        </div>
                    </div>
                    <div class="col">
                        <!-- Last name -->
                        <div class="md-form">
                            <input type="text" value="'.$tmdb_id_val.'" id="'.$idtmdb.'" class="form-control">
                            <label for="'.$idtmdb.'">TMDB</label>
                        </div>
                    </div>
                </div>

                <!-- E-mail -->
                <div class="md-form mt-0">
                    <input type="text" id="'.$idenlaceD.'" class="form-control">
                    <label for="'.$idenlaceD.'">Link Descarga</label>
                </div>

                <div class="form-check form-check-inline">
                    <input type="radio" class="form-check-input" id="'.$idid1080.'" name="inlineMaterialRadiosExample" checked>
                    <label class="form-check-label" for="'.$idid1080.'">1080</label>
                </div>
                
                <!-- Material inline 2 -->
                <div class="form-check form-check-inline">
                    <input type="radio" class="form-check-input" id="'.$idid720.'" name="inlineMaterialRadiosExample">
                    <label class="form-check-label" for="'.$idid720.'">720</label>
                </div>

                <div class="form-check form-check-inline">
                    <input type="radio" class="form-check-input" id="'.$idall.'" name="inlineMaterialRadiosExample">
                    <label class="form-check-label" for="'.$idall.'">All</label>
                </div>

                <div class="form-check form-check-inline">
                    <input type="radio" class="form-check-input" id="'.$idlat.'" name="inlineMaterialRadiosExample11" '.$checked_lat.'>
                    <label class="form-check-label" for="'.$idlat.'">Lat</label>
                </div>
                <div class="form-check form-check-inline">
                    <input type="radio" class="form-check-input" id="'.$idesp.'" name="inlineMaterialRadiosExample11" '.$checked_esp.'>
                    <label class="form-check-label" for="'.$idesp.'">Esp</label>
                </div>
                <div class="form-check form-check-inline">
                    <input type="radio" class="form-check-input" id="'.$idsub.'" name="inlineMaterialRadiosExample11" '.$checked_sub.'>
                    <label class="form-check-label" for="'.$idsub.'">Sub</label>
                </div>
                <pre>'.$idiomavip.'</pre>
                <div class="form-group purple-border">
                    <label for="'.$idtextArea.'">Comando</label>
                    <textarea class="form-control" id="'.$idtextArea.'" rows="3"></textarea>
                </div>

                <!-- Sign up button -->
                <button class="btn btn-outline-info btn-rounded btn-block my-4 waves-effect z-depth-0" type="button" id="'.$idgenerarComandos.'">Generar</button>

                <!-- Social register -->

                <a type="button" class="btn-floating btn-fb btn-sm">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a type="button" class="btn-floating btn-tw btn-sm">
                    <i class="fab fa-twitter"></i>
                </a>
                <a type="button" class="btn-floating btn-li btn-sm">
                    <i class="fab fa-linkedin-in"></i>
                </a>
                <a type="button" class="btn-floating btn-git btn-sm">
                    <i class="fab fa-github"></i>
                </a>

                <hr>

                <!-- Terms of service -->

            </form>
            <!-- Form -->

        </div>

    </div>';

    // TARJETAS PRICIPALES
        $card .= '<div class="col-lg-3 col-md-6 mb-4">
        <!--Card-->
        <div class="card">
            <!--Card image-->
            <div class="view overlay">
                <img src="https:'.$image.'"
                    class="card-img-top" alt="" />
                <a href="'.$url.'"
                    target="_blank">
                    <div class="mask rgba-white-slight"></div>
                </a>
            </div>
        
            <!--Card content-->
            <div class="card-body">
                <!--Title-->
                <h4 class="card-title">'.$titulo.'</h4>
                <!--Text-->
                <p class="card-text">
                '.$SubTitle.'
                '.$year.'
                </p>
                <button type="button" onclick="buscarIdtm(\''.$urlTMDB.'\',\''.$SubTitle.'\',\''.$idtitulo.'\',\''.$idtituloOriginal.'\',\''.$idtmdb.'\',\''.$idenlaceD.'\',\''.$idid1080.'\',\''.$idid720.'\',\''.$idtextArea.'\',\''.$idgenerarComandos.'\',\''.$idlat.'\',\''.$idesp.'\',\''.$idsub.'\',\''.$idall.'\');" class="btn btn-primary" data-toggle="modal" data-target="#centralModalSuccess'.$key.'">Launch
                enlaces
                </button>
            </div>
        </div>
        <!--/.Card-->
        </div>';

        // MODAL
        $modal .= '<div class="modal fade" id="centralModalSuccess'.$key.'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-notify modal-success modal-lg" role="document">
            <!--Content-->
            <div class="modal-content">
            <!--Header-->
            <div class="modal-header">
                <p class="heading lead">Modal Success</p>
    
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true" class="white-text">&times;</span>
                </button>
            </div>
            <iframe class="embed-responsive-item" src="'.$iframe.'" allowfullscreen></iframe>
    
            <!--Body-->
            <div class="modal-body">
                <div class="text-center">
                <i class="fas fa-check fa-4x mb-3 animated rotateIn"></i>

                '.$panel.'
            
                <table class="table table-sm">
                    <thead>
                        <tr>
                            <th scope="col">Calidad</th>
                            <th scope="col">Link</th>
                        </tr>
                    </thead>
                    <tbody>
                        '.$pcalidad.'
                    </tbody>
                </table>
                <div class="row mb-4 wow fadeIn">
                '.$tmdb_datos.'
                </div>
                </div>
            </div>

    
            <!--Footer-->
            <div class="modal-footer justify-content-center">
                <a type="button" class="btn btn-outline-success waves-effect" data-dismiss="modal">No, thanks</a>
            </div>
            </div>
            <!--/.Content-->
        </div>
        </div>
        <!-- Central Modal Medium Success-->';

        
        $penlaces = '';
        $pcalidad = '';
        $pdownload = '';
        $panel = '';
    }
}

?>





    <?php if(!empty($modal)) echo $modal;?>
    













    <!--Main layout-->
    <main class="mt-5 pt-5">
        <div class="container">
            
            <div class="row justify-content-center">
            <form class="form-inline" action="index.php" method="GET">
                <div class="form-group mx-sm-3 mb-2">
                    <label for="inputPassword2" class="sr-only">Url</label>
                    <input type="text" class="form-control" id="inputPassword2" name="url" placeholder="https://cine24h.net/...">
                </div>
                <button type="submit" class="btn btn-primary mb-2">Extraer</button>
            </form>
            
        </div>


            <hr class="my-5" />

            <!--Section: Cards-->
            <section class="text-center">
                <!--Grid row-->
                <div class="row mb-4 wow fadeIn">
                    <!--Grid column-->
                    <?php if(!empty($card)) echo $card;?>

                    <!--Grid column-->
                </div>
                <!--Grid row-->

                <!--Grid row-->
                <div class="row mb-4 wow fadeIn">
                    <!--Grid column-->
                </div>
                <!--Grid row-->

                <!--Pagination-->
                <nav class="d-flex justify-content-center wow fadeIn">
                    <ul class="pagination pg-blue">
                        <!--Arrow left-->
                        <li class="page-item disabled">
                            <a class="page-link" href="#" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                                <span class="sr-only">Previous</span>
                            </a>
                        </li>

                        <li class="page-item active">
                            <a class="page-link" href="#">1
                                <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="#">2</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="#">3</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="#">4</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="#">5</a>
                        </li>

                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                                <span class="sr-only">Next</span>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!--Pagination-->
            </section>
            <!--Section: Cards-->
        </div>
    </main>
    <!--Main layout-->

    <!-- <pre><?php var_dump($reutlt_tmdb);?></pre> -->
<?php include 'footer.php'; ?>
