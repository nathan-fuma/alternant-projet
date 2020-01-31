<?php


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="/assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="/assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>
        Directeur de formation
    </title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <!-- CSS Files -->
    <link href="/assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="/assets/fontawesome-free/css/all.css" rel="stylesheet" />
    <link href="/assets/css/paper-dashboard.css?v=2.0.0" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
</head>

<body class="">
<h5 class="text-center m-3 mb-5"><a data-toggle="modal" data-target="#exampleModal2" class="text-primary">Connectez-vous</a> pour accéder aux gestionnaire des formations.</h5>
<!--- MODAL CONNECTEZ-VOUS -->
<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Connectez-vous</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php
            $pb=false;
            if(isset($_GET['errorConn'])){
                if(!empty($_GET['errorConn']) && $_GET['errorConn']=='true'){
                    echo '<div class="alert alert-warning alert-dismissible fade show m-0" role="alert"><strong>Erreur dans le login</strong><br>Completez correctement votre mot de passe et votre adresse e-mail<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
                    $pb=true;
                }
            }
            ?>
            <div class="modal-body">
                <form action="includes/authentication.php" method="post">
                    <div class="form-group">
                        <label for="InputLogin">Login</label>
                        <input type="text" class="form-control" name="login" id="InputLogin" aria-describedby="loginHelp" placeholder="Login">
                    </div>
                    <div class="form-group">
                        <label for="InputPassword1">Mot de passe</label>
                        <input type="password" class="form-control" name="pass" id="InputPassword1" placeholder="Mot de passe">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                        <button type="submit" class="btn btn-primary" name="connectionSubmit">Connexion</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!--   Core JS Files   -->
<script src="/assets/js/core/jquery.min.js"></script>
<script src="/assets/js/core/popper.min.js"></script>
<script src="/assets/js/core/bootstrap.min.js"></script>
<script src="/assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
<script defer src="/assets/fontawesome-free/js/all.js"></script>
<!-- Chart JS -->
<script src="/assets/js/plugins/chartjs.min.js"></script>
<!--  Notifications Plugin    -->
<script src="/assets/js/plugins/bootstrap-notify.js"></script>
<!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
<script src="/assets/js/paper-dashboard.min.js?v=2.0.0" type="text/javascript"></script>
<!-- Paper Dashboard DEMO methods, don't include it in your project! -->
<script src="/assets/demo/demo.js"></script>
<script>
    function SelectText(element) {
        var doc = document,
            text = element,
            range, selection;
        if (doc.body.createTextRange) {
            range = document.body.createTextRange();
            range.moveToElementText(text);
            range.select();
        } else if (window.getSelection) {
            selection = window.getSelection();
            range = document.createRange();
            range.selectNodeContents(text);
            selection.removeAllRanges();
            selection.addRange(range);
        }
    }
    window.onload = function() {
        var iconsWrapper = document.getElementById('icons-wrapper'),
            listItems = iconsWrapper.getElementsByTagName('li');
        for (var i = 0; i < listItems.length; i++) {
            listItems[i].onclick = function fun(event) {
                var selectedTagName = event.target.tagName.toLowerCase();
                if (selectedTagName == 'p' || selectedTagName == 'em') {
                    SelectText(event.target);
                } else if (selectedTagName == 'input') {
                    event.target.setSelectionRange(0, event.target.value.length);
                }
            }

            var beforeContentChar = window.getComputedStyle(listItems[i].getElementsByTagName('i')[0], '::before').getPropertyValue('content').replace(/'/g, "").replace(/"/g, ""),
                beforeContent = beforeContentChar.charCodeAt(0).toString(16);
            var beforeContentElement = document.createElement("em");
            beforeContentElement.textContent = "\\" + beforeContent;
            listItems[i].appendChild(beforeContentElement);

            //create input element to copy/paste chart
            var charCharac = document.createElement('input');
            charCharac.setAttribute('type', 'text');
            charCharac.setAttribute('maxlength', '1');
            charCharac.setAttribute('readonly', 'true');
            charCharac.setAttribute('value', beforeContentChar);
            listItems[i].appendChild(charCharac);
        }
    }
</script>
</body>

</html>