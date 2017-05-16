<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>First Name:</strong>
            {{ $user->firstname }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Last Name:</strong>
            {{ $user->lastname }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Email:</strong>
            {{ $user->email }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Is Admin:</strong>
            <strong>Can access as:</strong></br>
            <input type="checkbox" class="filled-in" {{ ($user->isAdmin == 1) ? 'checked' : '' }} name="role_user" id="role_user"><label for="role_user"></label></br>
        </div>
    </div>
</div>