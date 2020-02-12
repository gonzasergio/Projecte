$('document').ready(function () {

    function getUser() {

        $.ajax({
            url: '/api/my-user',
            type: 'GET',
            success: function(data) {
                setMyUser($.parseJSON(data));
            }
        })

    }

    function setMyUser(user) {
        let link = 'perfil/'+user['id'];
        $('#myUserLink').attr('href', link);
        $('#myUserImg').attr('title', user['name']);
        $('#myUserName').attr('href', link)
            .attr('title', user['name'])
            .text(user['userName']);
        $('#myUserDescription').text(user['description']);
        $('#myFollowersNum').text(user['followers_num']);
        $('#myFollowingNum').text(user['follows_num'])
    }

    getUser();


    function generatePublicaion() {

        $.ajax({
            url: '/api/publication/followers',
            type: 'GET',
            success: function(data) {
                $.parseJSON(data).forEach(setPublications);
            }
        })

    }

    function setPublications(item, index) {
        let img = (item['img'] === null) ? '' : '<img class="card-img" src="'+ item['img'] +'">';

        console.log(item);
        let openDiv = '<div class="card gedf-card my-5">\n' +
            '                          <div class="card-header">\n' +
            '                            <div class="d-flex justify-content-between align-items-center">\n' +
            '                                <div class="d-flex justify-content-between align-items-center">\n' +
            '                                    <a href="/perfil/'+ item['user'] +'">\n' +
            '                                        <img title="'+ item['user'] +'" class="d-flex mr-3 rounded-circle shadow-sm storyborder" src="https://x1.xingassets.com/assets/frontend_minified/img/users/nobody_m.original.jpg" width="50px">\n' +
            '                                    </a>\n' +
            '                                    <div class="ml-2">\n' +
            '                                        <a href="/perfil/'+ item['user'] +'" class="text-decoration-none text-dark">\n' +
            '                                            <div title="'+ item['user'] +'" class="h5 m-0">'+ item['user'] +' </div>\n' +
            '                                        </a>\n' +
            '                                        <small class="text-muted h7 mb-2"> <i class="fa fa-clock-o"></i> 10 min</small>\n' +
            '                                    </div>\n' +
            '                                </div>\n' +
            '                                <div class="dropdown">\n' +
            '                                    <button class="btn btn-link dropdown-toggle text-decoration-none" type="button" id="gedf-drop1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">\n' +
            '                                        <i class="fa fa-ellipsis-h"></i>\n' +
            '                                    </button>\n' +
            '                                    <div class="dropdown-menu dropdown-menu-right " aria-labelledby="gedf-drop1">\n' +
            '                                        <a class="dropdown-item" href="#"><i class="fas fa-exclamation-circle"></i> <?php echo $lang[$idioma]["report"];?></a>\n' +
            '                                    </div>\n' +
            '                                </div>\n' +
            '                            </div>\n' +
            '\n' +
            '                        </div>\n' +
            '\n' +
            '                        <div class="card-body">\n' +
            '                            '+img+' \n' +
            '                            <p class="card-text">\n' + item['text'] +
            '                            </p>\n' +
            '                        </div>\n' +
            '                        <div class="card-footer">\n' +
            '                            <a href="#" class="text-primary mr-2"><i class="far fa-heart h4"></i> <small class="h6">'+ item['likes_num'] +'</small></a>\n' +
            '                            <a href="#" class="text-secondary mx-2"><i class="fas fa-comments h4"></i> <small class="h6">' + item['comment_num'] + '</small></a>\n' +
            '                            <a href="#" class="text-secondary mx-2"><i class="fas fa-share h4"></i></i></a>\n' +
            '                        </div>\n' +
            '                    </div>\n' +
            '                </div>';


        $('#publication').append(openDiv);
    }

    generatePublicaion();

});