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
</head>
<?php
//identifier le nom de base de données
$database = "boostcamp";
//connectez-vous dans votre BDD 
//Rappel : votre serveur = localhost | votre login = root | votre mot de pass = '' (rien)
$db_handle = mysqli_connect('localhost:3308', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);
if (isset($_GET['login_mail_clt'])) {
    $email = $_GET['login_mail_clt'];
    $password = $_GET['login_mdp_clt'];
    $sql = "SELECT * FROM prof WHERE email = '$email' AND code = $password";
    $result = mysqli_query($db_handle, $sql);
    $data = mysqli_fetch_assoc($result);
    $id_prof = $data['id_prof'];
    header("Location: prof.php?id_prof=$id_prof");
}
?>

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
                        <p class="heisezi">BOOSTCAMP</p>
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
                                    <b class="xiaoheisezi">Mes Ressource</b>
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
    <div id="nav">
        <div class="container-fluid">
            <div class="row">
                <div class="col-2"></div>
                <div class="col-10">
                    <div class="row">
                        <div class="col-1">
                            <a href="" class="xiaobaisezi">A la une</a>
                        </div>
                        <div class="col-1">
                            <a href="" class="xiaobaisezi">En cours</a>
                        </div>
                        <div class="col-1">
                            <a href="" class="xiaobaisezi">Favoris</a>
                        </div>
                        <div class="col-1">
                            <p class="xiaobaisezi">Passés</p>
                        </div>
                        <div class="col-1">
                            <p class="xiaobaisezi">Archivés</p>
                        </div>
                        <div class="col-1">
                            <p class="xiaobaisezi">Futures</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="section">
        <br><br>
        <div class="container-fluid">
            <div class="container-fluid">
                <div class="row">
                    <div class='col-1'></div>
                    <div class='col-6'>
                        <b style="font-size: 27px">2022-2023 : 2EME SEMESTRE:</b>
                    </div>
                </div>
                <br>
                <?php
                if (isset($_GET['id_prof'])) {
                    $id_prof = $_GET['id_prof'];
                    $sql = "SELECT * FROM cours WHERE id_prof = $id_prof";
                    $result = mysqli_query($db_handle, $sql);
                    while ($data = mysqli_fetch_assoc($result)) {
                        echo '<a href="cours.php?id_cours=' . $data['id_cours'] . '&id_prof=' . $id_prof . '">';
                        echo "<div class='row'><div class='col-2'></div><div class='col-2'>";
                        echo '<img class="imgs" src="' . $data['image'] . '"></div>';
                        echo "<div class='col-6' style='background-color: white'><p align='left' class='daheisezie'>" . $data['cours_name'] . "</p></div>";
                        echo '</div></a><br>';
                    }
                }
                ?>
            </div>
            <br>
        </div>
        <br>

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