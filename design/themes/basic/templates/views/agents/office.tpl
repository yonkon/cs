<style type="text/css">
    {literal}
    #left_agent_menu {
        float: left;
        width: 25%;;
    }

    #agents_content {
        float: left;
        width: 75%;
    }

    .product_div {
        margin: 5px;
        width: 90%;
    }

    .product_div table, .product_div table td {
        border: 2px ridge darkslategray;
    }

    .product_sorting {
        display: inline-block;
    }

    .order_div {
        width:70%;
        height:70%;
        margin: 5% auto;
    }

    .order_div_top {
        height: 50px
    }
    .order_div_top, .order_div_content {
        width: 100%
    }

    .close {
        top: 5px;
        right: 5px;
    }
    {/literal}
</style>


<div id="left_agent_menu">
    <div class="left_agent_menu_section">
        <div class="left_agent_menu_logo"> {$user_data.logo}</div>
    </div>
    <div class="left_agent_menu_section">
        <div class="left_agent_menu_profile">
            <img src={if $user_data.avatar} "{$user_data.avatar}" {else}"noavatar.gif"{/if} class="avatar-small">
            <a href="{"agents.profile"|fn_url}" rel="nofollow" class="underlined h2 level-0">{__("agents_profile")}</a>
        </div>
    </div>
    <div class="left_agent_menu_section">
        <ul>
            <li> <a href="{"agents.office"|fn_url}" rel="nofollow" class="underlined h2 level-0">{__("agents_office")}</a></li>
            <li> <a href="{"agents.companies_and_products"|fn_url}" rel="nofollow" class="underlined h3 level-1">{__("agents_companies_and_products")}</a></li>
            <li> <a href="{"agents.orders"|fn_url}" rel="nofollow" class="underlined h3 level-1">{__("orders")}</a></li>
            <li> <a href="{"agents.orders_active"|fn_url}" rel="nofollow" class="underlined h3 level-2">{__("orders_active")}</a></li>
            <li> <a href="{"agents.orders_closed"|fn_url}" rel="nofollow" class="underlined h3 level-2">{__("orders_closed")}</a></li>
            <li> <a href="{"agents.orders_saved"|fn_url}" rel="nofollow" class="underlined h3 level-2">{__("orders_saved")}</a></li>
        </ul>
    </div>
    <div class="left_agent_menu_section">
        <ul>
            <li> <a href="{"agents.collegues"|fn_url}" rel="nofollow" class="underlined h2 level-0">{__("agents_collegues")}</a></li>
        </ul>
    </div>
    <div class="left_agent_menu_section">
        <ul>
            <li> <a href="{"agents.clients"|fn_url}" rel="nofollow" class="underlined h2 level-0">{__("agents_clients")}</a></li>
        </ul>
    </div>
    <div class="left_agent_menu_section">
        <ul>
            <li> <a href="{"agents.notifications"|fn_url}" rel="nofollow" class="underlined h2 level-0">{__("agents_notifications")}</a></li>
        </ul>
    </div>
</div>

<div id="agents_content">
    {$agents_content}
    {if $mode == 'products'}{include file="views/agents/components/products.tpl"}{/if}
</div>

