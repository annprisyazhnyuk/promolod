<li class="project-alumnus lightbox">
     <a data-fancybox-type="ajax" href="<?php the_permalink(); ?>">
         <?php if (has_post_thumbnail()) :
                    the_post_thumbnail();
               endif; ?>
               <div class="rollover">
                 <h2> <?php the_title(); ?> </h2>
               	 <?php the_excerpt(); ?>
               </div>
       </a>
</li>