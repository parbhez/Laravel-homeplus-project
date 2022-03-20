<script>
  function loadModal(url){
    var baseUrl='<? echo URL::to(''); ?>';
    $("#body-content").load(baseUrl+"/"+url);
  }

	function loadModalEdit(route, id, action){
		var baseUrl='<? echo URL::to(''); ?>';
		$("#body-content").load(baseUrl+"/"+ route +'/'+ id +'/'+ action);
	}
</script>
<!-- Normal Modal -->
<div id="modal" class="modal fade" tabindex="1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="background-color:black;color:white">×</button>
        <h4 class="modal-title" ></h4>
      </div>
      <div class="modal-body" id="body-content">
        
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div> <!-- /.modal -->

