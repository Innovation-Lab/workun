<?php function displayOrganization($organization, $level = 1) { ?>
  <?php if(isset($organization['name'])) { ?>
    <div class="p-organizationChart__field">
      <div class="p-organizationChart__item">
        <p class="name"><?= $organization['name']; ?></p>
      </div>
    </div>
  <?php } ?>

  <?php if(isset($organization->departments)) { ?>
    <div class="p-organizationChart__underLayer">
      <?php foreach ($organization->departments as $department) { ?>
        <div class="p-organizationChart__layer layer<?= $level + 1 ?>">
          <?php displayOrganization($department, $level + 1);?>
        </div>
      <?php } ?>
    </div>
  <?php } ?>

  <?php if(isset($organization->child_departments)) { ?>
    <div class="p-organizationChart__underLayer">
      <?php foreach ($organization->child_departments as $child) { ?>
        <div class="p-organizationChart__layer layer<?= $level + 1 ?>">
          <?php displayOrganization($child, $level + 1);?>
        </div>
      <?php } ?>
    </div>
  <?php } ?>
<?php } ?>

<div class="p-organizationChart">
  <div class="p-organizationChart__layer layer1">
    <?php displayOrganization($organization_chart); ?>
  </div>
</div>