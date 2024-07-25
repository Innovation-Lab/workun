
<?php function displayOrganization($organization, $level = 1) { ?>

    <?php if(isset($organization['name'])) { ?>
      <div class="p-organizationChart__field">
        <div class="p-organizationChart__item">
          <p class="name"><?= $organization['name']; ?></p>
          <div class="button__area">
            <div class="button">
              <svg width="16" height="16"><use xlink:href="#organizational_user_list" /></svg>
            </div>
          </div>
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
          <div c
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
<!--  -->
<div class="p-organizationChart__userList">
  <div class="item">
    <div class="close">×</div>
    <div class="head u-align between">
      <p class="title c-txt__md c-txt__weight--600">「賃貸営業部」従業員数</p>
      <a href="{{route('master.organization.edit_link_employee')}}" class="c-button--text">編集</a>
    </div>
    <div class="count">
      <span class="unit">全</span>
      <p class="number">24</p>
      <span class="unit">名</span>
    </div>
    <div class="body u-p0">
      <div class="c-scroll">
        <ul>
          <?php  for($p = 0; $p < 24; $p++){ ?>
            <li>
              <div class="p-user">
                <div class="p-user__image c-noImage">
                  <img class="c-image c-image--round" src="">
                </div>
                <div class="p-user__text">
                  <div class="name">酒井 雄輝</div>
                </div>
              </div>
              <p class="position">代表取締役社長</p>
            </li>
          <?php } ?>
        </ul>
      </div>
    </div>
  </div>
</div>
