/**
 * Created by phuong on 12/05/2017.
 */
$.ajaxSetup({
   headers: {
       'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
   }
});
$(document).ready(function () {
    $('.deleteUser').on('click',function (e) {
        e.preventDefault();
        var choice = confirm("Want to delete this user ?");
        if(choice){
            return true;
        }else{
            e.preventDefault();
            return false;
        }

    })
})
// var myUrl = this.getAttribute('href');

// $.ajax({
//     url: myUrl,
//     type: 'DELETE',
//     success: function (result) {
//         if(result.status == 'success'){
//             alert('user deleted !');
//             window.location.reload();
//         }
//         else{
//             alert('cannot delete user !');
//             window.location.reload();
//         }
//     },
//     error: function () {
//         alert('cannot send ajax !');
//     }
// })