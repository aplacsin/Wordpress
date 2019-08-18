<?php
/**
 * The template part for displaying video
 *
 * @package Jewellery Lite 
 * @subpackage jewellery_lite
 * @since Jewellery Lite  1.0
 */
?>

<?php
  $content = apply_filters( 'the_content', get_the_content() );
  $video = false;

  // Only get video from the content if a playlist isn't present.
  if ( false === strpos( $content, 'wp-playlist-script' ) ) {
    $video = get_media_embedded_in_content( $content, array( 'video', 'object', 'embed', 'iframe' ) );
  }
?>

<div id="post-<?php the_ID(); ?>" <?php post_class('inner-service'); ?>>
  <div class="post-main-box">
    <?php
      if ( ! is_single() ) {

        // If not a single post, highlight the video file.
        if ( ! empty( $video ) ) {
          foreach ( $video as $video_html ) {
            echo '<div class="entry-video">';
              echo $video_html;
            echo '</div>';
          }
        };
      };
    ?>
    <div class="new-text">
      <h3 class="section-title"><?php the_title();?></h3>
      <div class="post-info">
        <?php if(get_theme_mod('jewellery_lite_toggle_postdate',true)==1){ ?>
          <span class="entry-date"><?php echo esc_html( get_the_date() ); ?></span><span>|</span>
        <?php } ?>

        <?php if(get_theme_mod('jewellery_lite_toggle_author',true)==1){ ?>
          <span class="entry-author"><?php the_author(); ?></span><span>|</span>
        <?php } ?>

        <?php if(get_theme_mod('jewellery_lite_toggle_comments',true)==1){ ?>
          <span class="entry-comments"><?php comments_number( __('0 Comment', 'jewellery-lite'), __('0 Comments', 'jewellery-lite'), __('% Comments', 'jewellery-lite') ); ?> </span>
        <?php } ?>
        <hr>
      </div>      
      <p><?php $excerpt = get_the_excerpt(); echo esc_html( jewellery_lite_string_limit_words( $excerpt, esc_attr(get_theme_mod('jewellery_lite_excerpt_number','30')))); ?></p>
      <div class="more-btn">
        <a href="<?php echo esc_url(get_permalink()); ?>"><?php esc_html_e( 'READ MORE', 'jewellery-lite' ); ?></a>
      </div>
    </div>
  </div>
</div>