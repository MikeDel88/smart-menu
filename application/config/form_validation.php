<?
$config = array(
        'user/sign_in' => array(
                array(
                        'field' => 'email',
                        'label' => 'Email',
                        'rules' => 'trim|required|valid_email'
                ),
                array(
                        'field' => 'password',
                        'label' => 'Password',
                        'rules' => 'trim|required|min_length[3]|max_length[12]'
                ),
        ),
        'dashboard/etablissement' => array(
                array(
                        'field' => 'name',
                        'label' => 'name',
                        'rules' => 'required'
                ),
                array(
                        'field' => 'description',
                        'label' => 'description',
                        'rules' => 'required'
                ),
                array(
                        'field' => 'address',
                        'label' => 'address',
                        'rules' => 'required'
                ),
                array(
                        'field' => 'address_menu',
                        'label' => 'address_menu',
                        'rules' => 'required'
                ),
                array(
                        'field' => 'city',
                        'label' => 'city',
                        'rules' => 'required'
                ),
                array(
                        'field' => 'code',
                        'label' => 'code',
                        'rules' => 'required|exact_length[5]'
                ),
                array(
                        'field' => 'website',
                        'label' => 'website',
                        'rules' => 'required|valid_url'
                ),
                array(
                        'field' => 'phone',
                        'label' => 'phone',
                        'rules' => 'required|exact_length[10]'
                ),
        ),
        'personnalisation/colors_upload' => array(
                array(
                        'field' => 'main_color',
                        'label' => 'main_color',
                        'rules' => 'required'
                ),
                array(
                        'field' => 'text_color',
                        'label' => 'text_color',
                        'rules' => 'required'
                ),
        ),
        'categorie/add_categorie' => array(
                array(
                        'field' => 'name',
                        'label' => 'name',
                        'rules' => 'required'
                ),
                array(
                        'field' => 'description',
                        'label' => 'description',
                        'rules' => 'required'
                ),
                array(
                        'field' => 'sous_categorie',
                        'label' => 'sous_categorie'
                )

        ),
        'categorie/modif_categorie' => array(
                array(
                        'field' => 'name',
                        'label' => 'name',
                        'rules' => 'required'
                ),
                array(
                        'field' => 'description',
                        'label' => 'description',
                        'rules' => 'required'
                )

        ),
        'product/add_product' => array(
                array(
                        'field' => 'categorie_id',
                        'label' => 'categorie_id',
                        'rules' => 'required|integer'
                ),
                array(
                        'field' => 'name',
                        'label' => 'name',
                        'rules' => 'required'
                ),
                array(
                        'field' => 'composition',
                        'label' => 'composition',
                ),
        ),
        'product/modif_product' => array(
                array(
                        'field' => 'name',
                        'label' => 'name',
                        'rules' => 'required'
                ),
                array(
                        'field' => 'composition',
                        'label' => 'composition',
                ),
                array(
                        'field' => 'price',
                        'label' => 'price',
                        'rules' => 'required'
                ),
        ),
        'user/sign_up' => array(
                array(
                        'field' => 'email',
                        'label' => 'email',
                        'rules' => 'trim|required|valid_email|is_unique[users.email]'
                ),
                array(
                        'field' => 'password',
                        'label' => 'password',
                        'rules' => 'trim|required|min_length[3]|max_length[12]'
                ),
                array(
                        'field' => 'password_confirm',
                        'label' => 'password_confirm',
                        'rules' => 'trim|required|matches[password]'
                ),
        ),
        'categorie/add_sous_categorie' => array(
                array(
                        'field' => 'name',
                        'label' => 'name',
                        'rules' => 'trim|required'
                )
        ),
        'menus/add_menu' => array(
                array(
                        'field' => 'name',
                        'label' => 'name',
                        'rules' => 'required'
                ),
                array(
                        'field' => 'price',
                        'label' => 'price',
                        'rules' => 'required'
                ),
        ),
        'menus/modif_menu' => array(
                array(
                        'field' => 'id',
                        'label' => 'id',
                ),
                array(
                        'field' => 'name',
                        'label' => 'name',
                        'rules' => 'required'
                ),
                array(
                        'field' => 'price',
                        'label' => 'price',
                        'rules' => 'required'
                ),
        ),
        'menus/add_composition' => array(
                array(
                        'field' => 'menu_id',
                        'name' => 'menu_id'
                ),
                array(
                        'field' => 'name',
                        'label' => 'name',
                        'rules' => 'required'
                ),
                array(
                        'field' => 'products_id[]',
                        'label' => 'products_id',
                        'rules' => 'required'
                )
        ),
        'dashboard/maintenance' => array(
                array(
                        'field' => 'maintenance',
                        'label' => 'maintenance'
                )
        )


);