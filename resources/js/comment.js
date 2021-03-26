

$("#comment").click(function(){
    let comment = $('.comment_class').val();
    // console.log(comment);

    axios({
        method: 'post',
        url: '/user/comment',
        data:{
            comment:comment,
        },
        // success: function(data){
        //     $('#listComment').text('<p><span>Hung:</span><span> ok luaan</span></p>');
        //     console.log('ok');
        // },
        dataType: 'json'

        })
         .then((res)=>{
              console.log(res.data.listComment)
              if(res.data.status == false){
                  $('.errorComment').text('bạn chưa đăng nhập hoặc trống') ;
              }else{
                $('#listComment').prepend(res.data.listComment);
                $('.errorComment').text('') ;
                $('.comment_class').val('');
              }



    }).catch((err) => {
       console.log('error!')
    });
});
