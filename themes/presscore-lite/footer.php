<footer id="footer" class="clearfix">

    Copyright <?php bloginfo('name');?> | Theme By <a class="copyright" target="_blank" href="http://fatesinger.com" title="Bigfa In Fatesinger">Bigfa</a>

</footer>
</div>

<a class="site-allMusic side-icons" title="精选音乐集" href="#"></a>
<a class="link-back2top side-icons" title="Back to top" href="#"></a>

<?php wp_footer(); ?>
<div class="statistic">
    <?php if( bools('d_track_b') != '' ) echo bools('d_track'); ?>
</div>
</body></html>