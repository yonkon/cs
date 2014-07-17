{* // rus_build_pack dbazhenov *}
{capture name="sidebar"}
    {if !$config.demo_mode}
        <div class="sidebar-row">
            <h6>{__("rus_connect.access_id")}</h6>
            <p class="muted">{$addons.rus_build_pack.license_key}</p>
        </div>
        <hr>
    {/if}
    <div class="sidebar-row">
        <form action="{""|fn_url}" method="POST" name="install" class="form-horizontal form-edit" enctype="multipart/form-data">
            {include file="buttons/button.tpl" but_role="submit" but_name="dispatch[rus_upgrade.check_upgrade]" but_text=__("rus_connect.check_upgrade")}
        </form>
    </div>
    <hr>
    {if $next_version_info.notify}
    <div class="sidebar-row">
        <h6>{__("information")}</h6>
        <p class="muted">{$next_version_info.notify}</p>
    </div>
    <hr>
    {/if}
{/capture}
