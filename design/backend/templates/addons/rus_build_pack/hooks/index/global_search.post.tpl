{* rus_build_pack dbazhenov *}

{if $runtime.controller != "rus_install" && $runtime.mode != "activate"	&& $runtime.controller != "index"}

	{if !fn_russian_pack_available()}
		<script type="text/javascript">
	        Tygh.$(document).ready(function(){
	            Tygh.$('#rus_activate').trigger('click');
	        });
	    </script>

        <a id="rus_activate" class="hidden cm-dialog-opener cm-ajax btn btn-primary" data-ca-target-id="rus_activate_form" title="{__("rus_connect.activate_title")}" href="{"rus_upgrade.activate"|fn_url}"></a>
	{/if}

{/if}