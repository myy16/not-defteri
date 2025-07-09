<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Notes</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.7/css/bootstrap.min.css" integrity="sha512-fw7f+TcMjTb7bpbLJZlP8g2Y4XcCyFZW8uy8HsRZsH/SwbMw0plKHFHr99DN3l04VsYNwvzicUX/6qurvIxbxw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <h1>Notes</h1>
    <div class="text-end mb-3">
        <a class="btn btn-primary fw-bold fs-3" href="add.php">+</a>
    </div>
    <div class="notes vstack gap-3">
        <?php if (!empty($notes)): ?>
            <?php foreach ($notes as $id => $note): ?>
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        
                        <div>
                         <?= $note['title'] ?>
                        (<?= $note['date'] ?>)   
                        </div>
                        <a class="btn btn-secondary " href="edit.php?id=<?= $id ?>">Edit Note</a>
                        <a class="btn btn-secondary " href="delete.php?id=<?= $id ?>">Delete Note</a>
                    </div>
                    <div class="card-body">
                        <?= nl2br($note['content']) ?>
                    </div>
                </div>
            <?php endforeach; ?>
    </div>
    
       
    
        
<?php else: ?>
    <p>Do not add yet any note</p>
<?php endif; ?>
 
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.7/js/bootstrap.min.js" integrity="sha512-zKeerWHHuP3ar7kX2WKBSENzb+GJytFSBL6HrR2nPSR1kOX1qjm+oHooQtbDpDBSITgyl7QXZApvDfDWvKjkUw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</body>

</html>