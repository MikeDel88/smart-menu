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
            <p style="color : <?= $personnalisation-> text_color ?>"><?= $etablissement->description ?></p>
        </div>
    </div>
</header>
<main class="row m-0">
    <section class="col-12 bg-warning">
        <h2 class="text-center">Ce menu est en cours de maintenance</h2>
        <div>
          <?
                $image_properties = array(
                    'src'   => './assets/maintenance.jpg',
                    'alt'   => "Maintenance",
                    'class' => 'img-thumbnail',
                    'width' => '100%',
                    'height'=> 'auto',
                    'title' => 'Logo',
                );

                echo img($image_properties);
            ?>
        </div>
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