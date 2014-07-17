{* rus_build_pack dbazhenov *}
<fieldset>
    
{if !$addons.rus_build_pack.license_key}

        <script type="text/javascript">
            Tygh.$(document).ready(function(){$ldelim}

                    Tygh.$('#rus_activate').trigger('click');

            {$rdelim});
        </script>

        <p>{__("rus_connect.activate_text")}</p>

        <a id="rus_activate" class="cm-dialog-opener cm-ajax btn btn-primary" data-ca-target-id="rus_activate_form" title="{__("rus_connect.activate_title")}" href="{"rus_upgrade.activate"|fn_url}">Выполнить активацию</a>

{else}

    {if !$addons.rus_build_pack.check_install || !$addons.rus_build_pack.cron_key}

            {include file="common/subheader.tpl" title=__("rus_build_pack.install.function_title") }
            {__("rus_build_pack.install.function_text")}

            <div class="control-group">
                    <div class="controls">
                        <label for="currencies" class="checkbox">
                            <input type="hidden" name="rus_function[currencies]" value="N" />
                            <input type="checkbox" id="currencies" name="rus_function[currencies]" value="Y" checked="checked"/>{__("rus_build_pack.install.currencies")}<br />
                            <span class="muted annotate">{__("rus_build_pack.install.currencies_tooltip")}</span>
                        </label>
                    </div>
             </div>
             <div class="control-group">
                    <div class="controls">
                        <label for="payments" class="checkbox">
                            <input type="hidden" name="rus_function[payments]" value="N" />
                            <input type="checkbox" id="payments" name="rus_function[payments]" value="Y" checked="checked" />{__("rus_build_pack.install.payments")}<br />
                            <span class="muted annotate">{__("rus_build_pack.install.payments_tooltip")}</span>
                        </label>
                    </div>
             </div>
             <div class="control-group">
                <div class="controls">
                    <label for="shippings" class="checkbox">
                        <input type="hidden" name="rus_function[shippings]" value="N" />
                        <input type="checkbox" id="shippings" name="rus_function[shippings]" value="Y" checked="checked"/>{__("rus_build_pack.install.shippings")}<br />
                        <span class="muted annotate">{__("rus_build_pack.install.shippings_tooltip")}</span>
                    </label>
                </div>     
            </div>

            <div class="buttons-container">
                <input type="hidden" name="result_ids" value="activate_install"/> 
                {include file="buttons/button.tpl" but_role="submit" but_meta="btn-primary cm-skip-avail-switch" but_name="dispatch[rus_install.function]" but_text=__("rus_build_pack.buttons.function_button")}
            </div>

    {else}
            {assign var="magic_key" value=$addons.rus_build_pack.cron_key|urlencode}
            <input type="hidden" name="magic_key" value="{$magic_key}"/>

            {include file="common/subheader.tpl" title=__("rub_info_title") target="#collapsable_currency"}
            <div id="collapsable_currency" class="in collapse">

                <div class="control-group">
                    <label class="control-label" for="symbol_update">{__('rub_info_symbol_update')}:</label>
                    <div class="controls" id="symbol_update">
                        <br />
                        {include file="buttons/button.tpl" but_role="submit" but_name="dispatch[currencies_sync.symbol_update]" but_text=__("rub_info_symbol_update_button")}
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="symbol_update">{__('rub_info_currency_sync')}:</label>
                    <div class="controls" id="symbol_update">
                        <p>{__('currencies_sync_info')}</p>
                        <br />
                        {include file="buttons/button.tpl" but_role="submit" but_name="dispatch[currencies_sync.sync]" but_text=__("rub_info_currency_sync_button")}

                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="symbol_update">{__('rub_info_currency_sync_auto')}:</label>
                    <div class="controls" id="symbol_update">
                        {__('auto_info')}
                        <br />
                        {"currencies_sync.sync?magic_key=`$magic_key`"|fn_url}
                        <br />
                        {__('auto_instruction_data')}
                        <br />
                        {__('auto_instruction_data_end')}
                    </div>
                </div>

            </div>   
    {/if}
{/if}
</fieldset>

