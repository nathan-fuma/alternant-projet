 <!-- Navigation -->
  <nav class="navbar navbar-light bg-light static-top">
    <div class="container">
        <a class="navbar-brand" href="../index.php">
            <img src="../img/logo.png" width="45" class="d-inline-block align-items-center mr-2" alt="">
            Université La Rochelle
        </a>
        <a class="nav-link text-dark" href="../licence.php">Licence informatique</a>
        <a class="nav-link text-dark" href="../master.php">Master ICONE</a>
        <a class="btn nav-link" href="#" data-toggle="modal" data-target="#exampleModal2">Connectez-vous</a>
    </div>
  </nav>

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
                 <form action="" method="post">
                     <div class="form-group">
                         <label for="InputLogin">Login</label>
                         <input type="text" class="form-control" name="mail" id="InputLogin" aria-describedby="loginHelp" placeholder="Login">
                     </div>
                     <div class="form-group">
                         <label for="InputPassword1">Mot de passe</label>
                         <input type="password" class="form-control" name="mdp" id="InputPassword1" placeholder="Mot de passe">
                     </div>
                     <div class="modal-footer">
                         <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                         <button type="submit" class="btn btn-primary" name="connectionSubmit">Connection</button>
                     </div>
                 </form>
             </div>
         </div>
     </div>
 </div>