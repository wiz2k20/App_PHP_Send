$(document).ready(function() { 
  $("#btnSubmit").click(function() {
      var about = $("#about").val();
      var comments = $("#comments").val();

      if(about==''||comments=='') {
        alert("Please fill all fields.");
        //return false;
      }

      $.ajax({
        type: "POST",
        dataType: 'JSON',
        url: "form_send.php",
        data: {
            about: about,
            comments: comments
        },
        cache: false,
        success: function(data) {
            $('#valueAbout').text("[ " + data.about);
            $('#valueComments').text(" / " + data.comments);
            $('#valueFullDate').text(" / " + data.fulldate + " ]");
            $('#valueDBRsult').text(data.dbresult);
            $('#about').val("");
            $('#comments').val("");
        },
        error: function(xhr, status, error) {
            console.error(xhr);
        }
      });
  });
});
