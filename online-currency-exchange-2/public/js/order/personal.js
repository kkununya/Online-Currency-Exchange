$.Thailand({ 
    database: '/js/jquery.Thailand.js-master/jquery.Thailand.js/database/db.json', // path หรือ url ไปยัง database
    $district: $('#district'), // input ของตำบล
    $amphoe: $('#amphoe'), // input ของอำเภอ
    $province: $('#province'), // input ของจังหวัด
    $zipcode: $('#zipcode'), // input ของรหัสไปรษณีย์
});

var receiver_data = [];
    $('#recieverSaveButton').click(function() {
      
      if($('#receiverForm').valid()){
        $('#recieverSaveButton').attr('data-dismiss', 'modal');
        $('#receiver').val($('#re_title_name').val() +" "+ $('#re_first_name').val() +" "+ $('#re_last_name').val());    
        receiver_data = [];
        receiver_data.push({
          title_name: $('#re_title_name').val(),
          nation: $('#re_nation').val(),
          firstName: $('#re_first_name').val(),
          lastName: $('#re_last_name').val(),
          idType: $('#re_id_type').val(),
          cardId: $('#re_card_id').val(),
          tel: $('#re_tel').val()
        });
        $('#receiver').valid();
      }else{
        $('#recieverSaveButton').attr('data-dismiss', '');
      }
    });

$('#by_self').click(function(){
    $('#receiver').val($('#title_name').val() +" "+ $('#first_name').val() +" "+ $('#last_name').val());
    receiver_data = [];
    receiver_data.push({
        title_name: $('#title_name').val(),
        nation: $('#nation').val(),
        firstName: $('#first_name').val(),
        lastName: $('#last_name').val(),
        idType: $('#id_type').val(),
        cardId: $('#card_id').val(),
        tel: $('#tel').val()
    });
    $('#receiver').valid();
});

