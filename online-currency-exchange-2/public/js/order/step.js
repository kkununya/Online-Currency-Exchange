  var navListItems = $('div.setup-panel div a'),
    allWells = $('.setup-content'),
    allNextBtn = $('.nextBtn'),
    allPrevBtn = $('.prevBtn');

  allWells.hide();

  navListItems.click(function (e) {
      e.preventDefault();
      var $target = $($(this).attr('href')),
          $item = $(this);

      if (!$item.hasClass('disabled')) {
          navListItems.find('button').removeClass('btn-warning').addClass('btn-secondary');
          $item.find('button').addClass('btn-warning');
          allWells.hide();
          $target.show();
          $target.find('input:eq(0)').focus();
      }
  });

  allPrevBtn.click(function(){
      var curStep = $(this).closest(".setup-content"),
          curStepBtn = curStep.attr("id"),
          prevStepSteps = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().prev().children("a");

          prevStepSteps.removeAttr('disabled').trigger('click');
  });

  $('#editButton').on('click', function(){
    $('#backBut').click();
  });

  $('#nextButton').click(function(){
      var curStep = $(this).closest(".setup-content"),
      curStepBtn = curStep.attr("id"),
      nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
      curInputs = curStep.find("input[type='text'],input[type='url'], select"),
      isValid = true;
      $(".form-group").removeClass("is-invalid");

      if ($('#exchangeForm').valid()){
          nextStepWizard.removeAttr('disabled').trigger('click');
        }
  });

  $('#nextToPayment').click(function(){
      var curStep = $(this).closest(".setup-content"),
      curStepBtn = curStep.attr("id"),
      nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
      curInputs = curStep.find("input[type='text'],input[type='url'], select"),
      isValid = true;

      $(".form-group").removeClass("is-invalid");

      $('#distrcit').on('change', function(){
        $('#distrcit').valid();
      });
      $('#amphoe').on('change', function(){
        $('#amphoe').valid();
      });
      $('#province').on('change', function(){
        $('#province').valid();
      });
      $('#zipcode').on('change', function(){
        $('#zipcode').valid();
      });

      if ($('#personalForm').valid()){
        nextStepWizard.removeAttr('disabled').trigger('click');
        addDataToList()
      }
  });
    
  $('div.setup-panel div a.btn-warning').trigger('click');
