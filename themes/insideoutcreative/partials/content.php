<?php
if(have_rows('builder_repeater')): while(have_rows('builder_repeater')): the_row();
$layout = get_sub_field('layout');

if($layout == 'Documents & Resources'){
    // start of resources
    if(have_rows('documents_resources_repeater')): while(have_rows('documents_resources_repeater')): the_row();

    $img = get_sub_field('image');
    $title = get_sub_field('title');

    echo '<section class="position-relative" style="">';

    // $bgImg = get_sub_field('background_image');

    // if($bgImg){
    //     echo wp_get_attachment_image($bgImg['id'],'full','',[
    //         'class'=>'w-100 h-100 position-absolute bg-img',
    //         'style'=>'top:0;left:0;object-fit:cover;pointer-events:none;'
    //     ]);
    // }

    // if(have_rows('background_image')): while(have_rows('background_image')): the_row();

    //     $image = get_sub_field('image');
    //     echo wp_get_attachment_image($image['id'],'full','',[
    //         'class'=>'w-100 h-100 position-absolute bg-img' . get_sub_field('image_col_classes'),
    //         'style'=>'top:0;left:0;object-fit:cover;pointer-events:none;' . get_sub_field('image_col_style')
    //     ]);

    // endwhile; endif;

    echo get_template_part('partials/bg-img');

    echo '<div class="position-absolute w-100 h-100" style="background:#707070;top:0;left:0;mix-blend-mode:multiply;pointer-events:none;"></div>';

    // if($img){
        //     echo wp_get_attachment_image($img['id'],'full','',['class'=>'h-auto','style'=>'width:400px;max-width:90%;']);
        // }
        
    if($title){
        echo '<div class="position-absolute" style="top:50%;left:50%;transform:translate(-50%,-50%);">';
        echo '<h1 class="text-white bold mb-0" style="font-size:5vw;">' . $title . '</h1>';
        echo '</div>';
    }
    echo '<div class="container-fluid">';
    echo '<div class="row row-resources justify-content-between">';

    if(have_rows('links')): 
        $linksCounter = 0;
        while(have_rows('links')): the_row();
        $linksCounter++;

        if ($linksCounter > 4){
            $linksCounter = 1;
        }
    $link = get_sub_field('link');

    $link_url = $link['url'];
    $link_title = $link['title'];
    $link_target = $link['target'] ? $link['target'] : '_self';


    echo '<a href="' . esc_url( $link_url ) . '" target="' . esc_attr( $link_target ) . '" class="col-lg-3 col-md-6 col-resources" style="padding-top:150px;padding-bottom:25px;text-decoration:none;min-height:50vh;" data-aos="fade-up" data-aos-delay="' . $linksCounter . '00">';
    echo '<div class="position-absolute bg-accent w-100 h-100 col-resources-overlay" style="top:0;left:0;opacity:0;transition:all .25s ease-in-out;"></div>';
    // echo '<div>';

    echo '<div class="d-flex justify-content-center position-relative z-3 h-100" style="">';
    echo '<div class="p-2 d-inline-block mr-3" style="border-radius:50%;border:1px solid var(--accent-secondary);height:35px;width:35px;">';
    echo '<div style="width:15px;height:18px;">';
    echo '<svg xmlns="http://www.w3.org/2000/svg" fill="white" viewBox="0 0 448 512"><path d="M416 208H272V64c0-17.67-14.33-32-32-32h-32c-17.67 0-32 14.33-32 32v144H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h144v144c0 17.67 14.33 32 32 32h32c17.67 0 32-14.33 32-32V304h144c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z"/></svg>';
    echo '</div>';
    echo '</div>';

    echo '<div class="">';
    echo '<span class="col-resources-title h6 text-white">' . esc_html( $link_title ) . '</span>';
    echo '<div class="bg-accent mt-3" style="height:8px;width:75px;"></div>';

    echo '<div class="resources-col-description text-white pt-2 small">';
    echo get_sub_field('description');
    echo '</div>';
    echo '</div>';


    echo '</div>';
    // echo '</div>';

    echo '</a>';

        endwhile; 
    endif;

    echo '</div>';
    echo '</div>';
    echo '</section>';
    endwhile; endif;
    // end of resources
} elseif ($layout == 'Content'){
    if(have_rows('content_group')): while(have_rows('content_group')): the_row();

    echo '<section class="position-relative content-section ' . get_sub_field('classes') . '" style="padding:50px 0;' . get_sub_field('style') . '" id="' . get_sub_field('id') . '">';

    // $bgImg = get_sub_field('background_image');

    // if($bgImg){
    //     echo wp_get_attachment_image($bgImg['id'],'full','',[
    //         'class'=>'w-100 h-100 position-absolute bg-img',
    //         'style'=>'top:0;left:0;object-fit:cover;pointer-events:none;'
    //     ]);
    // }

    // if(have_rows('background_image')): while(have_rows('background_image')): the_row();

    //     $image = get_sub_field('image');
    //     echo wp_get_attachment_image($image['id'],'full','',[
    //         'class'=>'w-100 h-100 position-absolute bg-img' . get_sub_field('image_col_classes'),
    //         'style'=>'top:0;left:0;object-fit:cover;pointer-events:none;' . get_sub_field('image_col_style')
    //     ]);

    // endwhile; endif;

    echo get_template_part('partials/bg-img');

    echo '<div class="container-fluid">';

    echo '<div class="row justify-content-center">';

    echo '<div class="col-lg-9 text-center ' . get_sub_field('content_col_classes') . '" style="' . get_sub_field('content_col_style') . '">';
    echo '<div data-aos="fade-up">';
    echo get_sub_field('content');
    echo '</div>';
    echo '</div>';

    echo '</div>';

    echo '</div>';

    echo '</section>';

    endwhile; endif;
} elseif ($layout == 'Content + Image') {
    if(have_rows('content_+_image')): while(have_rows('content_+_image')): the_row();

    echo '<section class="position-relative content-image-section bg-accent-dark text-white ' . get_sub_field('classes') . '" style="padding:50px 0;' . get_sub_field('style') . '" id="' . get_sub_field('id') . '">';

    // $bgImg = get_sub_field('background_image');
    $imgSide = get_sub_field('image_side');

    // if(have_rows('background_image')): while(have_rows('background_image')): the_row();

    //     $image = get_sub_field('image');
    //     echo wp_get_attachment_image($image['id'],'full','',[
    //         'class'=>'w-100 h-100 position-absolute bg-img' . get_sub_field('image_col_classes'),
    //         'style'=>'top:0;left:0;object-fit:cover;pointer-events:none;' . get_sub_field('image_col_style')
    //     ]);

    // endwhile; endif;

    echo get_template_part('partials/bg-img');

    echo '<div class="container-fluid">';

        if(have_rows('content_top_group')): while(have_rows('content_top_group')): the_row();
            echo '<div class="row justify-content-center">';
            echo '<div class="col-lg-9 text-center ' . get_sub_field('content_col_classes') . '" style="' . get_sub_field('content_col_style') . '">';
            echo '<div data-aos="fade-up">';
            echo get_sub_field('content');
            echo '</div>';
            echo '</div>';
            echo '</div>';
        endwhile; endif;

        if($imgSide == 'Left'){
            echo '<div class="row row-content align-items-center justify-content-center ' . get_sub_field('row_classes') . '" style="' . get_sub_field('row_style') . '">';
            // echo '</div>';
        } else {
            echo '<div class="row row-content flex-lg-row-reverse align-items-center justify-content-center ' . get_sub_field('row_classes') . '" style="' . get_sub_field('row_style') . '">';

        }

        if(have_rows('image_group')): while(have_rows('image_group')): the_row();
        echo '<div class="col-lg-6 pt-lg-0 pt-5 col-img ' . get_sub_field('image_col_classes') . '" style="' . get_sub_field('image_col_style') . '">';
            if($imgSide == 'Left'){
                echo '<div data-aos="fade-right">';
                // echo </div>
            } else {
                echo '<div data-aos="fade-left">';
            }
            $image = get_sub_field('image');
                echo wp_get_attachment_image($image['id'],'full','',[
                    'class'=>'w-100 h-100 ' . get_sub_field('image_col_classes'),
                    'style'=>'object-fit:cover;' . get_sub_field('image_col_style')
                ]);
                echo '</div>'; // end of data aos

        echo '</div>';
        endwhile; endif;

        echo '<div class="col-1"></div>';

        echo '<div class="col-lg-3 pt-lg-0 pt-5 ' . get_sub_field('content_col_classes') . '" style="' . get_sub_field('content_col_style') . '">';
        if($imgSide == 'Left'){
            echo '<div data-aos="fade-left">';
            // echo </div>
        } else {
            echo '<div data-aos="fade-right">';
        }
        if(have_rows('content_middle_group')): while(have_rows('content_middle_group')): the_row();
            echo get_sub_field('content');
        endwhile; endif;
            echo '</div>'; // end of data aos

        echo '</div>';
        echo '</div>';

        if(have_rows('content_bottom_group')): while(have_rows('content_bottom_group')): the_row();
            echo '<div class="row justify-content-center">';
            echo '<div class="col-lg-9 text-center ' . get_sub_field('content_col_classes') . '" style="' . get_sub_field('content_col_style') . '">';
            echo '<div data-aos="fade-up">';
            echo get_sub_field('content');
            echo '</div>';
            echo '</div>';
            echo '</div>';
        endwhile; endif;

        echo '</div>';


    echo '</section>';

    endwhile; endif;

} elseif ($layout == 'Videos') {
    if(have_rows('videos_group')): while(have_rows('videos_group')): the_row();

    echo '<section class="position-relative content-section ' . get_sub_field('classes') . '" style="padding:50px 0;' . get_sub_field('style') . '" id="' . get_sub_field('id') . '">';

    // $bgImg = get_sub_field('background_image');

    // if($bgImg){
    //     echo wp_get_attachment_image($bgImg['id'],'full','',[
    //         'class'=>'w-100 h-100 position-absolute bg-img',
    //         'style'=>'top:0;left:0;object-fit:cover;pointer-events:none;'
    //     ]);
    // }

    echo get_template_part('partials/bg-img');


    echo '<div class="container">';
    if(get_sub_field('content')) {
        echo '<div class="row justify-content-center">';
        echo '<div class="col-lg-9 text-center pb-5 ' . get_sub_field('content_col_classes') . '" style="' . get_sub_field('content_col_style') . '">';

        echo '<div data-aos="fade-up">';
        echo get_sub_field('content');
        echo '</div>';

        echo '</div>';
        echo '</div>';
    }

    if(have_rows('videos_repeater')):
        echo '<div class="row justify-content-center">';
        $videosCounter = 0;
        while(have_rows('videos_repeater')): the_row();
        $videosCounter++;

        if ($videosCounter > 2){
            $videosCounter = 1;
        }

        echo '<div class="col-md-6 text-center pt-2 pb-2 ' . get_sub_field('video_classes') . '" style="' . get_sub_field('video_style') . '" data-aos="fade-up" data-aos-delay="' . $videosCounter . '00">';

        echo '<div class="video">';
        echo get_sub_field('video_url');
        echo '</div>';

        echo '</div>';

        endwhile;
        echo '</div>';
    endif;

    echo '</div>';

    
    echo '</section>';

    endwhile; endif;
} elseif ($layout == 'Gallery') { 
    if(have_rows('gallery_group')): while(have_rows('gallery_group')): the_row();

    echo '<section class="position-relative gallery-section ' . get_sub_field('classes') . '" style="background:#ebebeb;padding:25px 0;' . get_sub_field('style') . '" id="' . get_sub_field('id') . '">';

    // $bgImg = get_sub_field('background_image');

    // if($bgImg){
    //     echo wp_get_attachment_image($bgImg['id'],'full','',[
    //         'class'=>'w-100 h-100 position-absolute bg-img',
    //         'style'=>'top:0;left:0;object-fit:cover;pointer-events:none;'
    //     ]);
    // }

    echo get_template_part('partials/bg-img');

    $gallery = get_sub_field('gallery');
    if( $gallery ): 
    echo '<div class="container">';
    echo '<div class="row">';
    $galleryCounter = 0;
    foreach( $gallery as $image ):
        $galleryCounter++;

        if ($galleryCounter > 4){
            $galleryCounter = 1;
        }
    echo '<div class="col-lg-3 col-md-4 col-6 col col-portfolio mt-3 mb-3 overflow-h d-flex align-items-center justify-content-center text-center">';
    echo '<div data-aos="fade-up" data-aos-delay="' . $galleryCounter . '00">';
    // echo '<div class="position-relative">';
    // echo '<a href="' . wp_get_attachment_image_url($image['id'], 'full') . '" data-lightbox="image-set" data-title="' . $image['title'] . '">';
    echo wp_get_attachment_image($image['id'], 'full','',[
        'class'=>'h-auto',
        'style'=>'width:90%;object-fit:contain;'
    ] );
    // echo '</a>';
    // echo '</div>';
    echo '</div>';
    echo '</div>';
    endforeach; 
    echo '</div>';
    echo '</div>';
    endif;

    echo '</section>';
    endwhile; endif;
} elseif ($layout == 'Image') {
    if(have_rows('image_group')): while(have_rows('image_group')): the_row();

    echo '<section class="position-relative image-section ' . get_sub_field('classes') . '" style="padding:50px 0;' . get_sub_field('style') . '" id="' . get_sub_field('id') . '">';

    // $bgImg = get_sub_field('background_image');

    // if($bgImg){
    //     echo wp_get_attachment_image($bgImg['id'],'full','',[
    //         'class'=>'w-100 h-100 position-absolute bg-img',
    //         'style'=>'top:0;left:0;object-fit:cover;pointer-events:none;'
    //     ]);
    // }

    echo get_template_part('partials/bg-img');

    $image = get_sub_field('image');

    echo '<div data-aos="fade-up">';
    echo wp_get_attachment_image($image['id'], 'full','',[
        'class'=>'w-100 h-auto ' . get_sub_field('image_col_classes'),
        'style'=>'' . get_sub_field('image_col_classes')
    ]);
    echo '</div>';

    echo '</section>';
    endwhile; endif;
}

endwhile; endif; // end of builder_repeater
?>