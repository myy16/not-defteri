<!DOCTYPE html>
<html lang="tr">

{include "head.tpl"}

<body>
    <div class="container">

        {include "header.tpl"}

        <br><br><br><br>
        <form method="POST" id="{$form_id}">
            {if !empty($error)}
                <div class="alert alert-danger">
                    {$error}
                </div>
            {/if}

            {if $showSuccessModal}
                <div class="alert alert-success text-center">
                    <h5> ✅ Successfully!</h5>
                    Your note updated!
                </div>
            {/if}

            <div class="mb-3">
                <label for="title" class="form-label">Title:</label>
                <input name='title' type="text" class="form-control" id="title" value="{$note.title|escape}" placeholder="Title">
            </div>
            <br>
            <div class="mb-3">
                <label for="content" class="form-label">Note:</label>
                <textarea name="content" class="form-control" id="content" rows="3" placeholder="Content">{$note.content|escape}</textarea>
            </div>
        </form>
    </div>

    {include "footer.tpl"}

</body>

</html>