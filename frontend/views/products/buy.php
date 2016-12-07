<div class="container">
    <div class="jumbotron">
        <h1>Stacked-to-horizontal</h1>
        <p> The best solution to your problems</p>
        <p>
            <h1>Price: $9.95</h1>
        </p>
        <p>
            <form id="myForm" action="https://www.sandbox.paypal.com/cgi-bin/websc" method="post">
                <input type="hidden" name="cmd" value="_xclick">
                <input type="hidden" name="business" value="facilitator@example.com">
                <input id="paypalItemName" type="hidden" name="item_name" value="Stacked-to-horizontal">
                <input id="paypalQuantity" type="hidden" name="quantity" value="1">
                <input id="paypalAmmount" type="hidden" name="amount" value="9.95">
                <input type="hidden" name="no_shipping" value="1">
                <input type="hidden" name="notify_url" value="http://ipn.example.com/usage.php">
                <input type="hidden" name="custom" value="<?= $secret ?>">
                <input type="hidden" name="currency_code" value="USD">
                <input type="hidden" name="lc" value="U">
                <input type="hidden" name="bn" value="PP-BuyNowBF">
                <button class="btn btn-lg btn-info" type="submit">
                    Buy Now
                </button>
            </form>
        </p>
    </div>
</div>