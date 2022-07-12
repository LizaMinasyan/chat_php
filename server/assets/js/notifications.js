jQuery(document).ready(function($) {
    function getNotificationsList(friendRequests) {
        let html = "";
        for (let i = 0; i < friendRequests.length; i++) {
            console.log(friendRequests[i].avatar)
            html += `
                    <li class="ul-li">
                        <div class="user-item"> 
                            <div class="friendRequests-name">
                                <img src="http://chat.loc/server/assets/uploads/images/${friendRequests[i].avatar}" alt="" style="width:45px;height: 45px;border-radius: 50%">
                                ${friendRequests[i].first_name} ${friendRequests[i].last_name}
                                <input data-to_id="${friendRequests[i].to_user_id}"  data-from_id="${friendRequests[i].from_user_id}" type="submit" class="btn btn-outline-success btn_confirm" value="confirm">
                            </div>
                            
                        </div>
                    </li>
                `;
        }
        console.log(html)

        $('#notifications_list').html(html);

        $('.btn_confirm').on("click", function(){
            let from_confirm_id = $(this).data('from_id');
            let to_confirm_id = $(this).data('to_id');
            $.ajax({
                url:"http://chat.loc/server/routes/web.php",
                method:"get",
                data:{action:"userconfirm", to_confirm_id, from_confirm_id},
                success: function () {
                    location.reload();
                }
            });
        })

    }

    $.ajax({
        url: "http://chat.loc/server/routes/web.php",
        method: "get",
        data: {action: "AllRequests"},
        success: function (response) {
            response = JSON.parse(response)
            console.log(response);
            getNotificationsList(response)
        }
    });



})

//ajax enq grum notificatianeri hamar amen mekiny ira meja grvac