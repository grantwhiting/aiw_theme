    </div><!-- main-content -->
    <footer>
      <div class="footer-content">
        <ul class="footer-social-links">
          <li>
            <a href="https://www.facebook.com/aiwslo/" target="_blank"><i class="fab fa-facebook"></i></a>
            <a href="https://www.instagram.com/architecturalironworks/" target="_blank"><i class="fab fa-instagram"></i></a>
            <a href="https://www.pinterest.com/architecturalironworks/" target="_blank"><i class="fab fa-pinterest"></i></a>
            <a href="https://www.linkedin.com/company/aiw-slo/" target="_blank"><i class="fab fa-linkedin"></i></a>
          </li>
        </ul>
        <p>&copy; <?php echo date("Y"); ?> Architectural Iron Works | All Rights Reserved</p>
      </div>
    </footer>

    <!-- Mobile nav include -->
    <?php get_template_part('/includes/_mobile-nav'); ?>

    <script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/dist/bundle.js"></script>

    <?php wp_footer(); ?>
  </body>
</html>
