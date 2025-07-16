<div class="header-flex">
    <h1>{$datas.title}</h1>

    <div class="btn-right">
    {foreach $datas.buttons as $button}
        {if isset($button.type) && $button.type === 'submit'}
            <button type="submit"
                form="{$button.form_id}"
                class="{$button.class}"
                title="{$button.title}"
                data-bs-toggle="tooltip">
                {$button.text}
            </button>
        {else}
            <a href="{$button.href}"
                    class="{$button.class}"
                    title="{$button.title}"
                    data-bs-toggle="tooltip">
                    {$button.text}
                </a>
            {/if}
        {/foreach}
    </div>
</div>