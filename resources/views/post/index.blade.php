<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    {{-- Bootstarp 5.3 --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    {{-- Fontawsome Pro 6.5.1 --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/eliyantosarage/font-awesome-pro@main/fontawesome-pro-6.5.1-web/css/all.min.css">
    <style>
        body {
            padding: 100px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <h5>Post List</h5>
                <a href="{{ route('posts.create') }}">
                    <button class="btn btn-sm btn-primary float-end mb-3"><i class="fa-solid fa-plus-large"></i> Add New Post</button>
                </a>

                {{-- update and delete successful message --}}
                @if(Session('successAlert'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{ session('successAlert') }}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Content</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($posts as $post)
                            <tr>
                                <td>{{ $post -> id }}</td>
                                <td>{{ $post -> title }}</td>
                                <td>{{ $post -> content }}</td>
                                <td>
                                    <form action="{{ url('posts/'.$post->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <a href="{{ url('posts/'. $post->id .'/edit') }}">
                                            <button type="button" class="btn btn-primary btn-sm"><i class="fa-duotone fa-pen-to-square"></i>
                                                Edit
                                            </button>
                                        </a>
                                        <button class="btn btn-danger btn-sm" onclick="return confirm('Are You Sure you want to delete this data?')">
                                            <i class="fa-duotone fa-trash"></i> Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center">No posts found</td>
                                </tr>
                            @endforelse
                    </tbody>
                </table>
            </div>
            {{ $posts->links() }}
            <div class="col-md-2"></div>
        </div>
    </div>

    {{-- Bootstarp and Jquery  --}}
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.slim.min.js"></script>
</body>
</html>
