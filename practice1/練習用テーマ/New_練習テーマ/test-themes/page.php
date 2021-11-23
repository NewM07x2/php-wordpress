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
          </div>
          <div class="post-content">
            <div class="post-body">
              <?php the_content(); ?>
            </div>
          </div>
        </div>
        <?php
            endwhile;
        else:
        ?>

        <p>ページはありません！</p>

        <?php
        endif;
        ?>
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
