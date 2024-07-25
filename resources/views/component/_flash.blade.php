<section class="p-flash">
    <?php
    if(isset($_GET['flash'])){
    $flash = $_GET['flash'];
    if($flash === 'successDeleteNews' || $flash === 'successDeleteClient' || $flash === 'successDelete'){
    ?>
    <div class="flash_success">
        <div class="data">
            <div class="c-icon__w16 c-icon--check__white"></div>
            <p class="c-txt__md">Delete!</p>
            <p class="c-txt__sm c-txt--center">削除が完了しました</p>
        </div>
    </div>
    <?php }};?>
    <?php
    if(isset($_GET['flash'])){
    $flash = $_GET['flash'];
    if($flash === 'successRegister'){
    ?>
    <div class="flash_success">
        <div class="data">
            <div class="c-icon__w16 c-icon--check__white"></div>
            <p class="c-txt__md">Success!</p>
            <p class="c-txt__sm c-txt--center">登録が完了しました</p>
        </div>
    </div>
    <?php }};?>
    <?php
    if(isset($_GET['flash'])){
    $flash = $_GET['flash'];
    if($flash === 'successEvaluate'){
    ?>
    <div class="flash_success">
        <div class="data">
            <div class="c-icon__w16 c-icon--check__white"></div>
            <p class="c-txt__md">Success!</p>
            <p class="c-txt__sm c-txt--center">評価が完了しました</p>
        </div>
    </div>
    <?php }};?>
    <?php
    if(isset($_GET['flash'])){
    $flash = $_GET['flash'];
    if($flash === 'successApproval'){
    ?>
    <div class="flash_success">
        <div class="data">
            <div class="c-icon__w16 c-icon--check__white"></div>
            <p class="c-txt__md">Success!</p>
            <p class="c-txt__sm c-txt--center">承認が完了しました</p>
        </div>
    </div>
    <?php }};?>
    <?php
    if(isset($_GET['flash'])){
    $flash = $_GET['flash'];
    if($flash === 'successSave'){
    ?>
    <div class="flash_success">
        <div class="data">
            <div class="c-icon__w16 c-icon--check__white"></div>
            <p class="c-txt__md">Success!</p>
            <p class="c-txt__sm c-txt--center">入力内容が保存されました</p>
        </div>
    </div>
    <?php }};?>
    <?php
    if(isset($_GET['flash'])){
    $flash = $_GET['flash'];
    if($flash === 'successLogin'){
    ?>
    <div class="flash_success">
        <div class="data">
            <div class="c-icon__w16 c-icon--check__white"></div>
            <p class="c-txt__md">LOGIN</p>
            <p class="c-txt__sm c-txt--center">正常にログインされました</p>
        </div>
    </div>
    <?php }};?>
    <?php
    if(isset($_GET['flash'])){
    $flash = $_GET['flash'];
    if($flash === 'successLogout'){
    ?>
    <div class="flash_success">
        <div class="data">
            <div class="c-icon__w16 c-icon--check__white"></div>
            <p class="c-txt__md">LOGOUT</p>
            <p class="c-txt__sm c-txt--center">正常にログアウトされました</p>
        </div>
    </div>
    <?php }};?>
    @if (session('flash_message'))
        <div class="flash_success">
            <article class="link_float">
                <div class="data_flash">
                    <p>{{ session('flash_message') }}</p>
                </div>
            </article>
        </div>
    @endif
    @if($errors->any())
        @foreach($errors->all() as $message)
            <div class="flash_error">
            <article class="link_float">
                <div class="data_flash">
                <p>{{ $message }}</p>
                </div>
            </article>
            </div>
        @endforeach
    @endif
</section>