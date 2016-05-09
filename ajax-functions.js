
$("#form").on('submit',function() { 
    var form_data = $(this).serialize(); 
    $.ajax({
        type: "post", 
        dataType: "json",
        url: "main/savePost", 
        data: form_data,
        success: function(data) {
            if (data.success){
                alert(data.result);
                location.reload() ;            }
        },
        error: function() {
            alert("Your message wasn't sent!");
        }
    });
    return false;
});

$(".delete").click(function(){
    var  id =   $(this).closest(".costumer-record").find("#user-id").html();
        $.ajax({
        type: "post", 
        dataType: "json",
        url: "admin_page/deleteUser",
        data: { delete: id },
        success: function(data) {
            if (data.success){
                alert( "User with id = " + id + " was deleted");
                location.reload();
            }else  {
                alert( "User " + id + "doesn't exist");
            }
        },
        error: function() {
            alert("Your message wasn't sent!");
        }
    });
    return false;
});


$(".costumer-record").click(function(){
    var  id =   $(this).closest(".costumer-record").find("#user-id").html();
    var text =  $(this).closest(".costumer-record").find("#user-text").html();
    $("#user-update  input[name='id']").val(id);
    $("#user-update  textarea[name='text-update']").val(text);
});

$("#user-update").on('submit',function() { 
    var form_data = $(this).serialize(); 
    $.ajax({
        type: "post", 
        dataType: "json",
        url: "admin_page/updateUser",
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


$(".pagination").click(function(){
    var page =  $(this).html();
    //alert (page);

    $.ajax({
        type: "post",
        dataType: "json",
        url: "admin_page/setNumbersOfPage", 
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
        url: "admin_page/sorted",
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




