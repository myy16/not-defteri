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

                            <div>
                                {$note.title}
                                ({$note.date})
                            </div>
                            <div class="btn-right">
                                <a
                                    class="btn btn-secondary btn-sm me-2"
                                    href="/notes/{$id}/edit"
                                >Edit Note</a>
                                <a
                                    class="btn btn-danger btn-sm"
                                    href="/notes/{$id}/delete"
                                >Delete Note</a>
                            </div>
                        </div>
                        <div class="card-body">
                            {$note.content}
                        </div>
                    </div>
                {/foreach}
            </div>
        </div>

    {else}
        <p>Do not add yet any note</p>
    {/if}

    {include "footer.tpl"}
</body>

</html>