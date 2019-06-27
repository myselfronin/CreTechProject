<div class="container">
    <form method="POST" action="{{route('user_register')}}">
        <input type="hidden"  name="role_id" value="2">
        <input type="hidden"  name="phone_no" value="2323231">
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control" placeholder="Enter your name">
        </div>
        <div class="form-group">
            <label for="email">Super Username</label>
            <input type="email" name="email" class="form-control" placeholder="Enter your email">
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" name="password" placeholder="Enter your password">
        </div>
        @csrf
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>