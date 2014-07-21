<div id="products_section">
    <select></select> <select></select>

    <div id="product_sorting">
        Sort by name <select>
            <option>asc</option>
            <option>desc</option>
        </select>

        price <select>
            <option>asc</option>
            <option>desc</option>
        </select>
        profit <select>
            <option>asc</option>
            <option>desc</option>
        </select>
        Location <select>
            <option>Current city</option>
            <option>Other city1</option>
            <option>Other city2</option>
        </select>
    </div>
    <form>
    {foreach from=$products item="product"}
    <div class="product_div">
        <table>
            <tr>
                <td> <img src="{$product.image}"></td>
                <td colspan="2"><h2><a href="{"products.view"|fn_url}&product_id={$product.product_id}">{$product.product}</a></h2></td>
                <td><div><a href="#">+</a><a href="#">-</a></div><span>{$product.price|floatval}$</span><div><button type="submit" name="dispatch[checkout.add..{$product.product_id}]" value="Оформить заявку">Оформить заявку</button></div><div>{if $product.shipping}<img src="shipping.png">{/if}</div></td>
            </tr>
            <tr>
                <td>{if $product.company.logo}<img src="{$product.company.logo}">{/if}</td>
                <td colspan="2"><div>{$product.full_description|unescape}</div></td>
                <td><span>{$product.profit}</span><br><button>Сохранить в кабинете</button></td>
            </tr>
        </table>
</div>
{/foreach}
    </form>