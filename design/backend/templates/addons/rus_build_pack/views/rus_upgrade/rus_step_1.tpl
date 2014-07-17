{* // rus_build_pack dbazhenov *}
{capture name="mainbox"}
    
    <div>
    <form action="{""|fn_url}" method="POST" name="rus_upgrade" class="form-horizontal form-edit" enctype="multipart/form-data">
        {include file="common/subheader.tpl" title=__("rus_connect.check_install_subheader") target="#collapsable_download_addons"}
            <div id="collapsable_download_addons" class="in collapse">
                {if $reload == "Y"}
                <p>{__("rus_connect.check_install_text")}</p>
                {else}
                <p>{__("rus_connect.check_install_true")}</p>
                {/if}
                   <table class="table table-addons table-wizard">
                        <thead>
                        <tr>
                            <th width="80%">{__("rus_connect.download_addons")}</th>
                            <th width="10%">{__("status")}</th>
                        </tr>
                        </thead>
                        {foreach from=$check_list key="key" item="addon"}
                        <tr>
                            <td width="80%">
                                <div class="object-group-link-wrap">
                                    <span class="unedited-element block">{$addon.addon_name}</span><br>
                                    <span class="row-status object-group-details">{__("rus_connect.install_dir")} : {$addon.install_src_dir}</span>
                                </div>
                            </td>
                            <td width="10%">
                                <div class="object-group-link-wrap">
                                    <span class="unedited-element block">{if $addon.check_download == "Y"}{__("successful")}{else}{__("error")}{/if}</span>
                                </div>
                            </td>
                        </tr>
                        {/foreach}
                    </table>
            </div>  
         <input type="hidden" name="check_conflict" value="Y">
    </form>
    </div>

    {capture name="sidebar"} 

    {/capture}

    {capture name="buttons"}
        {include file="buttons/button.tpl" but_role="submit-link" but_name="dispatch[rus_upgrade.clear_progress]" but_target_form="rus_upgrade" but_text=__("go_back")}
            {if $reload == "Y"}
        {include file="buttons/button.tpl" but_role="submit-link" but_name="dispatch[upgrade_center.upgrade_rus.reload]" but_target_form="rus_upgrade" but_text=__("log_action_update")}
            {/if}
            {include file="buttons/button.tpl" but_role="submit-link" but_name="dispatch[upgrade_center.upgrade_rus.rus_step_2]" but_target_form="rus_upgrade" but_text=__("next_step")}
    {/capture}

{/capture}

{include file="common/mainbox.tpl" title=__("rus_connect.check_install") content=$smarty.capture.mainbox title_extra=$smarty.capture.title_extra sidebar=$smarty.capture.sidebar buttons=$smarty.capture.buttons}
