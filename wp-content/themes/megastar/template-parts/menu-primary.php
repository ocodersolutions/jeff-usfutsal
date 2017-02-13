<?php
$megastar_main_menu = get_theme_mod('megastar_menu_show', true);

if ($megastar_main_menu) {

    if (has_nav_menu('primary')) {
        $navbar = wp_nav_menu(array(
            'theme_location' => 'primary',
            'container' => false,
            'menu_id' => 'nav',
            'menu_class' => 'menuzord-menu menuzord-right menuzord-indented scrollable',
            'echo' => false,
            'before' => '',
            'after' => '',
            'link_before' => '',
            'link_after' => '',
            'depth' => 0,
            'parent_id' => 'tmMainMenu',
                )
        );

        $primary_menu = new megastar_nav_dom($navbar);
        echo $primary_menu->proccess();
    } else {
        echo '<ul class="no-menu uk-hidden-small"><li><a href="' . admin_url('/nav-menus.php') . '"><strong>NO MENU ASSIGNED</strong> <span>Go To Appearance > Menus and create a Menu</span></a></li></ul>';
    }
}
 
/*<ul id="nav" class="menuzord-menu menuzord-right menuzord-indented "><li id="menu-item-86" class="menu-item-86 active"><a href="http://usfutsal.local/">Home</a></li>
    <li id="menu-item-84" class="menu-item-84"><a href="http://usfutsal.local/news/">News</a>
        <ul class="dropdown">
            <div class="menu-item-left">
                <div class="pull-right">
                    <li id="menu-item-342" class="menu-item-342"><a href="#">Class 1</a></li>
                    <li id="menu-item-343" class="menu-item-343"><a href="#">Class 3</a></li>
                </div>
            </div>
            <div class="line-middle"></div>
            <div class="menu-item-right">
                <div class="pull-left">
                    <li id="menu-item-342" class="menu-item-342"><a href="#">Class 2</a></li>
                    <li id="menu-item-343" class="menu-item-343"><a href="#">Class 4</a></li>
                </div>
            </div>
        </ul>
    </li>
    <li id="menu-item-341" class="menu-item-341"><a href="#">Tournaments</a><ul class="dropdown">
            <div class="menu-item-left">
                <div class="pull-right">
                    <li id="menu-item-342" class="menu-item-342"><a href="#">U.S. Futsal Northwest Regional</a></li>
                    <li id="menu-item-343" class="menu-item-343"><a href="#">U.S. Futsal Northwest Regional</a></li>
                    <li id="menu-item-344" class="menu-item-344"><a href="#">U.S. Futsal Northwest Regional</a></li>
                    <li id="menu-item-345" class="menu-item-345"><a href="#">U.S. Futsal Northwest Regional</a></li>
                </div>
            </div>
            <div class="line-middle"></div>
            <div class="menu-item-right">
                <div class="pull-left">
                    <li id="menu-item-342" class="menu-item-342"><a href="#">U.S. Futsal Northwest Regional</a></li>
                    <li id="menu-item-343" class="menu-item-343"><a href="#">U.S. Futsal Northwest Regional</a></li>
                    <li id="menu-item-344" class="menu-item-344"><a href="#">U.S. Futsal Northwest Regional</a></li>
                    <li id="menu-item-345" class="menu-item-345"><a href="#">U.S. Futsal Northwest Regional</a></li>
                </div>


        </ul></li>
    <li id="menu-item-100" class="menu-item-100"><a href="#">teams</a>
        <div class="megamenu">
            <div class="megamenu-row">
                <div class="menu-item-left">
                         <ul class="list-unstyled two-columns pull-right">

                            <li id="menu-item-342" class="menu-item-342"><a href="#">U.S. Futsal Northwest Regional</a></li>
                            <li id="menu-item-343" class="menu-item-343"><a href="#">U.S. Futsal Northwest Regional</a></li>
                            <li id="menu-item-344" class="menu-item-344"><a href="#">U.S. Futsal Northwest Regional</a></li>
                            <li id="menu-item-345" class="menu-item-345"><a href="#">U.S. Futsal Northwest Regional</a></li>
                        </ul>
                 </div>
                <div class="line-middle"></div>
                <div class="menu-item-right">
                         <ul class="list-unstyled  two-columns pull-left">

                            <li id="menu-item-342" class="menu-item-342"><a href="#">U.S. Futsal Northwest Regional</a></li>
                            <li id="menu-item-343" class="menu-item-343"><a href="#">U.S. Futsal Northwest Regional</a></li>
                            <li id="menu-item-344" class="menu-item-344"><a href="#">U.S. Futsal Northwest Regional</a></li>
                            <li id="menu-item-345" class="menu-item-345"><a href="#">U.S. Futsal Northwest Regional</a></li>
                        </ul>
 

                </div>
            </div>
        </div>              
    </li>
    <li id="menu-item-90" class="menu-item-90"><a href="#">Associations</a></li>
    <li id="menu-item-160" class="menu-item-160"><a href="#">Registraion</a></li>
    <li id="menu-item-189" class="menu-item-189"><a href="#">Estore</a></li>
</ul>	
*/