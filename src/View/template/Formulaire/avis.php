<div class= "w-50 m-auto p-4 bg-dark text-white " id="footer">
    <form action="#footer" method="get">

        <div class="form-floating mb-3  text-dark" id="">
            <input class="form-control" type="text" name="pseudo" id="pseudo" value = "" placeholder="{$key}@example.com">
            <label class="font-weight-bold" for="pseudo">votre pseudo</label>
        </div>
        <div class="form-floating mb-3">
            <textarea class="form-control " placeholder="Leave a comment here"  type="text" name="commentaire" id="commentaire" style="height: 200px"></textarea>
            <label class="text-dark" for="commentaire">votre avis</label>
        </div>
        <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-4">
            <button class="btn btn-outline-light me-md-2" name= "avis" type="submit">soumettre votre avis</button>
        </div>
    </form>
</div>