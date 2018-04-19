<html>
<body>
<h1>hello</h1>
<div class="container">
    @foreach ($users as $user)
    {{ $user->name }}
    @endforeach
</div>
{{ $users->links() }}
</body>
</html>