{* // rus_build_pack dbazhenov *}
{capture name="mainbox"}
    <div>
    <form action="{""|fn_url}" method="POST" name="rus_upgrade" class="form-horizontal form-edit" enctype="multipart/form-data">
        {if $check_permissions == "Y"}

            {include file="common/subheader.tpl" meta="collapsed" title=__("rus_connect.check_permissions_files") target="#collapsable_files_instruction"}

            {if $check_permission_list}
                <div id="collapsable_files_instruction" class="collapse">
                        <div class="row-fluid">
                                <div class="span6">
                                    <table class="table table-middle table-condensed">
                                        {foreach from=$check_permission_list item="c"}
                                            <tr>
                                                <td title="{$c}">
                                                    <span class="pull-left">{$c}</span>
                                                </td>
                                            </tr>
                                            {foreachelse}
                                            <tr>
                                                <td class="no-items">{__("no_data")}</td>
                                            </tr>
                                        {/foreach}
                                    </table>
                                </div>
                        </div>
                </div>
            {/if}

            <div id="collapsable_files_instruction" class="collapse">
                    <p>{__("rus_connect.conflict_addons_text_true")}</p>
                    <div class="row-fluid">
                            <div class="span6">
                                <table class="table table-middle table-condensed">
                                    {foreach from=$repo item="c"}
                                        <tr>
                                            <td title="{$c}">
                                                <span class="pull-left">{$c}</span>
                                            </td>
                                        </tr>
                                        {foreachelse}
                                        <tr>
                                            <td class="no-items">{__("no_data")}</td>
                                        </tr>
                                    {/foreach}
                                </table>
                            </div>
                    </div>
             </div>

        {else}

            <p>{__("rus_connect.upgrade.not_writable")}:</p>
            <p>{__("auto_set_permissions_via_ftp")}:</p>

            {include file="buttons/button.tpl" but_role="action" but_href="{"settings.manage&section_id=Upgrade_center"|fn_url}"  but_text=__("export_to_ftp")}
            
            {if $check_permission_result}
                {include file="common/subheader.tpl" title=__("text_uc_non_writable_files") target="#collapsable_files_instruction"}

                <div id="collapsable_files_instruction" class="in collapse">
                        <div class="row-fluid">
                                <div class="span6">
                                    <table class="table table-middle table-condensed">
                                        {foreach from=$check_permission_result item="c"}
                                            <tr>
                                                <td title="{$c}">
                                                    <span class="pull-left">{$c}</span>
                                                </td>
                                            </tr>
                                            {foreachelse}
                                            <tr>
                                                <td class="no-items">{__("no_data")}</td>
                                            </tr>
                                        {/foreach}
                                    </table>
                                </div>
                        </div>
                </div>
            {/if}
        {/if}

        {if $conflict_list}
            {include file="common/subheader.tpl" title=__("rus_connect.conflict_addons_subheader") target="#collapsable_download_addons"}
                <div id="collapsable_download_addons" class="in collapse">
                    <p>{__("rus_connect.conflict_addons_text")}</p>
                    <table class="table table-addons table-wizard">
                        <thead>
                        <tr>
                            <th width="80%">{__("rus_connect.deleted_addons")}</th>
                            <th width="10%">{__("version")}</th>
                            <th width="10%">{__("status")}</th>
                        </tr>
                        </thead>
                        {foreach from=$conflict_list key="key" item="addon"}
                        <tr>
                            <td width="80%">
                                <div class="object-group-link-wrap">
                                    <span class="unedited-element block">{$addon.name}</span><br>
                                    <span class="row-status object-group-details">{__("rus_connect.backup_root")} : {$addon.backup_root}</span>
                                </div>
                            </td>
                            <td width="10%">
                                <div class="object-group-link-wrap">
                                    <span class="unedited-element block">{$addon.version}</span>
                                </div>
                            </td>
                            <td width="10%">
                                <div class="object-group-link-wrap">
                                    <span class="unedited-element block">{if $addon.status == "A"}{__("active")}{elseif $addon.status == "D"}{__("disable")}{/if}</span>
                                </div>
                            </td>
                        </tr>
                        {/foreach}
                    </table>
                </div>  
             <input type="hidden" name="check_conflict" value="Y">
        {else}
            <p>{__("rus_connect.conflict_addons_done")}</p>
        {/if}
    </form>
    </div>

    {capture name="sidebar"} 

    {/capture}

    {capture name="buttons"}
            {include file="buttons/button.tpl" but_role="submit-link" but_name="dispatch[rus_upgrade.clear_progress]" but_target_form="rus_upgrade" but_text=__("go_back")}
            {if $check_permissions != "Y"}
            {include file="buttons/button.tpl" but_role="submit-link" but_name="dispatch[upgrade_center.upgrade_rus.repeat_check_perm]" but_target_form="rus_upgrade" but_text=__("rus_connect.button.repeat_check_perm")}
            {else}
            {include file="buttons/button.tpl" but_role="submit-link" but_name="dispatch[upgrade_center.upgrade_rus.rus_step_3]" but_target_form="rus_upgrade" but_text=__("next_step")}
            {/if}
    {/capture}

{/capture}

{include file="common/mainbox.tpl" title=__("rus_connect.check_conflict_title") content=$smarty.capture.mainbox title_extra=$smarty.capture.title_extra sidebar=$smarty.capture.sidebar buttons=$smarty.capture.buttons}
