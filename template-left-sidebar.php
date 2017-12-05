<?php 
/* 
    Template Name: Left Sidebar
*/

get_header();
?> 
    <div id="template-container"> 

        <div class="left-content">
            <?php dynamic_sidebar( "left_sidebar" ); ?>
        </div>

        <div class="content">

            <?php 

                while( have_posts() ){

                    the_post();

                    the_title("<h1>", "</h1>");
                    the_content();

                }

            ?> 

        </div>

    </div> 
<?php 
get_footer(); 