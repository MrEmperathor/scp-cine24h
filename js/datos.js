function pintarDatos(arrayDatos,id3) {
    // console.log(arrayDatos);
    let n = 1;
    a = arrayDatos.map((array) => {

        var id = array.id;
        var original_title = array.original_title;
        var poster_path = array.poster_path;

        if(n == 1) document.getElementById(id3).value = array.id;
        n += 1;



        // console.log(array.id+' 'n);
    });

}



function LlenadoDatos(id1,id2,id3,id4,id5,id6,id7,id8,id9,id10,id11,id12) {
        
    var idGenerarComandos = document.getElementById(id8);

    idGenerarComandos.addEventListener('click', () => {

        var titulo = document.getElementById(id1).value;
        var tOriginal = document.getElementById(id2).value;
        var tmdb = document.getElementById(id3).value;
        var link = document.getElementById(id4).value;
        var id1080 = document.getElementById(id5).checked;
        var id720 = document.getElementById(id6).checked;
        var idall = document.getElementById(id12).checked;
        // var idtexarea = document.getElementById(id7);
        var idlat = document.getElementById(id9).checked;
        var idesp = document.getElementById(id10).checked;
        var idsub = document.getElementById(id11).checked;


        titulo = titulo ? `-n "${titulo}"` : '';
        tmdb = tmdb ? `-t "${tmdb}"` : '';
        link = link ? `-e "${link}"` : '';
        id1080 = id1080 ? `-c 1080 -K 1080` : '';
        id720 = id720 ? `-c 720 -K 720` : '';
        idall = idall ? `-c 720 -K 720p` : '';
        idlat = idlat ? `-i "LATINO"` : '';
        idesp = idesp ? `-i "CASTELLANO"` : '';
        idsub = idsub ? `-i "SUB"` : '';

        var salida = `de2 ${titulo} ${tmdb} ${id1080} ${id720} ${idall} ${idlat} ${idesp} ${idsub} ${link}`;

        // document.getElementById(idtexarea).value = salida;
        document.getElementById(id7).innerHTML = salida.replace(/\s+/g,' ');

    })

}

function buscarIdtm(urlApi, name,id1,id2,id3,id4,id5,id6,id7,id8,id9,id10,id11,id12) {

    var uritmdb = urlApi
    var uri = uritmdb + name;

    axios({
        method: 'GET',
        url: uri,
    }).then(function (res) {
        pintarDatos(res.data.results,id3);
    })

    LlenadoDatos(id1,id2,id3,id4,id5,id6,id7,id8,id9,id10,id11,id12);
};