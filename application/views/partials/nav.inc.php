
<nav class="col-sm-12 col-md-2 navbar align-items-start navbar-expand-lg navbar-dark bg-dark shadow vh-100">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="d-flex flex-column-reverse collapse navbar-collapse" id="navbarTogglerDemo03">
        <?
        $list = array(
            anchor('manager/dashboard', 'Tableau de bord', 'class="nav-link"'),
            anchor('manager/etablissement', 'Etablissement', 'class="nav-link"'),
            anchor('manager/personnalisation', 'Personnalisation', 'class="nav-link"'),
            anchor('manager/categories', 'Catégories de produits', 'class="nav-link"'),
            anchor('manager/produits', 'Les produits', 'class="nav-link"'),
            anchor('manager/menus', 'Les menus', 'class="nav-link"'),
            anchor('/deconnexion', 'Déconnexion', 'class="nav-link"'),
        );

        $attributes = array(
            'class' => 'navbar-nav mr-auto mt-2 mt-lg-0 d-flex flex-column',
        );

        echo ul($list, $attributes);

        $attributes = array(
            'class' => 'form-inline my-2 my-lg-0',
        );

        echo form_close();
        ?>
    </div>
</nav>
