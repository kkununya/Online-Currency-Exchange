$(document).ready(function(){
  var exchangeForm = $('#exchangeForm');
  var personalForm = $('#personalForm');
  var receiverForm = $('#receiverForm');
  var creditForm = $('#creditForm');

  creditForm.validate({
    rules: {
      credit_card_name:{
        required: true,
      },
      credit_card_no: {
        required: true,
      },
      credit_card_type: {
        required: true,
      },
      expireMonth: {
        required: true,
      },
      expireYear: {
        required: true,
      },
      cvv: {
        required: true,
      }
    },
    messages: {
      credit_card_name: "กรุณาระบุชื่อบนบัตร",
      credit_card_no: "กรุณาระบุหมายเลขบัตร",
      credit_card_type:"กรุณาระบุประเภทบัตร",
      expireMonth: "กรุณาระบุ",
      expireYear: "กรุณาระบุr",
      cvv: "กรุณาระบุ"
    },
    errorPlacement: function(error, element){
      element.addClass('is-invalid');
      error.insertAfter(element);
    },
    success: function(label, element){
      label.remove();
      $(element).removeClass('is-invalid');
    }
  });

  exchangeForm.validate({
    ignore: 'hidden:not(.currencyList)',
    rules: {
      currencyList: {
        required: true,
      },
      purpose: {
        required: true
      },
      branch: {
        required: true
      },
      selectedDate: {
        required: true
      }
    },
    messages: {
      currencyList: "กรุณาระบุจำนวนเงิน",
      purpose: "กรุณาเลือกวัตถุประสงค์",
      branch: "กรุณาเลือกสาขาส่งมอบ",
      selectedDate: "กรุณาเลือกวันส่งมอบ"
    },
    submitHandler: function(form){
      alert('valid form');
      return false;
    },
    errorPlacement: function(error, element){
      if(element.attr("name") == "selectedDate"){
        element.addClass('is-invalid');
        error.insertAfter(".dateError");
      }
      else if(element.attr("name") == "currencyList"){
        error.insertAfter(".currencyError");        
      }
      else{
        element.addClass('is-invalid');
        error.insertAfter(element);
      }
    },
    success: function(label, element){
      label.remove();
      $(element).removeClass('is-invalid');
    }
  });

  personalForm.validate({
    rules: {
      title_name: {
        required: true
      },
      nation: {
        required: true
      },
      first_name: {
        required: true,
        maxlength: 20
      },
      last_name: {
        required: true,
        maxlength: 20
      },
      id_type: {
        required: true
      },
      card_id: {
        required: true,
        number: "กรุณาใส่เฉพาะตัวเลข",
        maxlength: 13
      },
      tel: {
        required: true,
        number: "กรุณาใส่เฉพาะตัวเลข",
        maxlength: 10
      },
      email: {
        required: true,
        maxlength: 30
      },
      address: {
        required: true,
        maxlength: 100
      },
      district: {
        required: true,
        maxlength: 20
      },
      amphoe: {
        required: true,
        maxlength: 20
      },
      province: {
        required: true,
        maxlength: 20
      },
      zipcode: {
        required: true,
        maxlength: 5
      },
      receiver: {
        required: true
      }
    },
    messages: {
      title_name: { 
        required: "This field is required"
      },
      nation: { 
        required: "This field is required"
      },
      first_name: { 
        required: "This field is required",
        maxlength: "Please enter no more than 20  characters"
      },
      last_name: { 
        required: "This field is required",
        maxlength: "Please enter no more than 20 characters"
      },
      id_type: { 
        required: "This field is required"
      },
      card_id: { 
        required: "This field is required",
        maxlength: "Please enter no more than 13 characters"
      },
      tel: { 
        required: "This field is required",
        maxlength: "Please enter no more than 10  characters"
      },
      email: { 
        required: "This field is required",
        maxlength: "Please enter no more than 30 characters"
      },
      address: { 
        required: "This field is required",
        maxlength: "Please enter no more than 100 characters"
      },
      district: { 
        required: "This field is required",
        maxlength: "Please enter no more than 20 characters"
      },
      amphoe: { 
        required: "This field is required",
        maxlength: "Please enter no more than 20 characters"
      },
      province: { 
        required: "This field is required",
        maxlength: "Please enter no more than 20 characters"
      },
      zipcode: { 
        required: "This field is required",
        maxlength: "Please enter no more than 5 characters"
      },
      receiver: "กรุณาระบุชืื่อผู้รับมอบธนบัตร"
    },
    errorPlacement: function(error, element){
      element.addClass('is-invalid');
      error.insertAfter(element);
    },
    success: function(label, element){
      label.remove();
      $(element).removeClass('is-invalid');
    }
  });

  receiverForm.validate({
    rules: {
      re_title_name: {
        required: true
      },
      re_nation: {
        required: true
      },
      re_first_name: {
        required: true,
        maxlength: 20
      },
      re_last_name: {
        required: true,
        maxlength: 20
      },
      re_id_type: {
        required: true
      },
      re_card_id: {
        required: true,
        maxlength: 13
      },
      re_tel: {
        required: true,
        maxlength: 10
      }
    },
    messages: {
      re_title_name: { 
        required: "This field is required"
      },
      re_nation: { 
        required: "This field is required"
      },
      re_first_name: { 
        required: "This field is required",
        maxlength: "Please enter no more than 20 characters"
      },
      re_last_name: { 
        required: "This field is required",
        maxlength: "Please enter no more than 20 characters"
      },
      re_id_type: { 
        required: "This field is required"
      },
      re_card_id: { 
        required: "This field is required",
        maxlength: "Please enter no more than 13 characters"
      },
      re_tel: { 
        required: "This field is required",
        maxlength: "Please enter no more than 10 characters"
      }
    },
    errorPlacement: function(error, element){
      element.addClass('is-invalid');
      error.insertAfter(element);
    },
    success: function(label, element){
      label.remove();
      $(element).removeClass('is-invalid');
    }
  });


});


