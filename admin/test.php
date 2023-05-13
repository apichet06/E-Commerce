

<table class="table table-striped">
	<thead>
		<tr>
			<th>header</th>
			<th>header</th>
			<th>prush</th>
			<th>count</th>
		</tr>
	</thead>
	<tbody>
		<?php $sql = mysqli_query($conn,"SELECT *,pd_price FROM PRODUCT_DB ORDER BY PD_ID LIMIT 3");
		$i = 1;
		while ($rs = mysqli_fetch_assoc($sql)) { $price = $rs['pd_price'] ?>
		<tr>
			<td>
				<input class="form-control" 
				oninput="calculate(<?=$price;?>,<?=$i?>, this)" 
				type="text" name="quantity" placeholder="<?=$price;?>" >
			</td>
			<td><strong id="<?=$i?>"></strong></td>	
			<td>
				<div class="btn-group">
					<button type="button" class="btn btn-default btn-sm" id="minus">-</button>
					<input type="type" name="count" class="form-control form-control-sm qty" style="width: 50px;" value="1" id="qty" >
					<button type="button" class="btn btn-default btn-sm" id="plus">+</button>
				</div>
			</td>
			<td><strong class="count<?=$i?>">2</strong></td>
			<?php $i++; } ?>
		</tr>
	</tbody>
</table>		
<script type="text/javascript">

$( document ).ready(function() {    

	$(document).on("input paste keyup", ".product_qty", function( event ) {         

		var product_quantity = 0;
		var product_price = 0;
		var gst_amount = 0;

		var sub_total = 0;
		var total_qty = 0; 
		var grand_total = 0

		product_quantity = $(this).val();
		product_price = $(this).parent().prev().html();
       // var product_price = $(this).parents('.product_price');
       
		//console.log(product_price);  
		sub_total = product_price * product_quantity;

		$(this).parent().next().html(sub_total);


        // $('.product_qty' ).each( function( k, v ) {
        //     product_quantity = parseInt ( $(this).val() ) ? parseInt ( $(this).val() ) : 0;
        //     product_price = parseFloat($(this).parent().prev().html())?parseFloat($(this).parent().prev().html()):0;
        //     console.log(product_quantity)
        //     //console.log(product_quantity);
        //    // console.log(product_price);            

        //     sub_total = parseFloat ( product_price * product_quantity );

        //     //console.log(sub_total);

        //    total_qty +=product_quantity;

        //    grand_total += sub_total;

        // });

       // if ( grand_total > 0 ){
       //    gst_amount = ( grand_total * 6 ) /100;
       // }

       $("#total_qty").html(total_qty);        
       $("#total_amount").html(grand_total);        

      // grand_total +=gst_amount;

        //$("#gst_amount").html(gst_amount);             
        $("#grand_total").html(grand_total);  

    });


});
// End Document Ready




$(document).ready(function() {
	$(".qty").each(function(a, b ) {
		console.log(a);
	});
});


var minusButton = document.getElementById('minus');
var plusButton  = document.getElementById('plus');
var inputField = document.getElementById('qty').value;
		       // console.log(inputField);
		       function calculate(price,count_id, input) {
		       	console.log(price);
		       	console.log(input.id);
		       	var quantity = input.value;
		       	var result = input.nextElementSibling;
		       	var myResult = price * quantity;
		       	$("#"+count_id).html(myResult);

		       }
		       

		   </script>