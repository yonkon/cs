{* // rus_build_pack dbazhenov *}
{capture name="mainbox"}
<div id="upgrade">
    
{if !$addons.rus_build_pack.license_key}

        <script type="text/javascript">
            Tygh.$(document).ready(function(){$ldelim}

                    Tygh.$('#rus_activate').trigger('click');

            {$rdelim});
        </script>

        <p>{__("rus_connect.activate_text")}</p>

        <a id="rus_activate" class="cm-dialog-opener cm-ajax btn btn-primary" data-ca-target-id="rus_activate_form" title="{__("rus_connect.activate_title")}" href="{"rus_upgrade.activate"|fn_url}">Выполнить активацию</a>

{else}

    {include file="addons/rus_build_pack/views/rus_upgrade/components/sidebar.tpl"}

        {include file="common/subheader.tpl" title=__("rus_connect.install_subheader")}

        {if $next_version_info.addons_info}
            <p>{__("rus_connect.install_text")}</p>

            {include file="common/subheader.tpl" meta="collapsed" title=__("rus_connect.install_subheader_instruction") target="#collapsable_upgrade_instruction"}

            <div id="collapsable_upgrade_instruction" class="collapse">
                {__("rus_connect.install_text_instruction")}
            </div> 

            <form action="{""|fn_url}" method="POST" name="rus_upgrade" class="form-horizontal form-edit" enctype="multipart/form-data">
                {include file="common/subheader.tpl" title=__("rus_connect.install_download_addons") target="#collapsable_download_addons"}

                <div id="collapsable_download_addons" class="in collapse">
                    <table class="table table-addons table-wizard">
                        <thead>
                        <tr>
                            <th class="left"></th>
                            <th width="75%">{__("addons")}</th>
                            <th width="15%" colspan="2">{__("rus_connect.new_version")}</th>
                        </tr>
                        </thead>
                        {foreach from=$next_version_info.addons_info key="key" item="addon"}
                        <tr>
                            <td class="addon-icon">
                                <div class="bg-icon">
                                    <img src="{$images_dir}/addons/rus_build_pack/simtechdev.png" width="38" height="38" border="0" alt="{$addon.name}" title="{$addon.name}" >
                                </div>
                            </td>
                            <td width="65%">
                                <div class="object-group-link-wrap">
                                    <span class="unedited-element block">{$addon.name}</span><br>
                                    <span class="row-status object-group-details">{$addon.description}</span>
                                    {if $addon.tooltip}
                                    <br/> 
                                    <span class="row-status object-group-details">{__("changes")}: {$addon.tooltip}</span>
                                    {/if}
                                </div>
                            </td>
                            <td width="10%">
                                <div class="object-group-link-wrap">
                                    <span class="unedited-element block">{$next_version_info.version_list.$key}</span>
                                </div>
                            </td>
                            <td width="5%">
                                <input type="hidden" name="addons[{$key}]" value="N">
                                <label for="addon_{$addon.name}" class="checkbox">
                                    <input id="addon_{$addon.name}" type="checkbox" name="addons[{$key}]" value="Y">
                                    {__("{$addon.type}")}
                                </label>     
                            </td>
                        </tr>
                        {/foreach}
                    </table>
                </div>  

            {capture name="buttons"}
                        {include file="buttons/button.tpl" but_role="submit-link" but_name="dispatch[upgrade_center.upgrade_rus]" but_target_form="rus_upgrade" but_text=__("next_step")}
            {/capture}
            </form>
        {else}
                {if $next_version_info.notify}
                    <p>{$next_version_info.notify}</p>
                {else}
                    <p>{__('text_no_upgrades_available')}</p>
                {/if}

        {/if}


{/if}

<!--upgrade--></div>

{/capture}
{include file="common/mainbox.tpl" title=__("rus_connect.install") content=$smarty.capture.mainbox title_extra=$smarty.capture.title_extra sidebar=$smarty.capture.sidebar buttons=$smarty.capture.buttons}
