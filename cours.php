<!DOCTYPE html>
<html lang="en">

<head>
  <title>Title</title>
  <!-- Required meta tags -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous" />
  <link rel="stylesheet" href="css.css" type="text/css" />
  <link rel="stylesheet" href="icon/iconfont.css" type="text/css" />
  <?php
  //identifier le nom de base de données
  $database = "boostcamp";
  //connectez-vous dans votre BDD 
//Rappel : votre serveur = localhost | votre login = root | votre mot de pass = '' (rien)
  $db_handle = mysqli_connect('localhost:3308', 'root', '');
  $db_found = mysqli_select_db($db_handle, $database);
  if (isset($_GET['id_cours'])) {
    $id_cours = $_GET['id_cours'];
    $sql = "SELECT * FROM cours WHERE id_cours = '$id_cours'";
    $result = mysqli_query($db_handle, $sql);
    $data = mysqli_fetch_assoc($result);
  }
  ?>

</head>

<body>
  <br>
  <div id="header" class="container-fluid">
    <div class=" row" style="padding: 5px">
      <div class="col-2"></div>
      <div class="col-8">
        <div class="row">
          <div class="col-1">
            <img src="image/logo.jpg" width="70px" align="left" />
          </div>
          <div class="col-2">
            <p class="heisezi">BOOSTCAMP</b>
          </div>
          <div class="col-2">
            <div class="row">
              <div class="col-2"></div>
              <div class="col-10" style="background-color: #007179;border-radius: 5px;">
                <b class="baisezi">catalogue ▼</b>
              </div>
            </div>
          </div>
          <div class="col-5">
            <div class="row">
              <div class="col-4">
                <a href="">
                  <b class="xiaoheisezi">Mes Parcours</b>
                </a>
              </div>
              <div class="col-4">
                <a href="">
                  <b class="xiaoheisezi">Mes Formus</b>
                </a>
              </div>
              <div class="col-4">
                <a href="">
                  <b class="xiaoheisezi">Mes Ressources</b>
                </a>
              </div>
            </div>
          </div>
          <div class="col-2">
            <div class="row">
              <div class="col-2"></div>
              <div class="col-3">
                <span class="iconfont icon-fangdajing"></span>
              </div>
              <div class="col-3">
                <span class="iconfont icon-tongzhi2"></span>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-1">
        <span class="iconfont1 icon-wodezhanghu"></span>
      </div>
    </div>
  </div>
  <br>
  <form action="upload_file.php?id_prof=<?php echo $_GET['id_prof'] ?>" method="post" enctype="multipart/form-data">
    <div>
      <div class="container-fluid">
        <div class="row"
          style='height: 400px; background-image: url(https://boostcamp.omneseducation.com/pluginfile.php/1/local_dictionary/custom_header/10/Type%3DIllustration.svg);'>
          <div class="col-12">
            <b class='dabaisezi'>
              <?php echo $data['cours_name'] ?>
            </b>
          </div>
        </div>
      </div>
      <div class="row" style="height: 60px;background-color:#007179 ">
        <div class="col-2">
        </div>
        <div class="col-2">
          <b class='baisezi1'>les fiche</b>
        </div>
        <div class="col-2">
          <b class='baisezi1'>les episodes</b>
        </div>
        <div class="col-2">
          <b class='baisezi1'>les discussions</b>
        </div>
        <div class="col-2">
          <b class='baisezi1'>les ressources</b>
        </div>
        <div class="col-2">
        </div>
      </div>
    </div>
    <div id="section">
      <br>
      <div class="container-fluid">
        <div class="row">
          <div class="col-2"></div>
          <div class="col-8">
            <input type="file" name="file" id="file" class='btn btn-lg' />
            <input type="submit" name="submit" value="submit" class='btn btn-lg buttoncho' />
          </div>
        </div>
      </div>
    </div>
  </form>
  <div id="footer" class="container">
    <footer>
      <small>
        <p align="center">
          concu par zhan tchalla kuate beglin. contact:mail :<a href="mailto:1472804183@qq.com">
            1472804183@qq.com
          </a>
        <p>tel : +33(0)652811128 </p>
        </p>
        <p align="center"> Tous droits reserves.copyright &copy;2023 | lstest update:21-03-2023</p>
      </small>
    </footer>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3"
    crossorigin="anonymous"></script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz"
    crossorigin="anonymous"></script>
</body>

</html>

</body>

</html>