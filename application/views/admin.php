<div class="col-md-12 text-center">
    <form class="form-signin needs-validation" novalidate method="post" action="#ROOT#/admin/auth">
        <i class="fa fa-shield fa-3x" aria-hidden="true"></i>
        <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
        <label for="inputName" class="sr-only">Name</label>
        <div class="form-group">
            <input type="text" id="inputName" class="form-control" name="name" placeholder="Name" required autofocus>
            <div class="invalid-feedback" style="width: 100%;">
                Name is required.
            </div>
        </div>
        <div class="form-group">
            <label for="inputPassword" class="sr-only">Password</label>
            <input type="password" id="inputPassword" class="form-control" name="pass" placeholder="Password" required>
            <div class="invalid-feedback" style="width: 100%;">
                Password is required.
            </div>
        </div>
        <div class="alert alert-success d-none success-enter" role="alert"></div>
        <div class="alert alert-danger d-none error-enter" role="alert"></div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
    </form>
</div>