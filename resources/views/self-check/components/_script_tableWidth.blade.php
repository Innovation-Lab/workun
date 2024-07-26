<script>
  $(document).ready(function() {
    // .p-table__check .t-table thead th .p-table__cell--input .cell 要素を取得
    var cells = $('.p-table__check .t-table thead th .p-table__cell--input .cell');
    
    // 要素の数を取得
    var cellCount = cells.length;
    
    // 幅の合計を計算
    var totalWidth = 0;
    cells.each(function() {
      totalWidth += $(this).outerWidth();
    });
    
    // .p-modal 内の .p-table__check .t-table thead th .p-table__cell--input .cell 要素を取得
    var modalCells = $('.p-modal .p-table__check .t-table thead th .p-table__cell--input .cell');
    
    // .p-modal 内の要素の数を取得
    var modalCellCount = modalCells.length;
    
    // 幅の合計を計算
    var modalTotalWidth = 0;
    modalCells.each(function() {
      modalTotalWidth += $(this).outerWidth();
    });

    // 追加する幅
    var additionalWidth = 540;

    // p-table__check 内に p-table__check--head2 が含まれているかチェック
    if ($('.p-table__check').find('.p-table__check--head2').length > 0) {
      additionalWidth += 160; // 追加幅を160px増やす
    }

    // 合計幅から .p-modal 内の幅を引く
    var adjustedWidth = totalWidth - modalTotalWidth;

    // 合計幅に追加する幅を加算
    var finalWidth = adjustedWidth + additionalWidth;

    // 最小幅を設定
    $('.p-table__check .t-table').css('min-width', finalWidth + 'px');
    
    // 結果をコンソールに表示
    console.log('全体の要素の数: ' + cellCount);
    console.log('全体の幅の合計: ' + totalWidth + 'px');
    console.log('.p-modal 内の要素の数: ' + modalCellCount);
    console.log('調整後の最小幅: ' + finalWidth + 'px');

    // .p-table__check が .p-modal 内にある場合の処理
    var $table = $('.p-table__check');
    var $parent = $table.closest('.p-modal');

    if ($parent.length > 0) {
      // .p-modal 内の .p-table__check .t-table thead th .p-table__cell--input .cell 要素を取得
      var modalCells = $parent.find('.p-table__check .t-table thead th .p-table__cell--input .cell');
        
      // .p-modal 内の要素の数を取得
      var modalCellCount = modalCells.length;
      
      // 幅の合計を計算
      var modalTotalWidth = 0;
      modalCells.each(function() {
        modalTotalWidth += $(this).outerWidth();
      });

      // p-table__check 内に p-table__check--head2 が含まれているかチェック
      if ($('.p-table__check').find('.p-table__check--head2').length > 0) {
        additionalWidth += 160; // 追加幅を160px増やす
      }

      // 合計幅に追加する幅を加算
      var modalfinalWidth = modalTotalWidth + additionalWidth;

      // 最小幅を設定
      $parent.find('.p-table__check .t-table').css('min-width', modalfinalWidth + 'px');
      
      // 結果をコンソールに表示
      console.log('.p-modal 内の要素の数: ' + modalCellCount);
      console.log('.p-modal 内の幅の合計: ' + modalTotalWidth + 'px');
      console.log('.p-modal 調整後の最小幅: ' + modalfinalWidth + 'px');
    }
  });
</script>
