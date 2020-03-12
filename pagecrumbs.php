<?php
/*
Plugin Name: PageCrumbs
Plugin URI:  https://github.com/anywherecreative/pagecrumbs
Description: a simple way to display breadcrumbs on your website. 
Version:     1.0.1
Author:      Jeff Manning / Think Forward Media
Author URI:  https://www.thinkforwardmedia.com
Text Domain: tfm
License:     GPL3
 
PageCrumbs is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
any later version.
 
PageCrumbs is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.
 
You should have received a copy of the GNU General Public License
along with PageCrumbs. If not, see https://github.com/anywherecreative/pagecrumbs/blob/master/LICENSE.
*/

function get_post_breadcrumb() {
        global $post;
        $breadcrumb = "<a href='" . get_home_url() . "'>" . __( 'Home', 'tfm') . "</a> / ";
        $posts = get_post_ancestors($post->ID);
        if(!empty($posts)) {
                foreach($posts as $p) {
                        $breadcrumb .= "<a href='" . get_permalink($p) . "'>" . get_the_title($p) . "</a> / ";
                }
                $breadcrumb .= "<strong>" . get_the_title() . "</strong>";
                return $breadcrumb;
        }
        else {
                return $breadcrumb . "<strong>" . get_the_title() . "</strong>";
        }
}

add_shortcode('page_breadcrumb','get_post_breadcrumb');