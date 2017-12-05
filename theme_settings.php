<?php
/** Dev **/
function dd( $target ){
    echo "<pre>";
    var_dump( $target );
    echo "</pre>";
    die();
}

/** Themes  **/

//Ajout de scripts js
add_action("admin_enqueue_scripts", "load_js");
function load_js(){
    wp_enqueue_script( "colorjs", get_template_directory_uri()."/js/jscolor.min.js" );
}

// On va déclencher une action au moment ou le menu admin se charge
add_action("admin_menu", "generate_theme_menu");
add_action("admin_init", "add_option_home_category");

function add_option_home_category(){

    // On créer une option dans la bdd pour le choix de la categorie
    add_option("home_category", "");

}
function generate_theme_menu(){
    add_menu_page(
        "Pierre Theme",
        "Pierre Theme",
        "administrator",
        "pierre_theme_menu", // Slug : un nom tout accroché sans charactere special en minuscule
        "generate_theme_menu_page", // Fonction appelé pour afficher la page
        "dashicons-welcome-widgets-menus",
        60
    );
}

function generate_theme_menu_page(){

    if( isset( $_POST["home_category"] ) ){
        update_option( "home_category", $_POST["home_category"] );
    }

    $option_val = get_option("home_category");
    $categories = get_categories();

    ?> 

    <h1> Administration de Pierre Theme </h1>

    <h2> Page d'accueil </h2> 

    <form method="post">

        <label>

            <span> Choix de la catégorie a afficher: </span>
            <select name="home_category">

                <?php foreach( $categories as $category ){ ?> 
                        
                    <option value="<?= $category->cat_ID ?>" <?php isSelected($category->cat_ID) ?> > 

                        <?= $category->name ?> 

                    </option>

                <?php } ?>

            </select>

        </label>

        <input type="submit" value="Valider">

    </form>

    <input type="text" class="jscolor" value="fff" >

    <?php 
}

function isSelected( $value ){
    if( $value == get_option("home_category") ){
        echo "selected";
    }
}