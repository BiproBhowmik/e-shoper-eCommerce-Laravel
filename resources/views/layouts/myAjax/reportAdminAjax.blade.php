<script type="text/javascript">
      {{-- Ajax Brand Delete --}}
    $(".repDelete").click(function(){

      $confirm = confirm("Delete Report!");

      if ($confirm) {
        var repId = $(this).data("id");
        var token = $("meta[name='csrf-token']").attr("content");

    console.log(repId);
    
    $.ajax(
    {
      url: "repDeleteAjax/"+repId,
      {{-- url: "{{ route('repDeleteAjax', "repId") }}", --}}
      type: 'DELETE',
      data: {
        repId:repId,
        _token:token,
      },
      success:function(response)
      {
        $('#repId'+repId).remove();
      }
    });
  }

});

    {{-- Ajax repand Delete --}}

      function viewReport(r) {
    console.log(r);
    $("#repBody").text(r);
    $("#repModel").modal('toggle');
  }

//Delete Selected item
    $(function(e){
      $("#repAllCheck").click(function() {
        console.log("catId");
        $(".repCheck").prop('checked', $(this).prop('checked'));
      });

      $("#repAllDelete").click(function(e) {
        $confirm = confirm("Delete Selected Items?!");
        if ($confirm) {
          e.preventDefault();
          var allids = [];

          $("input:checkbox[name=repCheck]:checked").each(function() {
            allids.push($(this).val());
          });

          // console.log(allids);

          $.ajax({
            url: "{{ route('deleteChackedRip') }}",
            type: "DELETE",
            data:{
              ripId:allids,
              _token:$("input[name=_token]").val()
            },
            success:function(response)
            {
              if (response) {

                $.each(allids, function(key, val) {
                  $("#repId"+val).remove();
                });

              }
            }
          });
          
        }


      });

      
    });
  //Delete Selected item
</script>