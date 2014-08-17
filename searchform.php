<div class="search-container">
    <form method="get" id="search-form" action="<?php bloginfo('home'); ?>/">
        <fieldset>
            <label for="s">Search</label>
            <input type="text" value="<?php the_search_query(); ?>" name="s" id="s" accesskey="s" tabindex="1" placeholder="search website" />
            <button type="submit" tabindex="2">Go</button>
        </fieldset>
    </form>
</div>