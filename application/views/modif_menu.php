<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<section class="col-md-10 p-0">
<section class="container-fluid border-bottom mb-3">
<div class="row">
    <h2 class="my-3 ml-2 text-info">
        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-book" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M1 2.828v9.923c.918-.35 2.107-.692 3.287-.81 1.094-.111 2.278-.039 3.213.492V2.687c-.654-.689-1.782-.886-3.112-.752-1.234.124-2.503.523-3.388.893zm7.5-.141v9.746c.935-.53 2.12-.603 3.213-.493 1.18.12 2.37.461 3.287.811V2.828c-.885-.37-2.154-.769-3.388-.893-1.33-.134-2.458.063-3.112.752zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783z"/>
        </svg>
    Modifier le menu "<?= $menu->name ?>"
    </h2>
</div>
<div class="row">
    <div class="alert alert-success col-12" role="alert">
        <p>Vous pouvez modifier le menu. Ajouter un nom de composition et d'y sélectionner les produits associés. La selection se fait de manière multiple.</p>
    </div>
</div>
</section>
<section class="container my-3">

<?echo form_open('menus/modif_menu');?>

    <div class="form-group">
        <input hidden type="number" name="id" class="form-control"value="<?= $menu->id ?>">
    </div>

    <div class="form-group">
        <label for="formGroupExampleInput2">Nom du menu</label>
        <input type="text" name="name" class="form-control w-50" id="formGroupExampleInput2" value="<?= $menu->name ?>">
    </div>
    <div class="form-group">
        <label for="formGroupExampleInput2">Prix du menu</label>
        <input type="text" name="price" class="form-control w-25" id="formGroupExampleInput2" value="<?= $menu->price?>">
    </div>
    <div>
        <button type="submit" class="btn btn-info">Modifier</button>
        <a href="/manager/menus" class="btn btn-dark">Retour</a>
    </div>


<?echo form_close();?>
<?php echo validation_errors('<div class="container alert alert-warning my-3" role="alert">', '</div>'); ?>
</section>

<section class="container my-3">
    <h4>Ajouter une composition</h4>
    <? echo form_open('menus/add_composition')?>

     <div class="form-group">
        <input hidden type="number" name="menu_id" class="form-control"value="<?= $menu->id ?>">
    </div>

    <div class="row form-group d-flex justify-content-around flex-wrap">
        <input type="text" name="name" class="form-control col-md-12 my-3" id="formGroupExampleInput2" placeholder="nom de la composition"">
        <select name="products_id[]" class="custom-select col-md-6" multiple size="15">
            <? foreach($categories as $categorie){?>

                    <optgroup label="<?= $categorie->name?>">

                        <?
                            foreach($products as $k => $v){
                                foreach($v as $info => $prod){?>
                                    <? if($categorie->id == $prod->categorie_id){?>
                                        <option value="<?= $prod->id ?>"><?= $prod->name ?></option>
                                    <?}
                                   
                                }
                            }
                        ?>

                    </optgroup>
            <?}?>
        </select>
        <button type="submit" class="btn btn-dark col-md-1">Ajouter</button>
    </div>

    <? echo form_close(); ?>
</section>
<section class="container my-3" id="composition">
    <h4>Liste de la composition</h4>

    <ul class="list-group">
    <? foreach($composition as $produit){?>

    <li class="list-group-item d-flex justify-content-between align-items-center">
<?  foreach($products as $k => $v){
        foreach($v as $info => $prod){
            if($produit->products_id == $prod->id){
                foreach($categories as $categorie){
                    if($categorie->id == $prod->categorie_id){?>
                        <span class="text-dark">
                            <?= "Nom : $produit->name | Catégorie : $categorie->name | Produit : $prod->name" ?>
                        </span>
                        <a href="/manager/menus/supprimer-la-composition/<?= $menu->id ?>/<?= $menu->name ?>/<?= $produit->id ?>"  class='close' aria-label='Close'>
                            <svg width='1em' height='1em' viewBox='0 0 16 16' class='bi bi-trash' fill='currentColor' xmlns='http://www.w3.org/2000/svg'>
                            <path d='M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z'/>
                            <path fill-rule='evenodd' d='M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z'/>
                            </svg>
                        </a>
                    <?}         
                }
            }                 
        }
    }?>
    </li>
    
    <?}?>
    </ul>
</section