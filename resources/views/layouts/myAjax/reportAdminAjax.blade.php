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
</script>