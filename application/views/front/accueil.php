<section class="container">
    <div class="row">
        <div class="col align-self-center shadow p-0">
            <div class="text-center bg-dark p-3">
                <a class="text-info" href="/sign-up">S'inscrire</a>
            </div>
            <div class="text-center bg-dark p-3">
                <a class="text-info" href="/sign-in">Se connecter</a>
            </div>
                <p class="bg-dark text-light border-top p-2 m-0">
                    Ce site permet d'afficher une carte de restaurant en ligne accessible via une url unique pour votre établissement.
                    Vous pouvez tout personnaliser à votre goût selon vos envies.
                </p>
        </div>
        <div class="col">
            <?
                $image_properties = array(
                    'src'   => './assets/logo.jpg',
                    'alt'   => "Logo",
                    'class' => 'img-thumbnail',
                    'width' => '500',
                    'height'=> '500',
                    'title' => 'Logo',
                );

                echo img($image_properties);
            ?>
        </div>
    </div>
</section>