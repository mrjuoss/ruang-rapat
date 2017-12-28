function showDetail(id) {
	//alert ("Test "+id);
	
	$.ajax({
		url:"detail.php?id="+id,
		cache:false,
		success: function(result) {
			$(".modal-content").html(result);
		}
	})
}

