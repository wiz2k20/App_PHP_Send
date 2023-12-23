$(document).ready(function(e) {
  $("#form").on('submit', function(e) {
    e.preventDefault();
    var formData = new FormData(this);
    //formData.append('x_date1', date1);	
    //formData.append('x_dateF', dateF);			                                   
    $.ajax({ //ajax
      xhr: function() {
        var xhr = new window.XMLHttpRequest();
        xhr.upload.addEventListener("progress", function(evt) {
          if (evt.lengthComputable) {
            var percentComplete = ((evt.loaded / evt.total) * 100);
            $(".progress-bar").width(percentComplete + '%');
            $(".progress-bar").html('<textoStatus>Status: ' + Math.round(percentComplete) + '%</textoStatus>');
            $("#SizeProgress").html('<textoRes>Uploaded: ' + evt.loaded / 1000 + ' bytes</textoRes><br><textoRes>Total: ' + evt.total / 1000 + ' bytes</textoRes>');
          }
        }, false);
        return xhr;
      },
      method: 'POST',
      url: 'php/sUpload.php',
      data: formData,
      cache: false,
      contentType: false,
      processData: false,
      beforeSend: function() {
        $('#form').css("opacity", ".5");
        $("#submit").prop('disabled', true);
        $("#photo").prop('disabled', true);
      },
      error: function() {
        $('#uploadStatus').html('<p><textoerro>File upload failed, please try again.</textoerro></p>');
      },
      success: function(data) {
        var mostra1 = data;
        $('#x_resultado').html(mostra1);
        $('#form')[0].reset();
        $('#form').css("opacity", "");
        $("#submit").prop('disabled', false);
        $("#photo").prop('disabled', false);
        //x_arquivos();
        //$('#x_resultado').text(mostra1);               	   
      }
    }); //ajax  
  });
});
