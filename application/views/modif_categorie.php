<section class="col-md-10 p-0">
<section class="container-fluid border-bottom mb-3">
<div class="row">
<section>
    <h2 class="my-3 ml-2 text-info">
        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-inbox" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M4.98 4a.5.5 0 0 0-.39.188L1.54 8H6a.5.5 0 0 1 .5.5 1.5 1.5 0 1 0 3 0A.5.5 0 0 1 10 8h4.46l-3.05-3.812A.5.5 0 0 0 11.02 4H4.98zm9.954 5H10.45a2.5 2.5 0 0 1-4.9 0H1.066l.32 2.562a.5.5 0 0 0 .497.438h12.234a.5.5 0 0 0 .496-.438L14.933 9zM3.809 3.563A1.5 1.5 0 0 1 4.981 3h6.038a1.5 1.5 0 0 1 1.172.563l3.7 4.625a.5.5 0 0 1 .105.374l-.39 3.124A1.5 1.5 0 0 1 14.117 13H1.883a1.5 1.5 0 0 1-1.489-1.314l-.39-3.124a.5.5 0 0 1 .106-.374l3.7-4.625z"/>
        </svg>
    Modifier une catégorie
    </h2>
</section>
</section>
<section class="container">
    <h3 class="my-3">Modifier la catégorie "<?= $categorie->name?>"</h3>
    <? echo form_open("categorie/modif_categorie"); ?>
        <div class="form-group">
            <input hidden type="number" name="id" class="form-control"value="<?= $categorie->id ?>">
        </div>
        <div class="form-group">
            <label for="add">Nom de la catégorie : </label>
            <input type="text" name="name" class="form-control" id="add" aria-describedby="textHelp" value="<?= $categorie->name ?>">
        </div>
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Description de la catégorie :</label>
            <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3"><?= $categorie->description ?></textarea>
        </div>

        <div class="custom-control custom-switch">
                <input type="checkbox" name="sous_categorie" class="custom-control-input" id="customSwitch2" <?= ($categorie->sous_categorie == 1) ? 'checked' : ''?>>
                <label class="custom-control-label" for="customSwitch2">Ajouter les sous-catégories</label>
            </div>
        <div class="d-flex justify-content-between mt-3">
            <div>
                <button type="submit" class="btn btn-dark">Modifier</button>
                <?= anchor('manager/categories', 'Retour', 'class="btn btn-info"'); ?>
            </div>
            <div>
                <a href="/manager/categories/supprimer-une-categorie/<?= $categorie->id ?>" class="btn btn-danger">Supprimer la catégorie</a>
            </div>
        </div>

    <? echo form_close(); ?>
</section>
<? if($categorie->sous_categorie == 1 && !empty($sous_categories)){?>

<section class="container mt-3 border p-3">
<h4>Liste des sous-catégories</h4>
    <div class="row">
        <ul class="col-12 list-group list-group-flush">

        <?foreach($sous_categories as $sous_categorie){ ?>  
            <li class="list-group-item">
            <?= "#$sous_categorie->id - $sous_categorie->name 
            <a href='/manager/categories/supprimer-la-sous-categorie/$sous_categorie->id/$categorie->id/$categorie->name' class='close' aria-label='Close'>
                <svg width='1em' height='1em' viewBox='0 0 16 16' class='bi bi-trash' fill='currentColor' xmlns='http://www.w3.org/2000/svg'>
                    <path d='M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z'/>
                    <path fill-rule='evenodd' d='M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z'/>
                </svg>
            </a>"?>
            </li>   
        <?};?>
        
        </ul>
    </div>
</section>
<?}?>

<? if($categorie->sous_categorie == 1) {?>
    <section class="container-fluid">
    <? echo form_open('categorie/add_sous_categorie'); ?>
        <div class="form-group">
            <input hidden type="number" name="cat_id" class="form-control"value="<?= $categorie->id ?>">
        </div>
        <div class="form-group">
            <label for="add">Nom de la sous-catégorie : </label>
            <input type="text" name="name" class="form-control" id="add" aria-describedby="textHelp">
        </div>
        <div>
            <button type="submit" class="btn btn-dark mt-3">Ajouter</button>
        </div>
    <? echo form_close();?>
    </section>
<?}?>
