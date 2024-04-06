
<h3 class="text-center">ajouter un  utilisateur </h3>
<div class= "w-50 m-auto p-4 bg-dark text-white ">
    <form action="<?= $router->url('addCompte')?>" method="post">
        <div class="form-floating mb-3 text-dark">
            <input type="email" class="form-control" id="floatingInput" value="<?= $user->getUsername() ?>" name="username" placeholder="name@example.com">
            <label for="floatingInput">username</label>
        </div>
        <div class="d-flex justify-content-between">
            <div class="form-floating mb-3  text-dark">
                <input type="text" class="form-control"  value= "<?= $user->getNom() ?>" name="nom" placeholder="name@example.com" >
                <label for="floatingInput">nom</label>
            </div>
            <div class="form-floating mb-3 text-dark">
                <input type="text" class="form-control"  value="<?= $user->getPrenom() ?>" name="prenom" placeholder="name@example.com">
                <label for="floatingInput">prenom</label>
            </div>
        </div>
        <div class="form-floating mb-3 text-dark">
            <input type="password" class="form-control"  name="password" placeholder="name@example.com">
            <label for="floatingInput">password</label>
        </div>
        <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-4">
            <button class="btn btn-outline-light me-md-2" name= "compte" type="submit">créer</button>
        </div>
    </form>
</div>