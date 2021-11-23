<?php

add_theme_support('menus');

register_sidebar(
    array(
        'before_widget' => '<div class="widget">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    )
);

// アイキャッチ画像指定
add_theme_support('post-thumbnails');

// 「tw」と打つだけでそれが Twitter のリンクに変わる
function shortcode_tw() {
  return '<a href="https://twitter.com/NewM07x2">@NewM07x2</a>をフォローお願い致します！！！';
}
add_shortcode('tw', 'shortcode_tw');
