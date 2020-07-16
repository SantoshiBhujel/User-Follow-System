$(document).ready(function(){
    $.ajaxSetup({
        headers:{
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('.follow-button').click(function(){
        let user_id= $(this).data('id');
        let object = $(this);
        var currentFollowerCount= parseInt($(this).parent("div").find(".follower").text());
        // console.log(currentFollowerCount);
        // console.log(user_id);
        $.ajax({
            type: 'POST',
            url: '/ajax',
            data: {user_id: user_id},
            success: function(data){
                console.log(data);
                // if($.isEmptyObject(data.success ))
                // {
                //     object.find("strong").text("Unfollow");
                //     object.parent("div").find(".follower").text(currentFollowerCount+1);
                //     // object.find("strong").text("Follow");
                //     // object.parent("div").find(".follower").text(currentFollowerCount-1);
                // }
                // else
                // {

                //     object.find("strong").text("Follow");
                //     object.parent("div").find(".follower").text(currentFollowerCount-1);
                //     // object.find("strong").text("Unfollow");
                //     // object.parent("div").find(".follower").text(currentFollowerCount+1);
                // }

                 if((data=="followed"))
                {
                    object.find("strong").text("Unfollow");
                    object.parent("div").find(".follower").text(currentFollowerCount+1);
                    // object.find("strong").text("Follow");
                    // object.parent("div").find(".follower").text(currentFollowerCount-1);
                }
                else
                {

                    object.find("strong").text("Follow");
                    object.parent("div").find(".follower").text(currentFollowerCount-1);
                    // object.find("strong").text("Unfollow");
                    // object.parent("div").find(".follower").text(currentFollowerCount+1);
                }

            }
        });
    });

}); 
