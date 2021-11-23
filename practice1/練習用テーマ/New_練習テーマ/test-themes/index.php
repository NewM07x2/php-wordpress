<?php get_header(); ?>
    <!-- main -->
    <div class="container" id="main">
      <!-- posts -->
      <div class="" id="posts">

        <?php
          if(have_posts()):
            while (have_posts()) :
              // code...
              the_post();
        ?>
        <div class="post">
          <div class="post-header">
            <h2>
              <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            </h2>
            <div class="post-meta">
              <?php echo get_the_date(); ?> 【<?php the_category(', '); ?>】
            </div>
            <div class="post-content">
              <div class="post-img">
                <!-- アイキャッチ画像があるかないか -->
                <?php if (has_post_thumbnail()) : ?>
                  <!-- あった場合、100X100で表示 -->
                  <?php the_post_thumbnail(array(200,150)); ?>
                  <?php else: ?>
                    <!-- それ以外の時は noimage.png を表示させたい -->
                    <!-- template ディレクトリの noimage.png を指し示したいので「
                    <img src="<?php echo get_template_directory_uri(); ?>/img/noimage.png" …」とする
                    -->
                  <img src="<?php echo get_template_directory_uri(); ?>/img/noimage.jpg" alt="noimage.jpg" width="200px" height="150px">
                <?php endif; ?>
              </div>
              <div class="post-body">
                <?php the_excerpt(); ?>
              </div>
            </div>
          </div>
        </div>
        <?php
            endwhile;
        else:
        ?>

        <p>記事はありません！</p>

        <?php
        endif;
        ?>


        <!-- <div class="navigation">previous_posts_link() は
             記事のループの外でしか使うことができないので、
             endwhile でループが終わった後に使うよう
         -->
          <div class="prev"><?php previous_posts_link(); ?></div>
          <div class="next"><?php next_posts_link(); ?></div>
        </div>
      </div>
      <!-- /posts -->
      <!-- sidebar -->
      <?php get_sidebar(); ?>
      <!-- /sidebar -->
    <!-- /main -->
    </div>
    <!-- footer -->
    <?php get_footer(); ?>
    <!-- /footer -->
  </body>
</html>
