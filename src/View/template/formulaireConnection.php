<form class="w-75 h-75" action="<?= $router->url('connection') ?>" method="POST">
    <h3 class="text-center">connection</h3>
    <div class="form-floating mb-3 text-dark">
        <input type="email" class="form-control" id="floatingInput" name="username" placeholder="name@example.com">
        <label for="floatingInput">votre username</label>
    </div>
    <div class="form-floating text-dark">
        <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="Password">
        <label for="floatingPassword">votre password</label>
    </div>
    <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-4">
        <button class="btn btn-outline-dark me-md-2" name= "connection" type="submit">Se Connecter</button>
    </div>
</form>