<?php if ( is_front_page() ) : ?>
    <?php

    $image_first = get_field('image_from_first_section');
    $image_second = get_field('image_from_second_section');
    $image_third = get_field('image_from_third_section');

    ?>
    <div class="row section-main-page">
        <div class="col-md-4">
            <article class="swiper-slide">
                <div class="inner">
                    <div class="content-wrapper">
                        <div class="post__date"></div>
                        <div class="content-wrapper-inner">
                            <header class="entry-header">
                                <a href="<?php the_field('link_from_first_section'); ?>" class="post-thumbnail__link">
                                    <img src="<?php echo $image_first['url']; ?>" alt="<?php the_field('title_from_first_section'); ?>" class="post-thumbnail__img"></a>
                                <p>
                                    <a href="<?php the_field('link_from_first_section'); ?>" title="<?php the_field('title_from_first_section'); ?>"><?php the_field('title_from_first_section'); ?></a>
                                </p>
                            </header>
                            <div class="entry-content">
                                <p><?php the_field('text_from_first_section'); ?></p>
                            </div>
                        </div>
                        <div class="entry-footer">
                            <a href="<?php the_field('link_from_first_section'); ?>" title="Read more" class="btn btn-primary"><span class="btn__text">Read more</span></a>
                        </div>
                    </div>
                </div>
            </article>
        </div>
        <div class="col-md-4">
            <article class="swiper-slide">
                <div class="inner">
                    <div class="content-wrapper">
                        <div class="post__date"></div>
                        <div class="content-wrapper-inner">
                            <header class="entry-header">
                                <a href="<?php the_field('link_from_second_section'); ?>" class="post-thumbnail__link">
                                    <img src="<?php echo $image_second['url']; ?>" alt="<?php the_field('title_from_second_section'); ?>" class="post-thumbnail__img"></a>
                                <p>
                                    <a href="<?php the_field('link_from_second_section'); ?>" title="<?php the_field('title_from_second_section'); ?>"><?php the_field('title_from_second_section'); ?></a>
                                </p>
                            </header>
                            <div class="entry-content">
                                <p><?php the_field('text_from_second_section'); ?></p>
                            </div>
                        </div>
                        <div class="entry-footer">
                            <a href="<?php the_field('link_from_second_section'); ?>" title="Read more" class="btn btn-primary"><span class="btn__text">Read more</span></a>
                        </div>
                    </div>
                </div>
            </article>
        </div>
        <div class="col-md-4">
            <article class="swiper-slide">
                <div class="inner">
                    <div class="content-wrapper">
                        <div class="post__date"></div>
                        <div class="content-wrapper-inner">
                            <header class="entry-header">
                                <a href="<?php the_field('link_from_third_section'); ?>" class="post-thumbnail__link">
                                    <img src="<?php echo $image_third['url']; ?>" alt="<?php the_field('title_from_third_section'); ?>" class="post-thumbnail__img"></a>
                                <p>
                                    <a href="<?php the_field('link_from_third_section'); ?>" title="<?php the_field('title_from_third_section'); ?>"><?php the_field('title_from_third_section'); ?></a>
                                </p>
                            </header>
                            <div class="entry-content">
                                <p><?php the_field('text_from_third_section'); ?></p>
                            </div>
                        </div>
                        <div class="entry-footer">
                            <a href="<?php the_field('link_from_third_section'); ?>" title="Read more" class="btn btn-primary"><span class="btn__text">Read more</span></a>
                        </div>
                    </div>
                </div>
            </article>
        </div>
    </div>
<?php endif; ?>