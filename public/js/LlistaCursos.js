    function generateCurs() {

        $.ajax({
            url: '/api/get/curs/all',
            type: 'POST',
            success: function(data) {
                console.log(data);
                $.parseJSON(data).forEach(setCursos);
            }
        })

    }

    function setCursos(item, index) {

        let openDiv = '	 		<div class="container-fluid">'+
        '<div class="row border-bottom mx-2 mx-lg-5 mb-4">'+
	'<div class="d-none d-sm-block col-sm-4 col-md-3 col-lg-2 text-center">'+
    	'<a href="perfil?user=<?= Joan" title="Joan">'+
        	'<img class="rounded-circle shadow-sm nostoryborder" src="https://x1.xingassets.com/assets/frontend_minified/img/users/nobody_m.original.jpg" width="80px">'+
    	'</a>'+
    	'<p class="text-secondary mt-1">'+
    		'<a href="perfil?user=Joan" title="Joan" class="text-secondary text-decoration-none">Joan</a>'+
    	'</p>'+
	'</div>'+
    '<div class="col">'+
            '<h4 class="mb-0"><a class="text-old-primary" href="curs?id=1">'+item['titol']+'</a></h4>'+
            '<small>'+
        	'<i class="fas fa-star text-warning"></i>'+
            '<i class="fas fa-star text-warning"></i>'+
            '<i class="fas fa-star text-warning"></i>'+
            '<i class="fas fa-star text-warning"></i>'+
           '<i class="fas fa-star text-secondary"></i>'+
    		'</small>'+
            '<div class="mb-2">'+
            '<div class="d-block d-sm-none mb-n1">'+
                '<a class="text-decoration-none text-old-primary" href="perfil?user=Joan" title="Joan"><small><i class="fas fa-user"></i></small> Joan</a>'+
                '<br>'+
            '</div>'+
            '<small>'+
                '<i class="fas fa-medal"></i> <a class="mr-2 text-old-primary" href="#"> Hard</a>'+
                '<i class="fas fa-map-marker-alt"></i> <a class="mr-2 text-old-primary" href="#"> Manacor</a>'+
            '</small>'+
            '</div>'+
            '<p>'+item['descripcio']+'</p>'+
    '</div>'+
'</div>'+
'</div>';


        $('#curs').append(openDiv);
    }

    generateCurs();