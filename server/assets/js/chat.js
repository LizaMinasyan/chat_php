jQuery(document).ready(function($) {
    function getChatList(chatLists) {
        let currentUserId = $("#toUserId").val();
        let html = "";
        for (let i = 0; i < chatLists.length; i++) {
            if (currentUserId == chatLists[i]['id']) {
                html += `
                    <div class="from_msg"> 
                            <div class="d-flex justify-content-between">
                                <p class="small mb-1">${chatLists[i].first_name} ${chatLists[i].last_name} </p>
                                <p class="small mb-1 text-muted">${chatLists[i].created_at}</p>
                            </div>
                            <div class="d-flex flex-row justify-content-start">
                                <img src="http://chat.loc/server/assets/uploads/images/${chatLists[i]['avatar']}"
                                     alt="" style="width: 45px; height: 100%; border-radius: 50%">
                                <div>
                                    <p class="small p-2 ms-3 mb-3 rounded-3" style="background-color: #f5f6f7;">${chatLists[i]['context']}</p>
                                </div>
                            </div>
                    </div>`;
            } else {
                html += `   
                        <div class="to_msg">
                            <div class="d-flex justify-content-between">
                                <p class="small mb-1 text-muted">${chatLists[i].created_at}</p>
                                <p class="small mb-1">${chatLists[i].first_name} ${chatLists[i].last_name}</p>
                            </div>
                            <div class="d-flex flex-row justify-content-end mb-4 pt-1">
                                <div>
                                    <p class="small p-2 me-3 mb-3 text-white rounded-3 bg-warning">${chatLists[i]['context']}</p>
                                </div>
                                <img src="http://chat.loc/server/assets/uploads/images/${chatLists[i]['avatar']}"
                                     alt="" style="width: 45px; height: 100%; border-radius: 50%">
                            </div>
                        </div>
                    
                `;
            }
        }
        $('#messages').html(html);
    }
    $('#send_msg').on("click", function(){
        let inp_msg = $('#inp_msg').val();
        let to_id = $('#toUserId').val();
        $.ajax({
            url: "http://chat.loc/server/routes/web.php",
            method: "post",
            data: {action: "addMessages", inp_msg, to_id},
            success: function (response) {
                getReqMsg()
            }
        });

        $('#inp_msg').val("")
    });

    $.ajax({
        url: "http://chat.loc/server/routes/web.php",
        method: "get",
        data: {action: "getMessages"},
        success: function (response) {
            response = JSON.parse(response)
            console.log(response);
            getChatList(response);
        }
    });
    function  getReqMsg() {
        $.ajax({
            url: "http://chat.loc/server/routes/web.php",
            method: "get",
            data: {action: "getMessages"},
            success: function (response) {
                response = JSON.parse(response)
                console.log(response);
                getChatList(response);
            }
        });
    }
})