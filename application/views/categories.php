<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<section class="col-md-10 p-0">
<section class="container-fluid border-bottom mb-3">
<div class="row">
<section>
    <h2 class="my-3 ml-2 text-info">
        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-inbox" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M4.98 4a.5.5 0 0 0-.39.188L1.54 8H6a.5.5 0 0 1 .5.5 1.5 1.5 0 1 0 3 0A.5.5 0 0 1 10 8h4.46l-3.05-3.812A.5.5 0 0 0 11.02 4H4.98zm9.954 5H10.45a2.5 2.5 0 0 1-4.9 0H1.066l.32 2.562a.5.5 0 0 0 .497.438h12.234a.5.5 0 0 0 .496-.438L14.933 9zM3.809 3.563A1.5 1.5 0 0 1 4.981 3h6.038a1.5 1.5 0 0 1 1.172.563l3.7 4.625a.5.5 0 0 1 .105.374l-.39 3.124A1.5 1.5 0 0 1 14.117 13H1.883a1.5 1.5 0 0 1-1.489-1.314l-.39-3.124a.5.5 0 0 1 .106-.374l3.7-4.625z"/>
        </svg>
    Catégories
    </h2>
</section>
</div>
<div class="row">
    <div class="alert alert-success col-12" role="alert">
        <p>Dans cette rubrique, vous trouverez la liste des catégories ainsi que le nombre de produit rattaché. <span class="bg-warning text-dark">Attention ! Si vous supprimer une catégorie, tous les produits et toutes les sous catégories associées seront automatiquement effacer.</span></p>
    </div>
</div>
</section>
<section class="container">
<ul class="list-group">
    <? foreach($categories as $categorie){?>

     <li class="list-group-item d-flex justify-content-between align-items-center">
        <a href="categories/modifier-une-categorie/<?= $categorie->id ?>/<?= $categorie->name?>" class="text-info"><?= $categorie->name ?></a>
        <? foreach($counts as $count){
            if($count->categorie_id == $categorie->id){?>
                <span class="badge badge-info badge-pill">
                    <?= $count->nbrProduit ?> 
                    <?= ($count->nbrProduit == 1) ? "Produit" : "Produits" ?>
                </span>
            <?}
        }?>  
    </li>
    
    <?}?>
</ul>
<div class="my-3">
    <a href="categories/ajouter-une-categorie" class="btn btn-info">Ajouter une catégorie</a>
</div>
</section>