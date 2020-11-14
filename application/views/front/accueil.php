
<section class="container-fluid d-flex flex-wrap justify-content-around bg-dark py-3">
            <div class="text-center bg-dark">
                <a class="text-info" href="/sign-up">S'inscrire</a>
            </div>
            <div class="text-center bg-dark">
                <a class="text-info" href="/sign-in">Se connecter</a>
            </div>
</section>
<section class="container-fluid d-flex flex-wrap justify-content-around my-3">

        <div class="min-vh-50 bg-light shadow max-vw-50 p-0 m-3">
                <p class="text-dark border-top p-2 m-0">
                    Ce site permet d'afficher une carte de restaurant en ligne accessible via une url unique pour votre établissement.
                    Vous pouvez tout personnaliser à votre goût selon vos envies.
                </p>
        </div>
        <div>
          <?
                $image_properties = array(
                    'src'   => './assets/logo.jpg',
                    'alt'   => "Logo",
                    'class' => 'img-thumbnail',
                    'width' => '300',
                    'height'=> '300',
                    'title' => 'Logo',
                );

                echo img($image_properties);
            ?>
        </div>

</section>