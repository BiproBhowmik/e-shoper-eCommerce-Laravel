<script type="text/javascript">

    {{-- Ajax Catagory Insert --}}
    $("#categoryForm").submit(function(event) {


        event.preventDefault();

        let catName = $("#catName").val();
        let _token = $("input[name=_token]").val();

        console.log(catName);

        $.ajax({
            url: "{{ route('addCatAjax') }}",
            type: "POST",
            data:{
                catName:catName,
                _token:_token
            },
            success:function(response)
            {
                if (response) {
                    $("#catTable tbody").prepend('<tr><td>'+"New"+'</td><td>'+response.catName+'</td><td>'+"Added"+'</td></tr>');
                    $("#categoryForm")[0].reset();
                    // $("#categoryAddModal").modal('toggle');
                    // $("#categoryAddModal").modal('hide');
                }
            }
        });
    });
    {{-- Ajax Catagory Insert --}}

    {{-- Ajax Catagory Delete --}}
    $(".catDelete").click(function(){

        $confirm = confirm("Delete Category!");

        if ($confirm) {
            var catId = $(this).data("id");
            var token = $("meta[name='csrf-token']").attr("content");

    // console.log(token);
    
    $.ajax(
    {
        url: "catDeleteAjax/"+catId,
        {{-- url: "{{ route('catDeleteAjax', "catId") }}", --}}
        type: 'DELETE',
        data: {
            catId:catId,
            _token:token,
        },
        success:function(response)
        {
          $('#catId'+catId).remove();
          
      }
  });
}

});

    {{-- Ajax Catagory Delete --}}


    {{-- Ajax Catagory Edit --}}

    function editCategory(id) {

      // console.log("id = "+id);
      $.get('/catfindByIdAjax/'+id, function(category) {
        // console.log(id);
        $('#catEditName').val(category.catName);
        $('#catEditId').val(category.catId);
        $('#categoryEditModal').modal("toggle");
    });
  }


  $("#categoryEditForm").submit(function(event) {


    event.preventDefault();

    let catEditId = $("#catEditId").val();
    let catEditName = $("#catEditName").val();
    let _token = $("input[name=_token]").val();
    

    $.ajax({
        url: "{{ route('uppCatAjax') }}",
        type: "POST",
        data:{
            catEditId:catEditId,
            catEditName:catEditName,
            _token:_token
        },
        success:function(response)
        {
        // console.log("#catId"+response.catId);
        // console.log(response.catName);
        if (response) {
            $("#catId"+response.catId+' td:nth-child(2)').text(response.catName);
            $("#categoryEditModal").modal('toggle');
            $("#categoryEditForm")[0].reset();
        }
    }
});
});



  {{-- Ajax Catagory Edit --}}

</script>