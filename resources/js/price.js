// $('#search').click(function(){
//     // let name = $('#name').val();
//     let a = $('#search-input').val();




//     console.log(a)
//     // axios({
//     //     method: 'post',
//     //     url: '/price/filtering',
//     //     // headers: {
//     //     //     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//     //     //   },
//     //     data:
//     //     {
//     //         min:min,
//     //         max:max,

//     //     },
//     //     dataType: 'json'
//     // })
//     // .then(function (response) {
//     //     console.log(response.data)
//     //   })
//     // .catch(function (error) {
//     //      console.log(error)
//     // });

// });

$('#searchInput').on('keyup',function(){
    let search = $('#searchInput').val();
    // console.log(search)
    axios({
        method: 'post',
        url: '/product/search',
        data:{
            search:search,
        },
        success: function(data){
           $('.search').html('<p> ok</p>')
        },
        dataType: 'json'

        })
         .then((res)=>{
        console.log(res.data);
        $('.search').html(res.data)

    }).catch((err) => {
       console.log('error!')
    });



});

