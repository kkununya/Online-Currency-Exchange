// Prepare Data for send to controller via Ajax
var orderData = [];
var customerData = [];

// Next from personal to Payment Step show information that customer fill and add to orderData .
function addDataToList(){
    orderData = [];
    customerData = [];
    customerData.push({
        title_name: $('#title_name').val(),
        nation: $('#nation').val(),
        firstName: $('#first_name').val(),
        lastName: $('#last_name').val(),
        idType: $('#id_type').val(),
        cardId: $('#card_id').val(),
        tel: $('#tel').val(),
        email: $('#email').val(),
        address: $('#address').val(),
        district: $('#district').val(),
        amphoe: $('#amphoe').val(),
        province: $('#province').val(),
        zipcode: $('#zipcode').val()
    });
    orderData.push({
        cart: curArray, 
        purpose: $('#purpose').val(), 
        selectedBranch: $('#branch').val(),
        selectedDate: $('#selectedDate').val(),    
        customer: customerData,
        receiver: receiver_data,
        totalPrice: total
    });

    $('#customerName').text(orderData[0].customer[0].firstName+" "+orderData[0].customer[0].lastName);
    $('#customerId').text(orderData[0].customer[0].cardId);
    $('#customerTel').text(orderData[0].customer[0].tel);
    $('#customerEmail').text(orderData[0].customer[0].email);
    // $('#customerAddress').text(orderData[0].customer[0].address+" เขต"+orderData[0].customer[0].district+" แขวง"+orderData[0].customer[0].amphoe+" "+orderData[0].customer[0].province+" "+orderData[0].customer[0].zipcode)
    $('#selectBranch').text((search(parseInt(orderData[0].selectedBranch), branchData)).name);
    $('#selectDate').text(orderData[0].selectedDate);
    $('#receiverName').text(orderData[0].receiver[0].firstName +" "+orderData[0].receiver[0].lastName);
    $('#receiverId').text(orderData[0].receiver[0].cardId);
    $('#total').text(total);

    $('#cartTable').empty();
    for(i=0; i<orderData[0].cart.length; i++){
        markup = '<tr><td>'+currencyData[parseInt(orderData[0].cart[i].currencyId)-1].label+'</td><td>'+currencyData[parseInt(orderData[0].cart[i].currencyId)-1].sale_rate+'</td><td class="text-right">'+orderData[0].cart[i].frAmount+'</td></tr>'
        $('#cartTable').append(markup)
    }
  } 

// term and condition accept
$('#accept').click(function(){
    $('#termcondition').prop('checked', true);
});
$('#refuse').click(function(){
    $('#termcondition').prop('checked', false);
});

// Direct Debit Modal Button
$('#directButton').click(function(){
    if($("#termcondition").is(':checked')){
        $("#directButton").attr("data-toggle", "modal")
        $("#directButton").attr("data-target", "#direct-debit")   
    }else{
      $("#directButton").attr("data-toggle", "modal")
      $("#directButton").attr("data-target", "#alert")      
    }
});

// Credit Modal Button
$('#creditButton').click(function(){
    if($("#termcondition").is(':checked')){
        $("#creditButton").attr("data-toggle", "modal")
        $("#creditButton").attr("data-target", "#credit-modal") 
        $("#creditSubmit").text("ชำระเงิน "+ orderData[0].totalPrice +" บาท");
    }else{
      $("#creditButton").attr("data-toggle", "modal")
      $("#creditButton").attr("data-target", "#alert") 
    }
});

// RTP modal button
$('#rtpButton').click(function(){
    if($("#termcondition").is(':checked')){
        $("#rtpButton").attr("data-toggle", "modal")
        $("#rtpButton").attr("data-target", "#rtp-modal") 
    }else{
      $("#rtpButton").attr("data-toggle", "modal")
      $("#rtpButton").attr("data-target", "#alert")
    }
});

// Search data in array function
function search(nameKey, myArray){
    for (var i=0; i < myArray.length; i++) {
        if (myArray[i].id === nameKey) {
            return myArray[i];
        }
    }
}
var resultObject = search(1111, branchData);

// Credit
$('#creditSubmit').click(function(){
    if($('#creditForm').valid()){
        $('#creditSubmit').attr("data-dismiss", "modal");
        var status = '';
        
        orderData.push({payment: 'credit'})

        // Credit API

        status = 'success';

        if(status == 'success'){
        $.ajax({
            url: '/order',
            method: 'POST',
            contentType: 'application/json; charset=utf-8',
            data: JSON.stringify(orderData),
            async: true,
            beforeSend: function() {
                $('.loading').show();
            },
            complete: function(){
                $('.loading').hide();
            },
            success: function(response){
            $('#bill').append(response);
            navListItems.find('button').removeClass('btn-warning').addClass('btn-secondary')
            $(navListItems.find('button')[3]).addClass('btn-warning')
            $('#step-3').css('display', 'none');
            $('#step-4').css('display', 'flex');
            },
            error: function(response){
            console.log(response);
            }
        });
      }
    }else{
      $('#creditSubmit').attr("data-dismiss", "");
    }
});

$('#rtpSubmit').click(function(){
    if($("#termRtp").is(':checked')){
      $('#rtpSubmit').attr("data-dismiss", "modal");
      orderData.push({payment: 'rtp'})
      $.ajax({
          url: '/order',
          method: 'POST',
          contentType: 'application/json; charset=utf-8',
          data: JSON.stringify(orderData),
          async: true,
          beforeSend: function() {
              $('.loading').show();
          },
          complete: function(){
              $('.loading').hide();
          },
          success: function(response){
            $('#bill').append(response);
            $('#step-3').css('display', 'none');
            $('#step-4').css('display', 'flex');
          },
          error: function(response){
            console.log(response);
          }
      });
    }else{
      $('#rtpSubmit').attr("data-dismiss", "");
      $('.error-rtp').css("display", "flex");
    }
});


