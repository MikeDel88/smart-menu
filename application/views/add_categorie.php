<section class="col-md-10 p-0">
<section class="container-fluid border-bottom mb-3">
<div class="row">
<section>
    <h2 class="my-3 ml-2 text-info">
        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-inbox" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M4.98 4a.5.5 0 0 0-.39.188L1.54 8H6a.5.5 0 0 1 .5.5 1.5 1.5 0 1 0 3 0A.5.5 0 0 1 10 8h4.46l-3.05-3.812A.5.5 0 0 0 11.02 4H4.98zm9.954 5H10.45a2.5 2.5 0 0 1-4.9 0H1.066l.32 2.562a.5.5 0 0 0 .497.438h12.234a.5.5 0 0 0 .496-.438L14.933 9zM3.809 3.563A1.5 1.5 0 0 1 4.981 3h6.038a1.5 1.5 0 0 1 1.172.563l3.7 4.625a.5.5 0 0 1 .105.374l-.39 3.124A1.5 1.5 0 0 1 14.117 13H1.883a1.5 1.5 0 0 1-1.489-1.314l-.39-3.124a.5.5 0 0 1 .106-.374l3.7-4.625z"/>
        </svg>
    Ajouter une catégorie
    </h2>
</section>
</section>
<section class="container">
<? echo form_open('categorie/add_categorie'); ?>
    <div class="form-group">
        <label for="name">Nom de la catégorie</label>
        <input type="text" name="name" class="form-control" id="name" aria-describedby="name_info" placeholder="Entrer un nom">
        <small id="name_info" class="form-text text-muted">Entrez un nom court mais efficace</small>
    </div>
    <div class="form-group">
        <label for="description">Description</label>
        <input type="text" name="description" class="form-control" id="description" aria-describedby="description_info" placeholder="Entrer une description">
        <small id="description_info" class="form-text text-muted">Renseignez la description précise de la catégorie</small>
    </div>
    <div class="form-group form-check">
        <input type="checkbox" name="sous_categorie" class="form-check-input" id="exampleCheck1">
        <label class="form-check-label" for="exampleCheck1">Ajouter des sous-catégories</label>
    </div>
    <div>
        <button type="submit" class="btn btn-info">Ajouter</button>
        <a href="/manager/categories" class="btn btn-dark">Retour</a>
    </div>
<? echo form_close(); ?>
<?php echo validation_errors('<div class="container alert alert-warning my-3" role="alert">', '</div>'); ?>
</section>