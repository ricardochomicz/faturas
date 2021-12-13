<h1>Uploads</h1>
<a href="/upload">Up</a>

<form action="/upload-file" method="post" enctype="multipart/form-data">
@csrf
    <input type="file" name="document">
    <button type="submit">Enviar</button>
</form>
