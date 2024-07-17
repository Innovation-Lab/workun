<div class="p-pager">
  <p class="count">
    全 {{ number_format($pagination->total()) }} 件中
    {{ number_format($pagination->firstItem()) }}～{{ number_format($pagination->lastItem()) }} 件目
  </p>
  <div class="pageNav">
    <a
      @if($pagination->onFirstPage())
        class="arrowButton arrowButton--prev disabled"
      @else
        href="{{ $pagination->previousPageUrl() }}"
        class="arrowButton arrowButton--prev disabled"
      @endif
    >
      <svg width="28" height="28"><use xlink:href="#pageNav_prev" /></svg>
    </a>
    <div class="p-input">
      <input
        type="number"
        placeholder="1"
        value="{{ $pagination->currentPage() }}"
        onchange="changePage($(this).val())"
      />
      <span class="total">/ {{ $pagination->lastPage() }}</span>
    </div>
    <a
      @if(!$pagination->hasMorePages())
        class="arrowButton arrowButton--next disabled"
      @else
        href="{{ $pagination->nextPageUrl() }}"
        class="arrowButton arrowButton--next"
      @endif
    >
      <svg width="28" height="28"><use xlink:href="#pageNav_next" /></svg>
    </a>
  </div>
</div>
<script>
  function changePage(page) {
    let form = $('#pagination_form')
    form.append('<input type="hidden" name="page" value="'+page+'">')
    form.submit()
  }
</script>
