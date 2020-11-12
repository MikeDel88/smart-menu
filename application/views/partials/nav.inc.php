<style>
    .custom-control-input:checked~.custom-control-label::before {
    color: #fff;
    border-color: var(--danger);
    background-color: var(--danger);
    cursor:pointer;
    }
    .custom-switch .custom-control-label::before {
        cursor:pointer;
    }
</style>

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
        ?>
        <div class="container-fluid border-bottom pb-3">
            <? echo form_open('dashboard/maintenance');?>
        
            <div class="custom-control custom-switch">
                <input type="checkbox" name="maintenance" class="custom-control-input" id="customSwitch1" <?= ($this->etablissement->maintenance == 1) ? 'checked' : ''?>>
                <label class="custom-control-label <?= ($this->etablissement->maintenance == 1) ? 'text-danger' : 'text-info'?> ?>" for="customSwitch1">Maintenance</label>
            </div>

            <? echo form_close();?>
        </div>
         


    </div>
    
</nav>

<script type="text/javascript">

        let checkBox = document.querySelector('#customSwitch1');

        checkBox.addEventListener('change', function(){
            document.querySelector('nav form').submit();
        })

</script>



