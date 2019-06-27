<div class="container">
    <form method="POST" action="{{route('create_role')}}">
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="role" class="form-control" placeholder="Enter new role">
        </div>
        @csrf
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>