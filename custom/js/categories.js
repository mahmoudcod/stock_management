var manageCategoriesTable

$(document).ready(function () {
	//top bar active
	$("#navCategories").addClass('active');
	//mange brand table
	manageCategoriesTable = $("#manageCategoriesTable").DataTable({
		'ajax': 'php_action/fetchCategories.php',
		'order': []
	});
    $("#addCategoriesModalBtn").unbind('click').bind('click', function() {

// remove 
        $("#submitCategoriesForm")[0].reset();
        $(".text-danger").remove();
        $(".form-group").removeClass('has-error').removeClass('has-success');

    $("#submitCategoriesForm").unbind('submit').bind('submit', function() {
        $(".text-danger").remove();
        $(".form-group").removeClass('has-error').removeClass('has-success');

        var categoriesName = $("#categoriesName").val();
        var categoriesStatus = $("#categoriesStatus").val();
       
		if (categoriesName == "") {
			$("#categoriesName").after('<p class="text-danger"> name field is requeued</p>');
			$("#categoriesName").closest('.form-group').addClass('has-error');
		} else {
			$("#categoriesName").find('.text-danger').remove();
			$("#categoriesName").closest('.form-group').addClass('has-success');
		}
		if (categoriesStatus == "") {
			$("#categoriesStatus").after('<p class="text-danger"> status field is requeued</p>');
			$("#categoriesStatus").closest('.form-group').addClass('has-error');
		} else {
			$("#categoriesStatus").find('.text-danger').remove();
			$("#categoriesStatus").closest('.form-group').addClass('has-success');
		}
        if (categoriesName && categoriesStatus) {
			var form = $(this);
			$("#createCategoriesBtn").button('loading');
			$.ajax({
				url: form.attr('action'),
				type: form.attr('method'),
				data: form.serialize(),
				dataType: 'json',
				success: function (response) {
					$("#createCategoriesBtn").button('reset');
					if (response.success == true) {
						manageCategoriesTable.ajax.reload(null, false);
						
						
						$("#submitCategoriesForm")[0].reset();
						$(".text-danger").remove();
						$(".form-group").removeClass('has-error').removeClass('has-success');
						$("#add-categories-messages").html('<div class="alert alert-success" role="alert">' +
						'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' +
						'<strong><i class="glyphicon glyphicon-ok-sign"></i></strong>' + response.messages +
						'</div>');
						$(".alert-success").delay(00).show(10, function () {
							$(this).delay(3000).hide(10, function () {
								$(this).remove();
							});
						});
					}
				}
			});
		}
        
        return false;
    });

    });
});
function editCategories(categoriesId = null) {
    if(categoriesId) {
        $("#editCategoriesId").remove();
        $.ajax({
            url: 'php_action/fetchSelectCategories.php',
            type: 'post',
            data: {categoriesId : categoriesId},
            dataType: 'json',
            success:function(response) {
                $("#editCategoriesName").val(response.categories_name);
                $("#editCategoriesStatus").val(response.categories_active);
                
                $(".editCategoriesFooter").after('<input type="hidden" name="editCategoriesId" id="editCategoriesId" value="'+response.categories_id+'" />');
                        $("#editCategoriesForm").unbind('submit').bind('submit', function() {
                            $(".text-danger").remove();
                            $(".form-group").removeClass('has-error').removeClass('has-success');
                            
                            var categoriesName = $("#editCategoriesName").val();
                            var categoriesStatus = $("#editCategoriesStatus").val();
                        
                            if (categoriesName == "") {
                                $("#editCategoriesName").after('<p class="text-danger"> name field is requeued</p>');
                                $("#editCategoriesName").closest('.form-group').addClass('has-error');
                            } else {
                                $("#editCategoriesName").find('.text-danger').remove();
                                $("#editCategoriesName").closest('.form-group').addClass('has-success');
                            }
                            if (categoriesStatus == "") {
                                $("#editCategoriesStatus").after('<p class="text-danger"> status field is requeued</p>');
                                $("#editCategoriesStatus").closest('.form-group').addClass('has-error');
                            } else {
                                $("#editCategoriesStatus").find('.text-danger').remove();
                                $("#editCategoriesStatus").closest('.form-group').addClass('has-success');
                            }
                            if (categoriesName && categoriesStatus) {
                                var form = $(this);
                                $("#createCategoriesBtn").button('loading');
                                $.ajax({
                                    url: form.attr('action'),
                                    type: form.attr('method'),
                                    data: form.serialize(),
                                    dataType: 'json',
                                    success: function (response) {
                                        $("#createCategoriesBtn").button('reset');
                                        if (response.success == true) {
                                            manageCategoriesTable.ajax.reload(null, false);
                                            
                                            
                                            $("#editCategoriesForm")[0].reset();
                                            $(".text-danger").remove();
                                            $(".form-group").removeClass('has-error').removeClass('has-success');
                                            $("#edit-categories-messages").html('<div class="alert alert-success" role="alert">' +
                                            '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' +
                                            '<strong><i class="glyphicon glyphicon-ok-sign"></i></strong>' + response.messages +
                                            '</div>');
                                            $(".alert-success").delay(00).show(10, function () {
                                                $(this).delay(3000).hide(10, function () {
                                                    $(this).remove();
                                                });
                                            });
                                        }
                                    }
                                });
                            }
                            
                            return false;
                        }); 
                 
            }
        });
    }
}
function removeCategories(categoriesId = null) {
	if (categoriesId) {
		$("#removeCategoriesBtn").unbind('click').bind('click', function () {
			$.ajax({
				url: 'php_action/removeCategories.php',
				type: 'post',
				data: {categoriesId : categoriesId},
				dataType: 'json',
				success: function (response) {
						$("#removeCategoriesModal").modal('hide');
					if (response.success == true) {
					
						manageCategoriesTable.ajax.reload(null, false);
						$(".remove-messages").html('<div class="alert alert-success" role="alert">' +
							'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' +
							'<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> you' + response.messages +
							'</div>');
						$(".alert-success").delay(00).show(10, function () {
							$(this).delay(3000).hide(10, function () {
								$(this).remove();
							});
						});
					}
				}
			});
		});
	}
}