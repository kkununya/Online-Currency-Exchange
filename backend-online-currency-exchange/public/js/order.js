$('.loading').hide();
// Add auto amount of each banknote Type
for(k=0; k<orderData.length; k++){
    // var a = [];
    banknote = currencyData[orderData[k].currency_id-1].banknotes;
    var q = orderData[k].quantity;
    for(w=0; w<banknote.length; w++){
      if(q%banknote[w].type == 0){
        // a.push(Math.floor(q/banknote[w].type));
        $('#amount'+banknote[w].id).val(Math.floor(q/banknote[w].type));
        $('#total'+banknote[w].id).val(Math.floor(q/banknote[w].type*(banknote[w].type)));
        q = q - (Math.floor(q/banknote[w].type)*banknote[w].type)
      }
      else{
        // a.push(Math.floor(q/banknote[w].type));
        $('#amount'+banknote[w].id).val(Math.floor(q/banknote[w].type));
        $('#total'+banknote[w].id).val(Math.floor(q/banknote[w].type*(banknote[w].type)));
        q = q - (Math.floor(q/banknote[w].type)*banknote[w].type)
      }
    }
    $('#totalfr'+(k+1)).val(orderData[k].quantity);
  }

  var validate = []
  //   onchange input in banknote table
  for(i=1; i<=orderData.length; i++){
    document.getElementById(i).addEventListener('change',function(e)
    {
      e = e || window.event;
      var target = e.target || e.srcElement;
      var name = target.id || target.getAttribute('name');
      var total = [];
      amount = $('.amount'+this.id).serializeArray();
      for(j=0; j<amount.length; j++){
        $('#total'+amount[j].name).val(amount[j].value*banknoteData[amount[j].name-1].type)
        total.push(parseInt($('#total'+amount[j].name).val()));
      }
      var sum = total.reduce((a,b) => a + b, 0);
      // validateSum(sum, orderData[this.id-1].quantity, this.id)
      validate[parseInt(this.id)] = validateSum(sum, orderData[this.id-1].quantity, this.id);
      $('#totalfr'+this.id).val(sum.toLocaleString());
    },false);
  }

  function validateSum(sum, quantity, index){
    if(sum != quantity){
      $('#totalfr'+index).closest('.form-group').addClass('has-error');
      $('.help-block'+index).removeClass('hidden');
      isValid = false;     
    }else{
      $('#totalfr'+index).closest('.form-group').removeClass('has-error');
      $('.help-block'+index).addClass('hidden');
      isValid = true;
    }
    return isValid;
  }

  var banknoteOrder = [];

  $('#tranferButton').on('click', function(){
    if(validate.every(checkTrue) && $("#idCheckbox").is(':checked')){
      $("#tranferButton").attr("data-toggle", "modal")
      $("#tranferButton").attr("data-target", "#summary-modal")
      var inputArray = $('#bnForm').serializeArray();
      var totalArray = [];
      var amountArray = [];
      for (var i=1;i<inputArray.length;i++){
        if ((i+2)%2==0) {
          amountArray.push(inputArray[i]);
        }
        else {
          totalArray.push(inputArray[i]);
        }
      }
      $('#bankTable').empty();
      banknoteOrder = [];
      for(i=0; i<amountArray.length; i++){
        if(amountArray[i].value != 0){
          var cur_id = banknoteData[amountArray[i].name-1].currency_id;
          var label = currencyData[cur_id-1].label;
          console.log(cur_id, label);
          var banknote_id = amountArray[i].name;
          var type = banknoteData[banknote_id-1].type;
          var amount = amountArray[i].value
          var total = parseInt(type)*amountArray[i].value;
          banknoteOrder.push({'currency_id': cur_id, 'banknote_id': banknote_id, 'amount': amount});
          markup = '<tr><td class="text-center">'+ label +'</td> <td class="text-center">'+ type.toLocaleString() +'</td> <td class="text-center">'+ total.toLocaleString() +'</td> <td class="text-center">'+ amount +'</td></tr>'
          $('#bankTable').append(markup);
        }
      }
    }else{
      $("#tranferButton").attr("data-toggle", "modal")
      $("#tranferButton").attr("data-target", "#alert")
      $("#tranferButton").attr("data-extra", "กรุณาตรวจสอบหลักฐานการแสดงตัวของผู้มารับธนบัตร");
    }
  });

  function checkTrue(boo){
    return boo == true;
  }
  $('#submitButton').on('click', function(){
    $('.loading').show();
    var storebank = true;

    for(i=0; i<orderData.length; i++){
      for(j=0; j<banknoteOrder.length; j++){
        if(banknoteOrder[j].currency_id == orderData[i].currency_id){
          var bnData = [{'order_detail_id': orderData[i].id, 'banknote_id': banknoteOrder[j].banknote_id, 'amount': banknoteOrder[j].amount}];
          console.log(bnData);

          $.ajax({
            url: '/banknote',
            method: 'POST',
            contentType: 'application/json; charset=utf-8',
            data: JSON.stringify(bnData),
            async: true,
            success: function(response){
              storebank = true;
              console.log(response);
            },  
            error: function(response){
              storebank = false;
              console.log(response);
              $("#submitButton").attr("data-dismiss", "");
            }
          });
        }
      }
    }

    if(storebank){
      $.ajax({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: '/order/'+orderId,
        method: "PUT",
        data: {"field": "pick_up_date_time"},
        success: function(response){
          console.log(response);
        },
        error: function(response){
          console.log(response);
        }
      });

      $.ajax({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: '/order/'+orderId,
        method: "PUT",
        data: {"field": "user_id", "value": user_employee_id},
        success: function(response){
          console.log(response);
        },
        error: function(response){
          console.log(response);
        }
      });

      $.ajax({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: '/order/updateStatus/'+orderId,
        method: "PUT",
        data: {"status_id": 5},
        success: function(response){
          console.log(response);
          $('#tranferModalBody').empty();
          $('#cancelButton').hide();
          $('#submitButton').hide();
          
          $('#okButton').removeClass("hidden");
          $('#printing').removeClass("hidden");
          $("#submitButton").attr("data-dismiss", "modal");
          setTimeout(function(){
            location.reload();
            }, 5000);
        },
        error: function(response){
          console.log(response);
          $("#submitButton").attr("data-dismiss", "");
        }
      });
    }
  });

  $('#yesButton').on('click', function(){
    $.ajax({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      url: '/order/updateStatus/'+orderId,
      method: "PUT",
      data: {"status_id": 6},
      success: function(response){
        setTimeout(function(){
          location.reload();
          }, 5000);
      },
      error: function(response){
        console.log(response);
      }
    });
  });

  $('#alert').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget)
    var state = button.data('cancel')
    var recipient = button.data('extra') 
    var modal = $(this)
    modal.find('.extra').text(recipient)
    if(state == 'cencel'){

    }
  });