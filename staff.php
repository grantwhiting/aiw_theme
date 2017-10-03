<?php
// Template name: Staff

// Get the Employees pod
$params = array(
  'limit' => -1
);

$employeePod = pods('employee', $params);

get_header();
?>

<div class="main-content__inner">
  <div class="staff-page">
    <section class="section text-section">
      <h2 class="section__title">
        <span>Meet our Team</span>
      </h2>
      <p class="section__content">Some text about the staff... Sed turpis dui, rutrum cursus ligula eu, pretium convallis nisl. Proin in iaculis ipsum.</p>
    </section>

    <section class="section fade-in">
      <div class="custom-grid-container">
        <div class="custom-grid">
          <?php
          if ($employeePod->total() > 0):
            while ($employeePod->fetch()):
              $name = $employeePod->field('title');
              $headShot = $employeePod->display('head_shot');
              $jobTitle = $employeePod->field('job_title');
              $experience = $employeePod->field('experience');
          ?>
          <div class="custom-grid__item with-image staff">
            <img class="grid-image" src="<?php echo $headShot; ?>" />
            <div class="grid-info">
              <h4><?php echo $name; ?></h4>
              <p><?php echo $jobTitle; ?></p>
              <?php if ( $experience != null): ?>
              <p><?php echo $experience; ?></p>
              <?php endif; ?>
            </div>
          </div>
          <?php
            endwhile;
          endif;
          ?>
        </div>
      </div>
    </section>
  </div>
</div>
<?php get_footer(); ?>
