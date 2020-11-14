<? echo doctype('html5'); ?>
<html lang="fr">
    <head>
        <? 
            echo meta('charset', 'UTF-8'); 
            $data = array(
                'href' => 'https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css',
                'rel' => 'stylesheet',
                'integrity' => "sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2",
                'crossorigin' => 'anonymous'
            );
            echo link_tag($data);

            if(isset($personnalisation)){?>
                <link rel="icon" type="image/png" href="<?= $personnalisation->path_logo ?>" />
            <?}
        ?>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?= $title ?></title>
    </head>
    <body>
        



