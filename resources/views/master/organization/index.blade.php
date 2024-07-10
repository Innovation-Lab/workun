<ul>
  @foreach($organizations as $organization)
    <li>
      <a href="{{ route('master.organization.edit', $organization) }}">
        {{ $organization->name }}
      </a>
    </li>
  @endforeach
</ul>
{{ $organizations->links() }}
