<form class="p-formBlock__form">
  <div class="p-inputField">
    <label class="label" >部署</label>
    <select name="" id="">
      <option value="">部署を選択</option>
    </select>
    <p class="alert">部署を選択してください</p>
  </div>
  <div class="p-inputField">
    <label class="label" >役職</label>
    <select name="" id="">
      <option value="">役職を選択</option>
    </select>
    <p class="alert">役職を選択してください</p>
  </div>
  <div class="p-inputField">
    <label class="label" >等級</label>
    <select name="" id="">
      <option value="">等級を選択</option>
    </select>
    <p class="alert">等級を選択してください</p>
  </div>
  <div class="p-inputField">
    <label class="label" >雇用形態</label>
    <select name="" id="">
      <option value="">雇用形態を選択</option>  
    </select>
    <p class="alert">雇用形態を選択してください</p>
  </div>
  <div class="p-inputField">
    <label class="label" >評価者</label>
    <div class="p-inputField--userSelect">
      <div class="p-user">
        <input type="hidden">
        <div class="p-user__image c-noImage">
          <img class="c-image c-image--round" src="">
        </div>
        <div class="p-user__text">
          <div class="name">酒井 雄輝</div>
        </div>
        <span class="p-user__delete">
          <svg width="12" height="12"><use xlink:href="#close" /></svg>
        </span>
      </div>
      <div data-remodal-target="modal_rater" class="c-button">評価者を登録</div>
      <p class="alert">評価者を登録してください</p>
    </div>
  </div>
  <div class="p-inputField">
    <label class="label" >承認者</label>
    <div class="p-inputField--userSelect">
      <div class="p-user">
        <input type="hidden">
        <div class="p-user__image c-noImage">
          <img class="c-image c-image--round" src="">
        </div>
        <div class="p-user__text">
          <div class="name">酒井 雄輝</div>
        </div>
        <span class="p-user__delete">
          <svg width="14" height="14"><use xlink:href="#close" /></svg>
        </span>
      </div>
      <div data-remodal-target="modal_authorizer" class="c-button">承認者を登録</div>
      <p class="alert">承認者を登録してください</p>
    </div>
  </div>
  <div class="p-inputField">
    <label class="label" >アカウント権限</label>
    <select name="" id="">
      <option value="">等級を選択</option>
    </select>
    <p class="alert">アカウント権限を選択してください</p>
  </div>
  <div class="p-inputField p-inputField--textarea">
    <label class="label" >わーくんメモ</label>
    <textarea name="" id="" placeholder="わーくんメモを記入"></textarea>
  </div>
  <div class="p-formBlock__action">
    <button class="c-button c-button--brandPrimary u-w120">更新する</button>
  </div>
</form>