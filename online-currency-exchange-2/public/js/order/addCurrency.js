var curArray = [];
var total = 0;
var index;
var check = true;
$('#addCurrency').on('show.bs.modal', function (event) {
    $('#currency').prop("disabled", false);
    var button = $(event.relatedTarget)
    var recipient = button.data('value')
    index = recipient;

    // validate
    $('#foreignAmount').removeClass('is-invalid');      
    $('#foreignAmount-feedback').css('display', 'none');
    $('#currency').removeClass('is-invalid');      
    $('#currency-feedback').css('display', 'none');

    var modal = $(this)
      if(recipient == "add"){
        // Manage Button
        $('#update').hide();
        $('#delete').hide();
        $('#cancel').show();
        $('#add').show();
        // empty data in modal
        $('#currency').val(0);
        $('#rate').val("");
        $('#foreignAmount').val("");
        $('#thbAmount').val("");
        $('#selectedCurrency').text("");
        //change currency label
        $('#currency').change(function(){
           // validate
          $('#currency').removeClass('is-invalid');      
          $('#currency-feedback').css('display', 'none');

          // Rate Change 
          $('#rate').val(currencyData[parseInt($(this).val())-1].sale_rate);
          $('#selectedCurrency').text(currencyData[parseInt($(this).val())-1].label);
          $('#foreignAmount').val(undefined);
          $('#thbAmount').val(undefined);
          
          // Display Banknote
          var bn = currencyData[parseInt($(this).val())-1].banknotes;
          var i = 1;
          var text = bn[0].type;
          while(i < bn.length){
            text += ", "+bn[i].type.toString();
            i++;
          }
          $('#banknote_type').text(text);

          // Calculate thb amount
          $('#foreignAmount').change(function(){
              // validate
              $('#foreignAmount').removeClass('is-invalid');      
              $('#foreignAmount-feedback').css('display', 'none');
              $('#banknote_type').css('color', '#1b1e21');

              console.log("Mod:"+$(this).val().replace(/,/g, '')+'%'+bn[i-1].type+'==='+$(this).val().replace(/,/g, '')%bn[i-1].type);
              console.log(bn[i-1].id);
              if($(this).val().replace(/,/g, '')%bn[i-1].type == 0){
                var numFor = parseFloat($(this).val().replace(/,/g, ''));
                var thbAm = ($('#rate').val())*numFor;
                $('#thbAmount').val(thbAm.toLocaleString());
                var n = parseInt($(this).val().replace(/\D/g,''),10);
                $('#foreignAmount').val(n.toLocaleString());
                check = true;
              }else{
                // $('#foreignAmount').val(0);
                $('#thbAmount').val(0);
                $('#foreignAmount').addClass('is-invalid');      
                $('#foreignAmount-feedback').css('display', 'flex');
                $('#banknote_type').css('color', 'red');
                check = false;
              }

          });
        });
      }else{
        $('#update').show();
        $('#delete').show();
        $('#cancel').hide();
        $('#add').hide();
        $('#currency').prop("disabled", true);
        // fill data in modal
        $('#currency').val(curArray[recipient].currencyId);
        $('#rate').val(currencyData[curArray[recipient].currencyId-1].sale_rate);
        $('#foreignAmount').val(curArray[recipient].frAmount.toLocaleString());
        $('#thbAmount').val(curArray[recipient].thbAmount.toLocaleString());
        $('#selectedCurrency').text(currencyData[curArray[recipient].currencyId-1].label);
      }
  })

$('#add').click(function(){
    if($('#currency').val() == '0'){
      $('#currency').addClass('is-invalid');      
      $('#currency-feedback').css('display', 'flex');
    }
    if($('#foreignAmount').val() == '' || $('#foreignAmount').val() == "NaN" || check == false){
      $('#foreignAmount').val('');
      $('#thbAmount').val('');
      $('#add').attr('data-dismiss', '');
      $('#foreignAmount').addClass('is-invalid');      
      $('#foreignAmount-feedback').css('display', 'flex');
    }
    else{
      $('#add').attr('data-dismiss', 'modal');
      curArray.push({ currencyId: parseInt($('#currency').val()), frAmount: parseFloat($('#foreignAmount').val().replace(/,/g, '')), thbAmount: parseFloat($('#thbAmount').val().replace(/,/g, ''))});
      showCurrency();
      $('#foreignAmount').removeClass('is-invalid');      
      $('#foreignAmount-feedback').css('display', 'none');
      $('#currency').removeClass('is-invalid');      
      $('#currency-feedback').css('display', 'none');
    }
});

$('#update').click(function(){
  if($('#foreignAmount').val() == ''|| $('#foreignAmount').val() == "NaN"){
    $('#foreignAmount').val('');
    $('#thbAmount').val('');
    $('#update').attr('data-dismiss', '');
    $('#foreignAmount').addClass('is-invalid');      
    $('#foreignAmount-feedback').css('display', 'flex');
  }else{
    $('#update').attr('data-dismiss', 'modal');
    $('#foreignAmount').removeClass('is-invalid');      
    $('#foreignAmount-feedback').css('display', 'none');
    curArray[index].frAmount = parseFloat($('#foreignAmount').val().replace(/,/g, ''));
    curArray[index].thbAmount = parseFloat($('#thbAmount').val().replace(/,/g, ''));
    showCurrency();
  }
});

$('#delete').click(function(){
  curArray.splice(index, 1);
  showCurrency();
  if(curArray.length == 0){
    $('#currencyList').val("");
  }
});

function totalPrice(){
  total = 0;
  for(i = 0; i< curArray.length; i++){
    total += curArray[i].thbAmount;
    if(total >= 100000){
      total -= curArray[i].thbAmount;
      curArray.pop();
      $('#exTotal').css('color', 'red');
      console.log(curArray);
      console.log("out of 100,000 THB");
    }else{
      $('#exTotal').css('color', '#1b1e21');
    }
  }
  $('#totalPrice').text(total.toLocaleString());
}

function showCurrency(){
  totalPrice();
  $('#currencyTable').empty();
  for(var i=0; i<curArray.length; i++){
    var markup = '<tr data-toggle="modal" data-target="#addCurrency" data-value='+ i +'><td>'+currencyData[curArray[i].currencyId-1].label+'</td><td class="text-center">'+currencyData[curArray[i].currencyId-1].sale_rate+'</td><td class="text-right">'+(curArray[i].frAmount).toLocaleString()+'</td><td class="text-right"><button class="btn-link"><span class="oi oi-pencil text-dark"></span></button></td></tr>'    
    $('#currencyTable').append(markup);    
  }
  $('#currencyList').val(JSON.stringify(curArray));
  $('#currencyList').valid();    
}

function validate(value){
  if(value == ''){
    return false;
  }else{
    return true;
  }
}

$('tr').click(function(){
  $(this).attr('data-toggle', 'modal');
});





