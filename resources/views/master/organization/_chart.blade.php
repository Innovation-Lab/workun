
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
  
<?php } ?>


<div class="p-organizationChart">
  <div class="p-organizationChart__layer layer1">
    <?php displayOrganization($organizationChart); ?>
  </div>
</div>