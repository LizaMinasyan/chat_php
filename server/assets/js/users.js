jQuery(document).ready(function($) {
        function printUsersList(users) {
            let html = "";
            for (let i = 0; i < users.length; i++) {
                html += `
                           <li class="ul-li" >
                                <div class='user-item'> 
                                <div class='user-avatar'>
                                    <img src="http://chat.loc//server/assets/uploads/images/${users[i].avatar}" alt="">
                                </div>
                                <div class="user-name">${users[i].first_name} ${users[i].last_name}</div>
                                <input data-id=${users[i].id} type="submit" class="btn btn-outline-dark inp-check" value="+" >
                                </div>
                           </li>
                `
            }
            $('#users-list').html(html);

            $('.inp-check').on("click", function(){
                let to_user_id = $(this).data('id');
                // alert(to_user_id)
                $.ajax({
                    url:"http://chat.loc/server/routes/web.php",
                    method:"get",
                    data:{action:"checkin", to_user_id},
                    success: function () {
                        // response = JSON.parse(response)
                        // console.log(response);
                        // printUsersList(response)
                    }
                });
            })

        }



    $.ajax({
        url: "http://chat.loc/server/routes/web.php",
        method: "get",
        data: {action:'UsersList'},
        success: function (response) { //
            response = JSON.parse(response)
            console.log(response)
            printUsersList (response)

        }
    });

    $('#search_name').on("click", function(){
        let name = $('#search_inp').val();
        $.ajax({
            url:"http://chat.loc/server/routes/web.php",
            method:"get",
            data:{action:"userSearch", name},
            success: function (response) {
                response = JSON.parse(response)
                console.log(response);
                printUsersList(response)
            }
        });
    })


})






