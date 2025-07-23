<!DOCTYPE html>
<html>

{include "head.tpl"}

<body>


    <div class="container">
        <a
            href="/notes"
            class="btn btn-primary justify-content-center"
        >Notes</a>

        <div class ="notes-container" style ="margin-top: 160px;">
            <p style="font-size: 32px; color: #e75d00; font-weight: 600; text-align: center; text-shadow: 2px 2px 4px rgba(0,0,0,0.1);">You Have {count($notes)} Notes</p>
        </div>

    </div>


</body>

</html>