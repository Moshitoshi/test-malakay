<?php
/**
 * Displays header media
 *
 * @package WordPress
 * @subpackage Malakay
 * @since 1.0
 * @version 1.0
 */

?>
<section class="hero">
        <div class="header-hero-video">
          <div id="video-container" style="width: 100%; position: relative;">
            <div class="hero-video" style="position: absolute; z-index: -1; top: 0px; left: 0px; bottom: 0px; right: 0px; overflow: hidden; background-size: cover; background-color: transparent; background-repeat: no-repeat; background-position: 50% 50%; background-image: none;">
              <video autoplay="" loop="" muted="" style="margin: auto; position: absolute; z-index: -1; top: 50%; left: 50%; transform: translate(-50%, -50%); visibility: visible; opacity: 1; width: 2000px; height: auto;">
                <source src="https://postbox-video.s3.amazonaws.com/Postbox%20Looper-2000.mp4" type="video/mp4">
                  <source src="https://s3.amazonaws.com/postbox-video/Postbox_Hero_Looper.webm" type="video/webm">
                    <source src="https://s3.amazonaws.com/postbox-video/Postbox_Hero_Looper.ogv" type="video/ogg">
              </video>
            </div>
          </div>
       </div>

        <section class="hero__content homepage-hero__content">
            <div class="container text-inverse">
                <h1 class="hero__title">Malakay</h1>
                <div class="hero__subtitle">
                  <p>Header Video</p>
                </div>
                <div>
                    <a id="watch-vimeo-video" href="#hero-vimeo-video"><i class="fa fa-3x fa-play-circle"></i></a>
                </div>
            </div>
        </section>
</section>
