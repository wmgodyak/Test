//save post
$("#form").on('submit',function() { 
    var form_data = $(this).serialize(); 
    $.ajax({
        type: "post", 
        dataType: "json",
        url: "main/save_post",
        data: form_data,
        success: function(data) {
            if (data.success){
                alert(data.result);
                location.reload() ;
            }else  {
                alert(data.result);
            }
        }
        ,
        error: function() {
            alert("Your message wasn't sent!");
        }
    });
    return false;
});

//delete user
$(".delete").click(function(){
    var confirmText = "Are you sure you want to delete?";
    if(confirm(confirmText)) {
        var id = $(this).closest(".costumer-record").find("#user-id").html();
        $.ajax({
            type: "post",
            dataType: "json",
            url: "adminPage/delete",
            data: {delete: id},
            success: function (data) {
                if (data.success) {
                    alert("User with id = " + id + " was deleted");
                    location.reload();
                } else {
                    alert("User " + id + "doesn't exist");
                }
            },
            error: function () {
                alert("Your message wasn't sent!");
            }
        });
    }
    return false;
});

//update user
$(".costumer-record").click(function(){
    var  id =   $(this).closest(".costumer-record").find("#user-id").html();
    var text =  $(this).closest(".costumer-record").find("#user-text").html();
    $("#user-update  input[name='id']").val(id);
    $("#user-update  textarea[name='text-update']").val(text);
});


//update user
$("#user-update").on('submit',function() { 
    var form_data = $(this).serialize(); 
    $.ajax({
        type: "post", 
        dataType: "json",
        url: "adminPage/update",
        data: form_data,
        success: function(data) {
            if (data.success){
                location.reload() ;
            }else  {
                alert("Problem in the server");
            }
        },
        error: function() {
            alert("Your message wasn't sent!");
        }
    });
    return false;
});

//pagination
$(".pagination").click(function(){
    var page =  $(this).html();
    //alert (page);

    $.ajax({
        type: "post",
        dataType: "json",
        url: "adminPage/setNumbersOfPage",
        data:  { page: page },
        success: function(data) {
            location.reload() ;
        },
        error: function() {
            alert("Your message wasn't sent!");
        }
    });
    return false;
});

//sorting
$(".sort-by-descending").click(function(){
    var  getSortedWay =   $("#sorted-way option:selected ").val();
    var  getSortedValue =   $("#sorted-value option:selected").val();

    
    if (getSortedWay == "Спаданню" ) {
        getSortedWay = "DESC";
    }else  {
        getSortedWay = "ASC";
    }
   
    $.ajax({
        type: "post",
        dataType: "json",
        url: "adminPage/sorted",
        data:  { value: getSortedValue , way: getSortedWay },
        success: function(data) {
            //alert (data.value + " " + data.way);
            location.reload() ;
        },
        error: function() {
            alert("Your message wasn't sent!");
        }
    });
    return false;
});




