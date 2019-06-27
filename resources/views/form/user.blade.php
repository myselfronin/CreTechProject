<div class="container">
    <form method="POST" action="{{route('user_register')}}">
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
        <div class="form-group">
            <label for="role">Role</label>
            <select name = "role_id" class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                <option selected>Choose...</option>
                <option value="2">Admin</option>
                <option value="3">Investor</option>
                <option value="4">Creditor</option>
            </select>
        </div>
        @csrf
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>