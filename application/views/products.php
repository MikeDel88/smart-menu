<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<section class="col-md-10 p-0">
<section class="container-fluid border-bottom mb-3">
<div class="row">
    <h2 class="my-3 ml-2 text-info">
        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-basket3" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M5.757 1.071a.5.5 0 0 1 .172.686L3.383 6h9.234L10.07 1.757a.5.5 0 1 1 .858-.514L13.783 6H15.5a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5H.5a.5.5 0 0 1-.5-.5v-1A.5.5 0 0 1 .5 6h1.717L5.07 1.243a.5.5 0 0 1 .686-.172zM3.394 15l-1.48-6h-.97l1.525 6.426a.75.75 0 0 0 .729.574h9.606a.75.75 0 0 0 .73-.574L15.056 9h-.972l-1.479 6h-9.21z"/>
        </svg>
    Produits
    </h2>
</section>
<section class="container my-3">
  <h4>Ajouter un produit</h4>
  <?  
    echo form_open('product/add_product'); ?>
        <div class="form-group">
          <label for="exampleFormControlSelect1">Choix de la catégorie :</label>
          <select name="categorie_id" class="form-control" id="exampleFormControlSelect1">

              <option value="#" disabled selected>voir la liste de catégorie...</option>

              <?foreach($categories as $categorie){?>

                  <option value="<?= $categorie->id ?>"><?= $categorie->name ?></option>

              <?}?>

          </select>
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput">Nom du produit :</label>
            <input type="text" name="name" class="form-control" id="formGroupExampleInput">
        </div>
        <div class="form-group">
            <label for="exampleFormControlTextarea1">La composition :</label>
            <textarea name="composition" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>
        <button type="submit" class="btn btn-dark">Ajouter</button>
  <?
    echo form_close();
    echo validation_errors('<div class="container alert alert-warning my-3" role="alert">', '</div>');
  ?>
</section>
<section class="container my-3">
    <div class="accordion" id="accordionExample">
        <? foreach($categories as $categorie) { ?>
        <div class="card">
            <div class="card-header" id="headingOne">
              <h2 class="mb-0">
                <button class="btn bg-info text-light btn-block text-left" type="button" data-toggle="collapse" data-target="#<?= $categorie->name?>"       aria-expanded="true" aria-controls="collapseOne">
                  <?= $categorie->name ?>
                </button>
              </h2>
            </div>
        
            <div id="<?= $categorie->name ?>" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
              <div class="card-body">
                <ul class="list-group-flush">
                <? foreach($products as $product){
                    foreach($product as $prod){
                        if($prod->categorie_id ==  $categorie->id){?>
                        <li class='list-group-item d-flex justify-content-between'>
                            <div>
                                <span><a href="produits/<?= $prod->id ?>/<?= $prod->name ?>"><?=$prod->name ?></a></span>
                            </div>
                        </li>
                       <? }
                    }
                }?>
                </ul>
              </div>
            </div>
        </div>
        <?}?>
    </div>
</section>