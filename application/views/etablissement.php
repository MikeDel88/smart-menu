<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<section class="col-md-10 p-0">
<section class="container-fluid border-bottom mb-3">
<div class="row">
    <h2 class="my-3 ml-2 text-info">
        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-shop" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M2.97 1.35A1 1 0 0 1 3.73 1h8.54a1 1 0 0 1 .76.35l2.609 3.044A1.5 1.5 0 0 1 16 5.37v.255a2.375 2.375 0 0 1-4.25 1.458A2.371 2.371 0 0 1 9.875 8 2.37 2.37 0 0 1 8 7.083 2.37 2.37 0 0 1 6.125 8a2.37 2.37 0 0 1-1.875-.917A2.375 2.375 0 0 1 0 5.625V5.37a1.5 1.5 0 0 1 .361-.976l2.61-3.045zm1.78 4.275a1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0 1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0 1.375 1.375 0 1 0 2.75 0V5.37a.5.5 0 0 0-.12-.325L12.27 2H3.73L1.12 5.045A.5.5 0 0 0 1 5.37v.255a1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0zM1.5 8.5A.5.5 0 0 1 2 9v6h1v-5a1 1 0 0 1 1-1h3a1 1 0 0 1 1 1v5h6V9a.5.5 0 0 1 1 0v6h.5a.5.5 0 0 1 0 1H.5a.5.5 0 0 1 0-1H1V9a.5.5 0 0 1 .5-.5zM4 15h3v-5H4v5zm5-5a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-2a1 1 0 0 1-1-1v-3zm3 0h-2v3h2v-3z"/>
        </svg>
     Etablissement
    </h2>
</div>
<div class="row">
    <p class="ml-2">Dernière mise à jour : <?= mdate('Le %d/%m/%Y à %H:%i', mysql_to_unix($this->etablissement->updated_at)); ?> </p>
</div>
</section>
<section class="container">
<?php echo form_open('manager/etablissement'); ?>

    <div class="form-group d-flex flex-wrap-reverse justify-content-around">
        <div class="form-group">
            <label for="title">Nom de l'établissement :</label>
            <input type="text" class="form-control" name="name" id="title" value="<?= $this->etablissement->name ?>">
        </div>
        <div class="form-group">
            <div class="input-group-prepend">
                  <div class="input-group-text bg-info text-light"><?= base_url() . "menu/"?></div>
            </div>
            <input type="text" class="form-control" name="address_menu" id="menu" value="<?= $this->etablissement->address_menu ?>">
        </div>
    </div>

    <div class="form-group">
        <label for="description">Description : </label>
        <textarea class="form-control" id="description" name="description" rows="3"><?= $this->etablissement->description ?></textarea>
    </div>

    <div class="form-group">
        <label for="adresse">Adresse de l'établissement : </label>
        <div class="form-row">
            <div class="input-group mb-2">
                <div class="input-group-prepend">
                  <div class="input-group-text bg-info text-light">Voie</div>
                </div>
                <input type="text" name="address" class="form-control" id="inlineFormInputGroup" value="<?= $this->etablissement->address ?>">
            </div>
            <div class="input-group mb-2">
                <div class="input-group-prepend">
                  <div class="input-group-text bg-info text-light">Ville</div>
                </div>
                <input type="text" name="city" class="form-control" id="inlineFormInputGroup" value="<?= $this->etablissement->city ?>">
            </div>
            <div class="input-group mb-2">
                <div class="input-group-prepend">
                  <div class="input-group-text bg-info text-light">Code Postal</div>
                </div>
                <input type="text" name="code" class="form-control" id="inlineFormInputGroup" value="<?= $this->etablissement->code ?>">
            </div>
        </div>
        <div class="form-group my-3">
        <label for="adresse">Informations de l'établissement : </label>
        <div class="form-row">
            <div class="input-group mb-2">
                <div class="input-group-prepend">
                  <div class="input-group-text bg-info text-light">Site Web</div>
                </div>
                <input type="text" name="website" class="form-control" id="inlineFormInputGroup" value="<?= $this->etablissement->website ?>">
            </div>
            <div class="input-group mb-2">
                <div class="input-group-prepend">
                  <div class="input-group-text bg-info text-light">Téléphone</div>
                </div>
                <input type="tel" name="phone" class="form-control" id="inlineFormInputGroup" value="<?= $this->etablissement->phone ?>">
            </div>
        </div>
    </div>
     
    <input class="btn btn-dark shadow" type="submit" value="Enregistrer les modifications" />
<? 
    echo form_close();
    
    if(isset($info)){ ?>
        <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
            <strong><?= $info ?></strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
             <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?}
?>
</section>
</section>
