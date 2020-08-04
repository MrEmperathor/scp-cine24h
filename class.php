<?php

include_once 'doc/simple_html_dom.php';


class PedirEnlaces 
{
    private $peliculas;

    public function ListarEnlaces($url){
        $html = file_get_html($url);

        $links = array();
        foreach ($html->find('.MovieList') as $key => $value) {
            foreach ($value->find('li article a') as $key1 => $link) {
                $links[$key1] = $link->href;
            }
        }
        return $links;
    }

    public function AbrirPeli($url){

        include_once 'doc/simple_html_dom.php';

        $html = file_get_html($url);

        $titulo = $html->find('header h1', 0)->plaintext;
        $image = $html->find('header div.Image figure img', 0)->src;
        $SubTitle = $html->find('div.SubTitle', 0)->plaintext;
        $ano = $html->find('span.Date', 0)->plaintext;

        // Opt1
        $name_repro = array();
        foreach ($html->find('ul.TPlayerNv') as $key => $value) {
            foreach ($value->find('li.Button') as $key1 => $i) {
                $name_repro[$key1] = trim($i->plaintext);
            }
        }
        // linl playes
        $palyer = array();
        foreach ($html->find('div.TPlayerTb') as $key => $ii) {
            // echo "DANDO VUELTA";
            if ($ii->find('iframe')[0]->attr["data-src"]) {
                $palyer[trim($name_repro[$key])] = $ii->find('iframe')[0]->attr["data-src"];
            }else {
                $limpiar = htmlspecialchars_decode($ii->outertext);
                preg_match('/src="(.*)" f/', $limpiar, $mm);
                $palyer[trim($name_repro[$key])] = ($mm[1]) ? $mm[1] : "No se encontro en enlace";

            }
        }

        // enlaces de descarga
        $enlaces_down = array();
        foreach ($html->find('div.TPTblCn table tbody tr') as $key => $value) {
            $enlaces_down[$key.'-'.$value->find('td span', 3)->plaintext] = $value->find('a', 0)->href;
            // echo $key;
        }
        // $peliculas = array();
        $this->peliculas["items"] = array();

        $items = array(
            "url" => $url,
            "titulo" => $titulo,
            "image" => $image,
            "SubTitle" => $SubTitle,
            "year" => $ano,
            "enlaces" => array(
                "player" => $palyer,
                "download" => $enlaces_down
            )
        );
        array_push($this->peliculas["items"], $items);

        return $this->peliculas;

    }
}

