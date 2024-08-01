<?php function displayOrganization($entity, $level = 1) { ?>
    <?php if(isset($entity['name'])) { ?>
      <div class="p-organizationChart__field">
        <div class="p-organizationChart__item">
          <p class="name"><?= $entity['name']; ?></p>
          @if ($level !== 1 && data_get($entity, 'id'))
            <div class="button__area">
              <div
                class="button"
                data-department-id="<?= $entity['id']; ?>"
              >
                <svg width="16" height="16"><use xlink:href="#organizational_user_list" /></svg>
              </div>
            </div>
          @endif
        </div>
      </div>
    <?php } ?>

    <?php if(data_get($entity, 'departments')) { ?>
      <div class="p-organizationChart__underLayer">
        <?php foreach (data_get($entity, 'departments') as $department) { ?>
          <div class="p-organizationChart__layer layer<?= $level + 1 ?>">
            <?php displayOrganization($department, $level + 1);?>
          </div>
        <?php } ?>
      </div>
    <?php } ?>

    <?php if(data_get($entity, 'child_departments')) { ?>
      <div class="p-organizationChart__underLayer">
        <?php foreach (data_get($entity, 'child_departments') as $child) { ?>
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

<div class="p-organizationChart__userList">
  {{--  従業員一覧を表示  --}}
</div>
