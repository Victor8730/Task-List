<h4 class="mb-3">Adding a task</h4>
<form class="needs-validation form-task" novalidate method="post" action="/add/#action#">
    <div class="mb-3">
        <label for="username">Name <span class="text-muted">*</span></label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fa fa-user-circle-o" aria-hidden="true"></i></span>
            </div>
            <input type="text" class="form-control" id="username" name="name" placeholder="What your name?" required value="#valuename#">
            <div class="invalid-feedback" style="width: 100%;">
                Your username is required.
            </div>
        </div>
    </div>
    <div class="mb-3">
        <label for="email">Email <span class="text-muted">*</span></label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fa fa-envelope" aria-hidden="true"></i></span>
            </div>
            <input type="email" class="form-control" id="email" name="email" placeholder="What your email?" required value="#valuemail#">
            <div class="invalid-feedback">
                Please enter a valid email address for shipping updates.
            </div>
        </div>
    </div>
    <div class="form-group">
        <label for="task">Your assignment *</label>
        <textarea class="form-control" id="task" name="task" rows="3" placeholder="Task text" required>#valuetask#</textarea>
        <div class="invalid-feedback" style="width: 100%;">
            Your task is required.
        </div>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="checkbox" name="status" id="status" #valuestatuschecked#>
        <label class="form-check-label" for="status">
            task completed?
        </label>
    </div>
    <hr class="mb-4">
    <input type="hidden" name="id-element" value="#valueid#">
    <div class="alert alert-success d-none success-enter" role="alert"></div>
    <div class="alert alert-danger d-none error-enter" role="alert"></div>
    <button class="btn btn-success btn-lg btn-block" type="submit">#button#</button>
</form>