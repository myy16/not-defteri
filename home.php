<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>PHP Not Defteri</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.7/css/bootstrap.min.css" integrity="sha512-fw7f+TcMjTb7bpbLJZlP8g2Y4XcCyFZW8uy8HsRZsH/SwbMw0plKHFHr99DN3l04VsYNwvzicUX/6qurvIxbxw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <h1>Not Defteri</h1>

    <form method="POST">
        <div class="mb-3">
            <label for="title" class="form-label">Başlık:</label>
            <input name='title' type="text" class="form-control" id="title" placeholder="alınacaklar..">
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Not:</label>
            <textarea name='content' class="form-control" id="content" rows="3" placeholder="ekmek,süt,yumurta..."></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Kaydet</button>
    </form>

    <hr class="my-5">

    <h2>Kayıtlı Notlar:</h2>
    <div class="notes vstack gap-3">
        <?php if (!empty($notes)): ?>
            <?php foreach ($notes as $note): ?>
                <div class="card">
                    <div class="card-header">
                        <?= $note['title'] ?> (<?= $note['date'] ?>)
                    </div>
                    <div class="card-body">
                        <?= nl2br($note['content']) ?>
                    </div>
                </div>
            <?php endforeach; ?>
    </div>
<?php else: ?>
    <p>Henüz not eklenmedi.</p>
<?php endif; ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.7/js/bootstrap.min.js" integrity="sha512-zKeerWHHuP3ar7kX2WKBSENzb+GJytFSBL6HrR2nPSR1kOX1qjm+oHooQtbDpDBSITgyl7QXZApvDfDWvKjkUw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>

</html>