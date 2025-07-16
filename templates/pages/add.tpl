<!DOCTYPE html>
<html>

{include "head.tpl"}

<body>
    <div class="container">

        {include "header.tpl"}

        <br><br><br><br>

        {if !empty($error)}
            <div class="alert alert-danger">
                {$error}
            </div>
        {/if}

        {if $showSuccessModal}
            <div class="alert alert-success text-center">
                <h5>✅ Successfully!</h5>
                Your note added!
            </div>
        {/if}

        <form
            method="POST"
            id="{$form_id}"
        >
            <div class="mb-3">
                <label
                    for="title"
                    class="form-label"
                >Title:</label>
                <input
                    name='title'
                    type="text"
                    class="form-control"
                    id="title"
                    placeholder="To do.."
                >
            </div>
            <div class="mb-3">
                <label
                    for="content"
                    class="form-label"
                >Note:</label>
                <textarea
                    name='content'
                    class="form-control"
                    id="content"
                    rows="3"
                    placeholder="buy ticket,go shopping..."
                ></textarea>
            </div>
        </form>
    </div>

    {include "footer.tpl"}

</body>

</html>