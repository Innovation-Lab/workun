<aside class="p-sideNav">
  <div class="p-sideNav__head">
    <div class="c-image c-image--svg">
      <svg width="96" height="28"><use xlink:href="#logo" /></svg>
    </div>
  </div>
  <div class="p-sideNav__body">
    <ul class="p-sideNav__list">
      <?php
        $controlItemSidebar = [
          'dashboard'=> [
            'label' => 'ダッシュボード',
            'path' => 'home',
            'phase' => '',
            'link' => 'link',
          ],
          'hr'=> [
            'label' => '人事業務',
            'path' => null,
            'phase' => '',
            'link' => 'not_link',
            'megaMenu' => [
              'linkList' => [
                [
                  'label' => 'セルフチェック',
                  'path' => null,
                  'phase' => '',
                ],
              ],
            ]
          ],
          'master'=> [
            'label' => 'マスタ管理',
            'path' => null,
            'phase' => '',
            'link' => 'not_link',
            'megaMenu' => [
              'linkList' => [
                [
                  'label' => 'セルフチェック',
                  'path' => null,
                  'phase' => '',
                ],
                [
                  'label' => '組織作成',
                  'path' => null,
                  'phase' => '',
                ],
                [
                  'label' => '従業員情報',
                  'path' => null,
                  'phase' => '',
                ],
                [
                  'label' => '評価期間設定',
                  'path' => null,
                  'phase' => '',
                ],
              ],
            ]
          ],
        ];
      ?>
      <?php
        foreach($controlItemSidebar as $key => $val){
      ?>
      <li>
        {{-- 親リンクの表示 --}}
        <a <?php if($val['link'] == 'link'){ ?> href="{{route($val['path'])}}"<?php } ?> class="parent">
          <div class="c-image c-image--svg">
            <svg><use xlink:href="#<?= $key; ?>" /></svg>
          </div>
          <p class="title"><?= $val['label']; ?></p>
        </a>
        {{-- 子リンクの表示 --}}
        <?php if(isset($val['megaMenu'])) { ?>
          <div class="child">
            <?php foreach($val['megaMenu']['linkList'] as $itemListVal){ ?>
              <a href=""><?= $itemListVal['label']; ?></a>
            <?php } ?>
          </div>
        <?php } ?>
      </li>
      <?php } ?>
    </ul>
  </div>
  <div class="p-sideNav__foot">
    <a href="" class="logout">ログアウト</a>
  </div>
</aside>