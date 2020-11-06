<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<section class="col-md-10 p-0">
<section class="container-fluid border-bottom mb-3">
<div class="row">
    <h2 class="col-12 my-3 text-info">
        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-house-door" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M7.646 1.146a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 .146.354v7a.5.5 0 0 1-.5.5H9.5a.5.5 0 0 1-.5-.5v-4H7v4a.5.5 0 0 1-.5.5H2a.5.5 0 0 1-.5-.5v-7a.5.5 0 0 1 .146-.354l6-6zM2.5 7.707V14H6v-4a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 .5.5v4h3.5V7.707L8 2.207l-5.5 5.5z"/>
            <path fill-rule="evenodd" d="M13 2.5V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"/>
        </svg>
     Dashboard
    </h2>
</div>
<div class="row">
     <p class="col-12">Crée le <?= mdate('%d/%m/%Y', mysql_to_unix($this->etablissement->created_at)); ?> </p>
</div>  
</section>
<section class="container">
    <div class="row">
    <?
    $image_properties = array(
        'src'   => $personnalisation->path_logo,
        'alt'   => "Logo de l'établissement",
        'class' => 'img-thumbnail',
        'width' => '200',
        'height'=> '200',
        'title' => 'Logo',
    );

    echo img($image_properties);
    ?>
    </div>
    <div class="row">
        <ul class="col-12 list-group list-group-flush">
            <li class="list-group-item">Etablissement : <?= $this->etablissement->name ?></li>
            <li class="list-group-item">Description : <?= $this->etablissement->description ?></li>
            <li class="list-group-item">Adresse : <?= "{$this->etablissement->address}, {$this->etablissement->code} {$this->etablissement->city} "?></li>
            <li class="list-group-item">Site web : <a href='http://<?= $this->etablissement->website?>' target='_blank' class='text-info'>  <?=     $this->etablissement->website?></a></li>
            <li class="list-group-item">Téléphone : <?= $this->etablissement->phone?></li>
        </ul>
    </div>
</section>
</section>



