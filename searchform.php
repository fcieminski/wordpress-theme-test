<form action="/" method="get">
    <label for="search">Szukaj</label>
    <input type="hidden" name="cat" value="3">
    <input type="text" name="s" id="search" value="<?php the_search_query() ?>">
    <button type="submit">Ok!</button>
</form>