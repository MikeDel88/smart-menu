<header style="background-color : <?= $personnalisation->main_color ?>" class="container-fluid text-center py-2 shadow">
    <div class="row">
        <div class="col-sm-12 col-md-2">
           <?
            if(!empty($personnalisation->path_logo)){
                $image_properties = array(
                'src'   => $personnalisation->path_logo,
                'alt'   => "Logo de l'établissement",
                'class' => 'img-thumbnail',
                'width' => '100',
                'height'=> '100',
                'title' => 'Logo',
                );
            
                echo img($image_properties);
            }
            ?>
        </div>
        <div class="col-sm-12 col-md-10 d-flex flex-column justify-content-center">
            <h1 class="py-3 border-bottom" style="color : <?= $personnalisation-> text_color ?>"><?= $etablissement->name ?></h1>
            <p><?= $etablissement->description ?></p>
        </div>
    </div>
</header>

<main class="row m-0">

    <section id="carte" class="col-sm-12 col-md-6 border-right p-0">
        <h2 class="py-2 text-center" style="color : <?= $personnalisation->main_color ?>; background-color : <?= $personnalisation->text_color?>">La carte</h2>
        <? foreach($categories as $categorie){
            echo "<article class='border my-2 py-2'>";
                echo "<h5 class='text-left pl-2'> $categorie->name <span>($categorie->description)</span></h5>";
                if(!empty($product)){
                    echo "<ul>";
                    foreach($product as $prod){
                        if($prod->categorie_id == $categorie->id){

                            if($categorie->sous_categorie == 0){
                                if($prod->price != 0){
                                    echo "<li><strong>$prod->name</strong> | {$prod->price}€</li>";
                                }else{
                                    echo "<li><strong>$prod->name</strong> | gratuit</li>";
                                }
                            }else{
                                echo "<li><strong>$prod->name ($prod->composition)</strong>";
                                foreach($sous_categorie as $sous_cat){
                                    foreach($sous_cat as $sous){
                                        if($sous->cat_id == $categorie->id){
                                            foreach($lien_prod_sous_cat as $lien){
                                                if($lien->product_id == $prod->id && $lien->sous_categorie_id == $sous->id){
                                                    echo "<ul><li>$sous->name | {$lien->price}€</li></ul>";
                                                }
                                            }
                                        }
                                    }
                                    
                                }
                                echo "</li>";
                            }

                        }
                    }
                    echo "</ul>";
                }
            echo "</article>";
            
        }?>

    </section>

    <section id="menu" class="col-sm-12 col-md-6 text-center p-0">
        <h2 class="py-2" style="color : <?= $personnalisation->main_color ?>; background-color : <?= $personnalisation->text_color?>">Les menus</h2>

        <!-- Je parcours chaque menu -->
        <? foreach($menus as $menu){

            // J'écris le nom du menu
            echo "<h5> $menu->name - <span>$menu->price €</span></h5>";
            echo "<ul>";
                // Dans chaque menu je regarde la composition
                foreach($composition_menu as $composition){

                    // Si la composition possède le menu_id du menu en cours dans la boucle alors
                    if($composition->menu_id == $menu->id){

                        // Je parcours chaque produit dans la tableau des compositions
                        foreach($products_menu as $product){

                            // Si dans la composition possède le products_id du produit alors
                            if($composition->products_id == $product->id && $composition->menu_id === $menu->id){

                                //J'écris le résultat
                                echo "<li>$composition->name | $product->name</li>";
                            }
                        }
                    }
  
                }
            echo "</ul>";
        }?>

    </section>

</main>

<footer class="py-3" style="background-color: <?= $personnalisation->main_color?> ; min-height: 100px; color: <?= $personnalisation->text_color ?>">
    <div class="row">
            <div class="col-sm-12 col-md-6 text-center">
                <p><a style="color : <?= $personnalisation-> text_color ?>; text-decoration: underline" href="http://<?= $etablissement->website ?>" target="_blank">Site web</a></p>
                <p>Téléphone : <?= $etablissement->phone ?></p>
            </div>
            <div class="col-sm-12 col-md-6 text-center">
                <h4>Adresse de l'établissement : </h4>
                <p><?= "$etablissement->address  $etablissement->city, $etablissement->code"?></p>
            </div>
    </div>
</footer>