jQuery(document).ready(function($) {  //unenq jquery vori mej ajaxov ashxatacnum kanchum enq lriv gracnery edity delety grichi bacvel pakvely
    function printUserCategories(categories) {
        let html = "";
        for (let i = 0; i < categories.length; i++) {
            let d = new Date(`${categories[i].created_at}`);
            let date = d.toLocaleString("en-US", {timeZone:'America/New_York'});
            html += ` 
         
            <tr data-id="${categories[i].id}">
                <td>${i + 1}</td>
                <td class="edit_category"><span class="category_name">${categories[i].category_name}</span></td> 
                <td>${date}</td>
             
                <td>  
                        <img class="edit_file_name" src="http://chat.loc/server/assets/images/pencil.svg">
                        <img class="delete_file_name" src="http://chat.loc/server/assets/images/trash.svg" >
                </td>  
        </tr>
        `;
        }

        $("#user_categories").html(html);


        $(".delete_file_name").on("click",  function() {
            let id = $(this).parents("tr").data("id");
            $.ajax({
                url: "http://chat.loc/server/routes/web.php",
                method: "get",
                data: {action: "del_category", id},
                success: function (e) {
                    alert("Category deleted")
                    location.reload();
                }
            });
        })

        $(".edit_file_name").on("click", function () {
            $(this).hide();
            $('.delete_file_name').hide();
            $(this).parent().append(`<input type='submit' value='Save' class='btn btn-success save-change' > <input type = 'submit' value='cancel' class='btn btn-danger  cancel-change' >`);
            $(this).parents("tr").find('.edit_category').attr("contenteditable", "");
            $(".cancel-change").on("click", function (){
                $(this).hide();
                $('.save-change').hide();
                $('.delete_file_name').show();
                $('.edit_file_name').show();
                $(this).parents("tr").find('.edit_category').removeAttr("contenteditable", "");
            });

            $(".save-change").on("click", function () {
                let new_name= $(this).parents("tr").find('.edit_category').text();
                let id =  $(this).parents("tr").data("id");
                $(this).hide();
                $('.cancel-change').hide();
                $('.delete_file_name').show();
                $('.edit_file_name').show();
                $.ajax({
                    url:"http://chat.loc/server/routes/web.php",
                    method:"get",
                    data:{action:"rename_category", id, new_name},
                    success: function () {
                        // alert("row successfully updated");
                    }
                });

            });


        });

    }
    function printCategories(categories) {
        let html = "";
        for (let i = 0; i < categories.length; i++) {
            let d = new Date(`${categories[i].created_at}`);
            let date = d.toLocaleString("en-US", {timeZone:'America/New_York'});
            html += ` 
         
            <tr>
                <td>${i + 1}</td>
                <td class="edit_category"><span class="file_name">${categories[i].category_name}</span></td>
                <td class="edit_creited"><span class="first_name">${categories[i].first_name}</span></td>
                <td>${date}</td> 
        </tr>
        `;
        }

        $("#categories").html(html);
    }



    $.ajax({
        url: "http://chat.loc/server/routes/web.php",
        method: "get",
        data: {action:'getCategories'},
        success: function (response) { //
            response = JSON.parse(response)
            printCategories(response)
        }
    });



 //   New Category

    $('#save_category').on('click', function () {
        let category_name = $('#category_name').val();
        if(category_name != '') {
            $.ajax({
                url: "http://chat.loc/server/routes/web.php",
                method: "post",
                data: {action: "addCategory",category_name},
                success: function (response) {
                    response = JSON.parse(response)
                    alert(response.msg);
                    location.assign("http://chat.loc/views/dashboard/categories/index.php");
                }
            });
        } else {
            // alert("Enter input")
        }
    });


        //myCategory

    if($("div").hasClass("my-categories")) {
        $.ajax({
            url: "http://chat.loc/server/routes/web.php",
            method: "get",
            data: {action:'get_user_categories'},
            success: function (response) { //
                response = JSON.parse(response)
                console.log(response);
                printUserCategories(response)
            }
        });
    }





})




