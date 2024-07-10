<form method="POST">
  @csrf
  <input name="name" value="{{ old('name', $organization->name) }}" />
  @error('name')
    <p>{{ $message }}</p>
  @enderror
  <button type="submit">更新</button>
</form>
