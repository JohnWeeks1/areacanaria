$(document).ready(function(){

  var $uploadCrop;

  function readFile(input) {
      if (input.files && input.files[0]) {
          var reader = new FileReader();
          reader.onload = function (e) {
              $uploadCrop.croppie('bind', {
                url: e.target.result
              });
              $('.upload-demo').addClass('ready');
          }
          reader.readAsDataURL(input.files[0]);
      }
  }

  $uploadCrop = $('#upload-demo').croppie({
      viewport: {
          width: 200,
          height: 200,
          type: 'square'
      },
      boundary: {
          width: 300,
          height: 300
      }
  });

  $('#upload').on('change', function () { readFile(this);
      $user_image = input.files[0];
  });
  $('.form_submit').on('click', function (ev) {
      $uploadCrop.croppie('result', {
          type: 'canvas',
          size: 'original'
      }).then(function (resp) {
          $('#user_image_cropped').val(resp);
          $('#form').submit();
      });
return false;
  });

    $(".fancybox").fancybox();

    $('#send_whatsapp_message').click(function () {
        var link = $(this).attr("href");
        var phone = $("#phone").val();
        var message = $('#message').val();
        var totalPhone = '?phone=' + phone;
        var totalmessage = '&text=' + message;
        var info = totalPhone + totalmessage;
        var result = link + info;
        $('#send_whatsapp_message').attr("href", result);
    });

    $('.removeIn3').delay(3000).hide('slow');
    //class removeIn3 END
    $(".delete-alert").click(function(){
      if (!confirm("Do you want to delete this?")){
        return false;
      }
    });

    // $('.selectpicker').selectpicker();
});
