<!DOCTYPE html>
<html>

{include "head.tpl"}

<body>
    <div class="container">
        {include "header.tpl"}

        <div class="notes-container ">

            {if !empty($notes)}
                {foreach $notes as $id => $note}
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">

                            <h2 class="fs-6">
                                {$note.title}
                                ({$note.date})
                            </h2>

                            <div class="btn-right">
                                <a
                                    class="btn btn-secondary btn-sm me-2"
                                    href="/notes/{$id}/edit"
                                >Edit Note</a>
                                <form
                                    method="post"
                                    action="/notes/{$id}/delete"
                                >
                                    <button
                                        type="submit"
                                        class="btn btn-danger btn-sm"
                                    >
                                        Delete Note
                                    </button>
                                </form>
                            </div>
                        </div>
                        <div class="card-body">
                            {$note.content}
                        </div>
                    </div>
                {/foreach}
            </div>
            <form
                action="/notes"
                method="POST"
            >
                <input
                    type="hidden"
                    name="_METHOD"
                    value="DELETE"
                >
                <button
                    type="submit"
                    class="btn btn-danger fixed m-5"
                >Delete All Notes</button>
            </form>
        </div>

    {else}
        <p>Do not add yet any note</p>
    {/if}

    {include "footer.tpl"}
</body>

</html>