<div id="order_make_div">

    <div id="order_make_top">
        <h2 class="lightbox-header-text">New order - Main info</h2>
        <img src="/images/close.png" class="close">
        <p class="graytext">Fill client data please</p>
    </div>
    <div id="order_make_content">
        <div>
            <label for="client_fio"></label>
            <input id="client_fio" name="client[fio]" value="{$client.fio }">
        </div>
        <div>
            <label for="client_phone"></label>
            <input id="client_phone" name="client[phone]" value="{$client. }">
        </div>
        <div>
            <span></span>
        </div>
        <div>
            <label for="client_company"></label>
            <select id="client_company" name="client[company]">
                {foreach from=$companies item="company"}
                    <option {if $company == $client.company}selected="selected"{/if}>{$company}</option>
                {/foreach}
            </select>
        </div>
        <div>
            <label for="client_region"></label>
            <select id="client_region" name="client[region]">
                {foreach from=$regions item="region"}
                    <option {if $region == $client.region} selected="selected"{/if}>{$region}</option>
                {/foreach}
            </select>
        </div>
        <div>
            <label for="client_city"></label>
            <select id="client_city" name="client[city]">
                {foreach from=$cities item="city"}
                    <option {if $city == $client.city} selected="selected"{/if}>{$city}</option>
                {/foreach}
            </select>
        </div>
        <div>
            <label for="client_office"></label>
            <select id="client_office" name="client[office]">
                {foreach from=$offices item="office"}
                    <option {if $office == $client.office} selected="selected"{/if}>{$office}</option>
                {/foreach}
            </select>
        </div>
        <div>
            <label for="client_need_shipment"></label>
            <input type="checkbox" id="client_need_shipment" name="client[need_shipment]" {if $client.need_shipment}checked="checked" {/if}>
        </div>
        <div>
            <label for="client_comment"></label>
            <textarea id="client_comment" name="client[comment]">{$client.comment }</textarea>
        </div>
        <div>
            <span class="graytext"></span>
        </div>
        <div>
            <input type="checkbox" id="client_notify" name="client[notify]" {if $client.notify}checked="checked" {/if}>
            <label for="client_notify"></label>
            <input id="client_email" name="client[email]" value="{$client.email}">
        </div>
    </div>
    <div id="order_make_bottom">
        <button>sd</button>
    </div>

</div>
