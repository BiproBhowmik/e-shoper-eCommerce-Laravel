  <script type="text/javascript">
    {{-- Ajax Brand Insert --}}
    $("#addBrandForm").submit(function(event) {
      event.preventDefault();

      let catId = $("#catId").val();
      let brName = $("#brName").val();
        // let catName = $("#catName").val();
        let _token = $("input[name=_token]").val();
        
        // console.log(catId);
        // console.log(brName);

        $.ajax({
          url: "{{ route('addBrandAjax') }}",
          type: "POST",
          data:{
            catId:catId,
            brName:brName,
            _token:_token
          },
          success:function(response)
          {
            if (response) {

              $.get('/catfindByIdAjax/'+catId, function(category) {
                $("#brTable tbody").prepend('<tr><td>'+"New"+'</td><td>'+category.catName+'</td><td>'+response.brName+'</td><td>'+"Added"+'</td></tr>');
                $("#addBrandForm")[0].reset();
              });

            }
          }
        });
      });
    {{-- Ajax Brand Insert --}}

    {{-- Ajax Brand Delete --}}
    $(".brDelete").click(function(){

      $confirm = confirm("Delete Brand!");

      if ($confirm) {
        var brId = $(this).data("id");
        var token = $("meta[name='csrf-token']").attr("content");

    // console.log(token);
    
    $.ajax(
    {
      url: "brDeleteAjax/"+brId,
      {{-- url: "{{ route('brDeleteAjax', "brId") }}", --}}
      type: 'DELETE',
      data: {
        brId:brId,
        _token:token,
      },
      success:function(response)
      {
        $('#brId'+brId).remove();

      }
    });
  }

});

    {{-- Ajax Brand Delete --}}

    {{-- Ajax Catagory Edit --}}

    function editBrand(id) {

      // console.log("id = "+id);

      $.get('/brfindByIdAjax/'+id, function(brand) {

        $.get('/allCatAjax/', function(response) {  //route to get all category name

          response.forEach(element => {   //loop to show all cetegory
            // console.log("id " + element['catId']);
            if (element['catId'] == brand.catId) {  //condition to select the selected category
              $('#catDropdown').append(`<option selected value="${element['catId']}">${element['catName']}</option>`);
            }
            else {

              $('#catDropdown').append(`<option value="${element['catId']}">${element['catName']}</option>`);
            }
          });

          // console.log("id " + brand.catId);
        });
        $('#brEditName').val(brand.brName);
        $('#brEditId').val(brand.brId);
        $('#brandEditModal').modal("toggle");
      });
    }


    $("#brandEditForm").submit(function(event) {


      event.preventDefault();

      let catEditId = $("#catDropdown").val();
      let brEditId = $("#brEditId").val();
      let brEditName = $("#brEditName").val();
      let _token = $("input[name=_token]").val();


      $.ajax({
        url: "{{ route('uppbrAjax') }}",
        type: "POST",
        data:{
          catEditId:catEditId,
          brEditId:brEditId,
          brEditName:brEditName,
          _token:_token
        },
        success:function(response)
        {
        // console.log("#brId"+response.brId);
        // console.log(response.brName);
        if (response) {
          $("#brId"+response.brId+' td:nth-child(2)').text(response.catName);
          $("#brId"+response.brId+' td:nth-child(3)').text(response.brName);
          $("#brandEditModal").modal('toggle');
          $("#brandEditForm")[0].reset();
        }
      }
    });
    });



    {{-- Ajax bragory Edit --}}
  </script>