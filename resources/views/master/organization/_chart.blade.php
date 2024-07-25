
<?php
  $organizationChart = [
    'name' => 'クラスコ',
    'layer2' => [
      [
        'name' => '賃貸営業部',
        'layer3' => [
          [
            'name' => '満室の窓口',
            'layer4' => null,
          ],
          [
            'name' => '賃貸店舗統括',
            'layer4' => [
              [
                'name' => '金沢けやき通り店',
              ],
              [
                'name' => '金沢駅前店',
              ]
            ]
          ],
          [
            'name' => '賃貸戦略室・法人課統括',
            'layer4' => [
              [
                'name' => '賃貸戦略室',
                'layer5' => [
                  [
                    'name' => '賃貸戦略室',
                  ],
                  [
                    'name' => '賃貸戦略室',
                    'layer6' => [
                      [
                        'name' => '賃貸戦略室',
                      ],
                      [
                        'name' => '賃貸戦略室',
                      ]
                    ]
                  ]
                ]
              ],
              [
                'name' => '法人課',
              ],
              [
                'name' => 'テナント',
              ]
            ]
          ]
        ]
      ],[
        'name' => '売買の窓口',
        'layer3' => [
          [
            'name' => '建売事業',
          ],
          [
            'name' => '売買仲介事業',
          ],
          [
            'name' => 'インサイドセールス',
          ]
        ]
      ],[
        'name' => '本部',
        'layer3' => [[
          'name' => null,
          'layer4' => [
            [
              'name' => '総務課',
            ],
            [
              'name' => '経理課',
            ]
          ]
        ]]
      ]
    ]
  ];
?>
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
    
    <?php if(isset($organization['layer2'])) { ?>
      <div class="p-organizationChart__underLayer">
        <?php foreach ($organization['layer2'] as $layer2) { ?>
          <div class="p-organizationChart__layer layer2">
            <?php displayOrganization($layer2, $level + 1);?>
          </div>
        <?php } ?>
      </div>
    <?php } ?>
    <?php if(isset($organization['layer3'])) { ?>
      <div class="p-organizationChart__underLayer">
        <?php foreach ($organization['layer3'] as $layer3) { ?>
          <div class="p-organizationChart__layer layer3">
            <?php displayOrganization($layer3, $level + 1);?>
          </div>
        <?php } ?>
      </div>
    <?php } ?>
    <?php if(isset($organization['layer4'])) { ?>
      <div class="p-organizationChart__underLayer">
        <?php foreach ($organization['layer4'] as $layer4) { ?>
          <div class="p-organizationChart__layer layer4">
            <?php displayOrganization($layer4, $level + 1);?>
          </div>
        <?php } ?>
      </div>
    <?php } ?>
    <?php if(isset($organization['layer5'])) { ?>
      <div class="p-organizationChart__underLayer">
        <?php foreach ($organization['layer5'] as $layer5) { ?>
          <div class="p-organizationChart__layer layer5">
            <?php displayOrganization($layer5, $level + 1);?>
          </div>
        <?php } ?>
      </div>
    <?php } ?>
    <?php if(isset($organization['layer6'])) { ?>
      <div class="p-organizationChart__underLayer">
        <?php foreach ($organization['layer6'] as $layer6) { ?>
          <div class="p-organizationChart__layer layer6">
            <?php displayOrganization($layer6, $level + 1);?>
          </div>
        <?php } ?>
      </div>
    <?php } ?>
  
<?php } ?>


<div class="p-organizationChart">
  <div class="p-organizationChart__layer layer1">
    <?php displayOrganization($organizationChart); ?>
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