<section class="col-md-10 p-0">
<section class="container-fluid border-bottom mb-3">
<div class="row">
<section>
    <h2 class="my-3 ml-2 text-info">
        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-inbox" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M4.98 4a.5.5 0 0 0-.39.188L1.54 8H6a.5.5 0 0 1 .5.5 1.5 1.5 0 1 0 3 0A.5.5 0 0 1 10 8h4.46l-3.05-3.812A.5.5 0 0 0 11.02 4H4.98zm9.954 5H10.45a2.5 2.5 0 0 1-4.9 0H1.066l.32 2.562a.5.5 0 0 0 .497.438h12.234a.5.5 0 0 0 .496-.438L14.933 9zM3.809 3.563A1.5 1.5 0 0 1 4.981 3h6.038a1.5 1.5 0 0 1 1.172.563l3.7 4.625a.5.5 0 0 1 .105.374l-.39 3.124A1.5 1.5 0 0 1 14.117 13H1.883a1.5 1.5 0 0 1-1.489-1.314l-.39-3.124a.5.5 0 0 1 .106-.374l3.7-4.625z"/>
        </svg>
    Modifier le produit "<?= $product->name?>"
    </h2>
</section>
</div>
<div class="row">
    <div class="alert alert-success col-12" role="alert">
        <p>Si vous ne voyez pas de prix dans la partie "Rappel des prix en cours" c'est que vous avez sélectionné d'avoir des sous-catégories, et qu'aucune sous-catégorie n'a été créee. Attention, les suppressions sont définitives !</p>
    </div>
</div>
</section>
<section class="container">
    <? echo form_open("product/modif_product"); ?>

        <div class="form-group">
            <input hidden type="number" name="product_id" class="form-control"value="<?= $product->id ?>">
        </div>
        <div class="form-group">
            <label for="add">Nom du produit : </label>
            <input type="text" name="name" class="form-control" id="add" aria-describedby="textHelp" value="<?= $product->name ?>">
        </div>
        <div class="form-group">
            <label for="add">Composition du produit : </label>
            <input type="text" name="composition" class="form-control" id="add" aria-describedby="textHelp" value="<?= $product->composition ?>">
        </div>

        <? if(!empty($sous_categories) && $categorie->sous_categorie == 1){?>

            <div class="form-group">
            <label for="add">Sous-catégories du produit : </label>
                <select class="form-control" name="sous_categorie_id" id="sous_categorie">
                    <option value="#" disabled selected>Prix unitaire</option>

                    <? foreach($sous_categories as $sous_categorie){?>
                
                    <option value="<?= $sous_categorie->id ?>"><?= $sous_categorie->name?></option>

                    <?};?>

                </select>
            </div>

        <?}?>

            <div class="form-group">
                <label for="add">Prix du produit : </label>
                <input type="text" name="price" class="form-control" id="add" aria-describedby="textHelp" value="<?= $product->price ?>">
            </div>

            <div class="d-flex justify-content-between mt-3">
                <div>
                    <button type="submit" class="btn btn-dark">Modifier</button>
                    <?= anchor('manager/produits', 'Retour', 'class="btn btn-info"'); ?>
                </div>
                <div>
                    <a href="/manager/produits/supprimer-un-produit/<?= $product->id ?>" class="btn btn-danger">Supprimer le produit</a>
                </div>
            </div>
        
    <? echo form_close(); ?>

</section>
<section class="container my-3">
<h4>Rappel des prix en cours :</h4>
<ul class="list-group">
    <? 
    if(!empty($prix) && $categorie->sous_categorie == 1){
        
        foreach($prix as $lien){?>
        <? 
            if(!empty($lien)){ ?>

                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <span><?= "$lien->prod_name / $lien->sous_cat_name / $lien->price €"?></span>
                    <a href="supprimer-une-sous-categorie/<?= $lien->prod_name ?>/<?= $lien->sous_cat_id ?>" class="btn btn-danger">
                        <svg width='1em' height='1em' viewBox='0 0 16 16' class='bi bi-trash' fill='currentColor' xmlns='http://www.w3.org/2000/svg'>
                            <path d='M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z'/>
                            <path fill-rule='evenodd' d='M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z'/>
                        </svg>
                    </a>
                </li>

            <?} ?>   
        <?}
    }elseif($categorie->sous_categorie == 0){?>
        <li class="list-group-item d-flex justify-content-between align-items-center">
            <span><?= "$product->name / $product->price €"?></span>
        </li>
    <?}?>
</ul>
</section>