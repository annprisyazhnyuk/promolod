
<form class="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get">
    <input id="search" value="<?php echo get_search_query(); ?>" name="s" type="text" placeholder="Потрiбна допомога?">
    <input id="search_submit" value="Rechercher" type="submit">
</form>