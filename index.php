<html>

<head>
  <link rel="stylesheet" href="css/sty1.css">
  <title>send</title>
  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
  <link rel="shortcut icon" href="assets/favicon1.ico" type="image/x-icon">
  <link rel="icon" href="assets/favicon1.ico" type="image/x-icon">

  <!-- https://www.cluemediator.com/ajax-post-request-with-jquery-and-php -->
</head>

<!-- <body oncontextmenu="return false;"> -->
<body>

  <div class="wrapper">
    <!-- DIV WRAPPER -->
    <!-- <script src="scripts/desativar.js"></script> -->

    <?php include 'database/config.php'; ?>
    <?php include 'php/form_send_email.php'; ?>

    <script>
      function reqpass2(clicked) {
        var pswd = prompt("pass", "");
        //if (pswd != null) {
        if (pswd == 55669) {
          //document.getElementById("yw1").innerHTML = pswd;
          //document.getElementById("yw2").innerHTML = clicked;
          var clicado = clicked;
          window.location.href = "deldata.php?id=" + clicado;

          //window.location.href = "http://localhost/main.php?width=" + width + "&height=" + height;
          //echo "<td><a href='deldata.php?id=" . $row["cod"] . "'>del</a></td>";
        }
      }
    </script>

    <table class="Tabela_1">
      <tr>
        <th></th>
        <th></th>
      </tr>
      <tr>
        <td id='tdSEND'>

          <?php // = = = = = TEXT AREA = = = = =
          //<button class="send1" id="369" onclick="reqpass2(this.id)">del</button>
          ?>
          <form>
          <div class="textoverde pictureframe marginbottom">To Do List:</div><br>
            <textarea cols="50" rows="1" id="about" style="text-transform:uppercase"></textarea><br><br>
            <textarea cols="80" rows="10" id="comments" wrap="hard" style="text-transform:uppercase"></textarea><br><br>
            <table class="envia">
              <tr>
                <th align="center"><input type="checkbox" id="job" disabled>
                <div class="textoverde pictureframe">job</div>
                </th>
                <th align="center"><input type="button" class="send1" id="btnSubmit" value="send" /></th>
              </tr>
            </table>
          <!-- Se console limpar sozinho mudar de type: submit para type: button -->
          </form>

          <div id="valueAbout" class="textobranco pictureframe"></div>
          <div id="valueComments" class="textobranco pictureframe"></div>
          <div id="valueFullDate" class="textobranco pictureframe"></div>
          <div id="valueDBRsult" class="textoverde pictureframe"></div>
          
          <!-- FORM SEND -->
          <script src="javascript/form_send.js"></script>

        </td>
        <td id='tdUPLOAD'>

          <!-- Display upload status -->
          <div id="uploadStatus" class="z"></div>

          <br><br>
          <!-- Progress bar -->
          <div class="progress" id="z">
            <div class="progress-bar" id="z"></div>
          </div>

          <br>
          <div class="textoSizeProgress" id="SizeProgress"></div>
          <br>

          <form id="form" method="post" enctype="multipart/form-data">
            <h2>Upload File</h2>
            <input type="file" name="photo" class="bUpload" id="photo"><br>
            <br>
            <input type="submit" name="submit" class="bUpload" id="submit" value="Upload">
            <br><br>
            <div class="textobranco pictureframe marginbottom"><strong>Extension:</strong> zip, 7z, rar, mp3, xml, docx, jpg, png, jpeg, gif</div>
            <br>
            <div class="textobranco pictureframe"><strong>Max size:</strong> 30 MB</div>
          </form>

          <br>
          <div class="z" id="x_resultado"></div>
          <br><br>

          <!-- FORM UPLOAD -->
          <script src="javascript/form_upload.js"></script>

        </td>
      </tr>
    </table>

    <br>
    <?php
    // = = = = = MOSTRA DADOS TABELA = = = = =
    $sql1 = "SELECT control, date, time, about, comment FROM app_send_control ORDER BY control DESC";
    $res1 = $conn->query($sql1);

    if ($res1->num_rows > 0) {
      // output data of each row
      echo "<table class='lista'>";

      echo "
      <thead><tr>
      <th style='width:3%' id='thID'>ID
      <th style='width:6%' id='thDate'>Date
      <th style='width:6%' id='thTime'>Time
      <th style='width:25%' id='thAbout'>About
      <th style='width:57%' id='thText'>Text
      <th style='width:3%' id='thDel'>del
      </thead><tbody>";

      //HOW SET CSS TO ONE COLUMN    

      while ($row = $res1->fetch_assoc()) {
        echo "<tr><td id='tdID'>" . $row["control"] . "</td><td id='tdDate'>" . $row["date"] . "</td><td id='tdTime'>" . $row["time"] . "</td><td id='tdAbout'>" . $row["about"] . "</td><td id='tdText'> " . nl2br($row["comment"]) . "</td>";

        echo "<td id='tdDel'><button class='send1' id=" . $row["control"] . " onclick='reqpass2(this.id)'>del</button></td>";

        //echo "<td><a href='deldata.php?id=" . $row["cod"] . "'>del</a></td>";
        //echo "<td><a href='deldata.php?id=" . $row["cod"] . "' target='_blank'>del</a></td>";
        echo "<td></td></tr>";

        // https://stackoverflow.com/questions/43286387/adding-a-delete-button-in-php-on-each-row-of-a-mysql-table/43286487

        //echo $row["date"]. " - " . $row["time"]. " {> <font color='green'>" . $row["abt19"]. "</font> <} | {> <b><font color='blue'>" . $row["text"]. "</font></b> <}<br><br>";
      }
      echo "</tbody></table>";
    } else {
      echo "0 results";
    }
    // = = = = = MOSTRA DADOS TABELA = = = = = FECHA
    $conn->close();
    ?>

    <div class="push"></div>
  </div> <!-- DIV WRAPPER -->
  <div class="footer">
    <div id="valueFooter" class="textoverde pictureframe">Developer: Marcio Barcellos | Created on: 24/08/2019 | Last update: 03/04/2020 > 14/02/2022 > 03/10/2022 > 14/12/2023</div>  
  </div>

  <script src="javascript/form_send.js"></script>
</body>

</html>