jQuery(document).ready(function($) {
    function getFriendsList (friendsLists) {
        let html = "";
        for (let i = 0; i < friendsLists.length; i++) {
            html += `
                    <li class="ul-li">
                        <div class="user-item"> 
                            <div class="friendsList-name">
                                <img style="width:45px;height:45px; border-radius:50%" src="http://chat.loc/server/assets/uploads/images/${friendsLists[i].avatar}" alt="">
                                ${friendsLists[i].first_name} ${friendsLists[i].last_name}
                                <a href="http://chat.loc/views/dashboard/chat/index.php?user_id=${friendsLists[i].id}" class="btn btn-success">Start to msg</a>
                        </div>
                    </li>
                `;
        }
        $('#friends_list').html(html);
    }

    $.ajax({
        url: "http://chat.loc/server/routes/web.php",
        method: "get",
        data: {action: "AllFriends"},
        success: function (response) {
            response = JSON.parse(response)
            console.log(response);
            getFriendsList(response)
        }
    });


})





//friend.js