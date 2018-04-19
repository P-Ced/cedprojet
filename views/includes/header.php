<header class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
    <a class="navbar-brand" href="index">Mon projet</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item <?php if($title =='Accueil'){echo 'active';}?>">
                <a class="nav-link" href="index">Accueil <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item <?php if($title =='A propos'){echo 'active';}?>">
                <a class="nav-link" href="about">A propos</a>
            </li>
            <?php if(!empty($_SESSION['login'])){include 'admin_menu.php';}?>
        </ul>
        <?php
        if(empty($_SESSION['login']))
        {
                echo "<a class=\"btn btn-outline-success\" href=\"login\">S'identifier</a>";
        }
        else {
                echo "<div class=\"btn btn-secondary\">Salut ".$_SESSION['login']."</div>";
                echo "<a class=\"btn btn-outline-success\" href=\"logout\">Se déconnecter</a>";
        }
        ?>
    </div>
</header>
