<form
  method="post"
  id="self-check-form"
  class="p-page__body row2"
>
  @csrf
  @include('master.self-check._form_layer')
  @include('master.self-check._form_sheet')
</form>
