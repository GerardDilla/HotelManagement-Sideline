<!-- breadcrumbs -->
<div class="services-top-breadcrumbs">
	<div class="container">
		<div class="services-top-breadcrumbs-right">
			<ul>
				<li><a href="<?php echo site_url()?>">Home</a> <i>/</i></li>
				<li><?php echo lang('payment_from_stripe')?></li>
			</ul>
		</div>
		<div class="clearfix"> </div>
	</div>
</div>
<!-- //breadcrumbs -->
<!-- Paypal API -->
<link rel="stylesheet" type="text/css" href="https://www.paypalobjects.com/webstatic/en_US/developer/docs/css/cardfields.css"/>
<script src="https://www.paypal.com/sdk/js?components=buttons,hosted-fields&client-id=AUYeKzZondVvpJj5JAloby7tD7NDH1s3olZzj_pArLsJzkvzp2TzlY5UcoMYFxEw6daWYD5gKBJImwkJ" data-client-token="<?php echo $client_token; ?>"></script>

<div class="testimonials">
    <div class="container">
        <div class="row">
			<h3 class = "contentdesc"><span><?php echo lang('payment_from_stripe')?></span></h3>
            <div class="panel panel-primary margin-40-y" >
    			<div class="panel-body">

					<table border="0" align="center" valign="top" bgcolor="#FFFFFF" style="width: 39%">
						<tr>
						<td colspan="2">
							<div id="paypal-button-container"></div>
						</td>
						</tr>
						<tr><td colspan="2">&nbsp;</td></tr>
					</table>

					<div align="center"> or </div>

					<!-- Advanced credit and debit card payments form -->
					<div class="card_container">
						<form id="card-form">

						<label for="card-number">Card Number</label><div id="card-number" class="card_field"></div>
						<div>
							<label for="expiration-date">Expiration Date</label>
							<div id="expiration-date" class="card_field"></div>
						</div>
						<div>
							<label for="cvv">CVV</label><div id="cvv" class="card_field"></div>
						</div>
						<label for="card-holder-name">Name on Card</label>
						<input type="text" id="card-holder-name" name="card-holder-name" autocomplete="off" placeholder="card holder name"/>
						<div>
							<label for="card-billing-address-street">Billing Address</label>
							<input type="text" id="card-billing-address-street" name="card-billing-address-street" autocomplete="off" placeholder="street address"/>
						</div>
						<div>
							<label for="card-billing-address-unit">&nbsp;</label>
							<input type="text" id="card-billing-address-unit" name="card-billing-address-unit" autocomplete="off" placeholder="unit"/>
						</div>
						<div>
							<input type="text" id="card-billing-address-city" name="card-billing-address-city" autocomplete="off" placeholder="city"/>
						</div>
						<div>
							<input type="text" id="card-billing-address-state" name="card-billing-address-state" autocomplete="off" placeholder="state"/>
						</div>
						<div>
							<input type="text" id="card-billing-address-zip" name="card-billing-address-zip" autocomplete="off" placeholder="zip / postal code"/>
						</div>
						<div>
							<input type="text" id="card-billing-address-country" name="card-billing-address-country" autocomplete="off" placeholder="country code" />
						</div>
						<br><br>
						<button value="submit" id="submit" class="btn">Pay</button>
						</form>
					</div>



                    <!-- <form action="<?php echo site_url('front/book/stripe')?>" method="POST">	
						<script
						src="https://checkout.stripe.com/checkout.js" class="stripe-button"
						data-key="<?php echo $this->setting->stripe_key?>"
						data-image="<?php echo base_url().'assets/admin/uploads/images/'.$this->setting->logo?>"
						data-name="<?php echo $this->setting->name?>"
						data-description="<?php echo $booking_data['room_type']?>"
						data-amount="<?php echo rate_exchange($booking_data['advance_amount'])*100?>"
						data-currency="<?php echo $booking_data['currency']?>">
					  </script>
					</form>	 -->

                </div>
            </div>
        </div>
    </div>
</div>            
<script>
// $(document).ready(function() {
//   	//call_loader();
// 	setTimeout(function(){ 
// 		//$('form').submit();
// 	}, 3000);
// });
</script>

<!-- Implementation -->
<script>
     let orderId;

     // Displays PayPal buttons
     paypal.Buttons({
       style: {
         layout: 'horizontal'
       },
        createOrder: function(data, actions) {
           return actions.order.create({
             purchase_units: [{
               amount: {
                 value: "1.00"
               }
             }]
           });
         },
         onApprove: function(data, actions) {
           return actions.order.capture().then(function(details) {
             window.location.href = '/success.html';
           });
         }
     }).render("#paypal-button-container");

     // If this returns false or the card fields aren't visible, see Step #1.
	 alert(paypal.HostedFields.isEligible());
     if (paypal.HostedFields.isEligible()) {

       // Renders card fields
       paypal.HostedFields.render({
         // Call your server to set up the transaction
         createOrder: function () {
           return fetch('./paypalorder/10/<?php echo $client_token; ?>', {
            method: 'post'
          }).then(function(res) {
              return res.json();
          }).then(function(orderData) {
            orderId = orderData.id;
			console.log('orderid: '+orderId);
            return orderId;
          });
         },

         styles: {
           '.valid': {
            'color': 'green'
           },
           '.invalid': {
            'color': 'red'
           }
         },

         fields: {
           number: {
             selector: "#card-number",
             placeholder: "4111 1111 1111 1111"
           },
           cvv: {
             selector: "#cvv",
             placeholder: "123"
           },
           expirationDate: {
             selector: "#expiration-date",
             placeholder: "MM/YY"
           }
         }
       }).then(function (cardFields) {
         document.querySelector("#card-form").addEventListener('submit', (event) => {
           event.preventDefault();

           cardFields.submit({
             // Cardholder's first and last name
             cardholderName: document.getElementById('card-holder-name').value,
             // Billing Address
             billingAddress: {
               // Street address, line 1
               streetAddress: document.getElementById('card-billing-address-street').value,
               // Street address, line 2 (Ex: Unit, Apartment, etc.)
               extendedAddress: document.getElementById('card-billing-address-unit').value,
               // State
               region: document.getElementById('card-billing-address-state').value,
               // City
               locality: document.getElementById('card-billing-address-city').value,
               // Postal Code
               postalCode: document.getElementById('card-billing-address-zip').value,
               // Country Code
               countryCodeAlpha2: document.getElementById('card-billing-address-country').value
             }
           }).then(function () {
             // Payment was successful! Show a notification or redirect to another page.
            window.location.replace('./paypalcard_success');
          }).catch(function (err) {
            alert('Payment could not be captured! ' + JSON.stringify(err))
          });
         });
       });
     } else {
       // Hides card fields if the merchant isn't eligible
       document.querySelector("#card-form").style = 'display: none';
     }
   </script>