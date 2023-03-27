
<?php 

if (!isset($_SESSION['connected'])){


?>
<div id="navbar">
    <li><a href="./">Home</a></li>
    <li><a href="./chocoblastShow">Voir tout les Chocoblast</a></li>
    <li><a href="./userAdd">Inscription</a></li>
    <li><a href="./connexion">Connexion</a></li>

</div>
<?php
}
else{
?>
<div id="navbar">
    <li><a href="./">Home</a></li>
    <!-- <li><a href="./rolesAdd">Ajouter Role</a></li> -->
    <li><a href="./chocoblastAdd">Ajouter Chocoblast</a></li>
    <li><a href="./chocoblastShow">Voir tout les Chocoblast</a></li>
    <li><a onclick="return confirm('Vous souhaitez quitter votre session ?')"href="./deconnexion">Deconnexion</a></li>


</div>

<?php
}
?>