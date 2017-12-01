<?php 
    $content = get_the_content();
    $thumbnail = get_the_post_thumbnail(null, 'medium'); // balise image complete
    $thumb_url = get_the_post_thumbnail_url(null, 'full'); //uniquement l'url
?>
<div class='flex'>

    <div class='thumbnail-image' style='background-image: url(<?= $thumb_url ?>)'>
        
        <!-- <?= $thumbnail ?> -->

    </div>
    
    <div class='content-article'>

        <p> <?= $content ?> </p>
        
    </div>

</div>