<?php
/*
Plugin Name: Add Social Bookmarks
Version: 1.1
Description: Automatically adding major social bookmarks to your website. Activate the plugin and you are ready to use.
Author: Aditya Subawa
Author URI: http://www.adityawebs.com
Donate Link: http://www.adityawebs.com
Plugin URI: http://www.adityawebs.com/blog/wordpress/313-wp-add-social-bookmarks
WP-Add-Social-Bookmarks

*/


/* WordPress Version Check */
global $wp_version;
$exit_msg='WP-Add-Social-Bookmarks requires WordPress 2.5 or newer.
<a href="http://codex.wordpress.org/Upgrading_WordPress">Please
update!</a>';
if (version_compare($wp_version,"2.5","<"))
{
exit ($exit_msg);
}


function WP_Add_Social_Bookmarks($content)

{

// parameters. 
 global $post;
 global $link;
 $link=urlencode(get_permalink($post->ID));
 global $title;
 $title=urlencode($post->post_title);
 global $text;
 $text=urlencode(substr(strip_tags($post->post_content), 0, 350));
 global  $url;
 $url = get_permalink(); 
 $Social_images_folder = get_settings('home') . '/wp-content/plugins/wp-add-social-bookmarks/images/'; //images folder
 include_once ('include/aditya-style.css');
	
		
$content .= "\n\n" 
				  . '<ul class="aditya-social" id="aditya-cssanime">' . "\n"
                  . '<li class="aditya-twitter"><a href="http://twitter.com/share?url=' . urlencode($url) . '&amp;url=' . $link . '" target="_blank" rel="nofollow" title="Twitter"><img src="' . $Social_images_folder . 'twitter.png" alt="Twitter" title="Twitter" /></a></li>' . "\n"				  
                  . '<li class="aditya-delicious"><a href="http://del.icio.us/post?url=' . $link . '&amp;title=' . $title . '" target="_blank" rel="nofollow" title="del.icio.us"><img src="' . $Social_images_folder . 'delicious.png" alt="del.icio.us" title="del.icio.us" /></a></li>' . "\n"
                  . '<li class="aditya-digg"><a href="http://digg.com/submit?phase=2&amp;url=' . $link . '&amp;title=' . $title . '" target="_blank" rel="nofollow" title="Digg"><img src="' . $Social_images_folder . 'digg.png" alt="Digg" title="Digg" /></a></li>' . "\n"
                  . '<li class="aditya-facebook"><a href="http://facebook.com/sharer.php?u=' . $link . '&amp;t=' . $title . '" target="_blank" rel="nofollow" title="Facebook"><img src="' . $Social_images_folder . 'facebook.png" alt="Facebook" title="Facebook" /></a></li>' . "\n"
                  . '<li class="aditya-technorati"><a href="http://technorati.com/faves?add=' . $link . '" target="_blank" rel="nofollow" title="Technorati"><img src="' . $Social_images_folder . 'technorati.png" alt="Technorati" title="Technorati" /></a></li>' . "\n"
                  . '<li class="aditya-reddit"><a href="http://reddit.com/submit?url=' . $title . '&amp;u=' . $link . '" target="_blank" rel="nofollow" title="Reddit"><img src="' . $Social_images_folder . 'reddit.png" alt="Reddit" title="Reddit" /></a></li>' . "\n"
				  . '<li class="aditya-yahoo"><a href="http://buzz.yahoo.com/submit?submitUrl=' . $title . '&amp;u=' . $link . '" target="_blank" rel="nofollow" title="Yahoo Buzz"><img src="' . $Social_images_folder . 'yahoo.png" alt="Yahoo Buzz" title="Yahoo Buzz" /></a></li>' . "\n"
                  . '<li class="aditya-stumbleupon"><a href="http://stumbleupon.com/submit?url=' . $link . '&amp;title=' . $title . '&amp;newcomment=' . $title . '" target="_blank" rel="nofollow" title="StumbleUpon"><img src="' . $Social_images_folder . 'stumbleupon.png" alt="StumbleUpon" title="StumbleUpon" /></a></li>' . "\n"
                  . '</ul>'. "\n"
				  . "\n" . "\n\n";



return $content;
}

add_filter('the_content', 'WP_Add_Social_Bookmarks');
?>