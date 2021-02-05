  <script type="text/javascript">
    
    $(document).ready(function () {
//Dependency dropdown Brand name
$('#for_editBrand').on('change', function () {
  let id = $(this).val();
  console.log(id);
  $('#Brand_editdropdown').empty();
  $('#Brand_editdropdown').append(`<option value="0" disabled selected>Processing...</option>`);
  $.get('/brfindByCatagoryIdAjax/'+id, function(brand) {

    $('#Brand_editdropdown').empty();
    $('#Brand_editdropdown').append(`<option value="0" disabled selected>Chose Brand Name...</option>`);
          brand.forEach(element => {   //loop to show all brand
            console.log("id " + element['brName']);
            $('#Brand_editdropdown').append(`<option value="${element['brId']}">${element['brName']}</option>`);
          });
        });
      });
//Dependency dropdown Brand name
});

</script>