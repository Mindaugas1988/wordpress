<div class="w3-quarter" id="side">

<ul id="sidebar">
    <?php
    if(is_active_sidebar('master_sidebar')){
        get_search_form();
        dynamic_sidebar( 'master_sidebar' );
    }
    ?>
</ul>


</div>

