<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
        @foreach(Request::segments() as $segment)
            <li class="breadcrumb-item">
                {{ucfirst(trans($segment))}}
            </li>
        @endforeach
    </ol>
</nav>
