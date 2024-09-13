@extends('layouts.app')

@section('content')
    <div class="container">
        <x-heading title="Category List" class="ps-5" />

        @if (session('info'))
            <div class="alert alert-info">
                {{ session('info') }}
            </div>
        @endif

        <div class="row">
            <div class="col-8">
                <h3>Listing</h3>
                <table class="table">
                    <thead>
                        <th>Name</th>
                        <th>Actions</th>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                            <tr>
                                <td>
                                    {{ $category->name }}
                                </td>
                                <td>
                                    Edit
                                    Delete
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-4">
                <h3>Create New</h3>
                <form action="{{ url('/categories') }}" method="POST" id="ajax-form">
                    @csrf
                    <div class="mb-2">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control" required />
                    </div>
                    <div class="mb-2">
                        <button type="submit" class="btn btn-primary">Create</button>
                    </div>
                </form>
            </div>
        </div>
        {{ $categories->links() }}
    </div>
@endsection

@section('script')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<script>
    $(document).ready(function() {
        $('#ajax-form').submit(function(e) {
            e.preventDefault();

            const url = $(this).attr('action');
            const formData = new FormData(this);

            $.ajax({
                type: 'POST',
                url: url,
                data: formData,
                contentType: false,
                processData: false,
                success: (response) => {
                    console.log(response);
                    location.reload();
                },
                error: function(response) {
                    console.log(response);
                }
            });
        });
    })
</script>
@endsection
