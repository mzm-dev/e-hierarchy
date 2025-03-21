<div class="list-group mb-3">
    <a href="{{ route('home') }}" class="list-group-item list-group-item-action">Home</a>
    <a href="{{ route('relationships.index') }}" class="list-group-item list-group-item-action">Relationship List</a>
    <a href="{{ route('relationships.create') }}" class="list-group-item list-group-item-action">New Relationship</a>
    <a href="{{ route('families.index') }}" class="list-group-item list-group-item-action">Family List</a>
    <a href="{{ route('families.create') }}" class="list-group-item list-group-item-action">New Family</a>
    <a href="{{ route('logout') }}" class="list-group-item list-group-item-action"
        onclick="event.preventDefault(); document.getElementById('logout-form').submit(); return confirm('Are you sure?')" >
        Logout
    </a>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
</div>
