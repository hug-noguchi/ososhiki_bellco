<form class="header__search" method="get" action="<?php echo home_url(); ?>" role="search">
          <input class="search-input" type="search" name="s" placeholder="記事を検索">
          <button class="search-submit" type="submit" role="button"><img src="<?php echo get_template_directory_uri(); ?>/images/svg/search.svg" width="18" height="18" alt=""></button>
          <div class="header__search--closesp">
            <img src="<?php echo get_template_directory_uri(); ?>/images/svg/clear.svg" width="12" height="12" alt="">
          </div>
        </form>