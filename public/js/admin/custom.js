$(function () {
	$(".buttonmenu").click(function(){
	 $("#wrapper").toggleClass("toggled");
	});

	$.ajaxSetup({
	    headers: {
	        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	    }
	});
	$('.dataTable').DataTable();

	//profile image upload
	//open profile image modal
  	$(".choose-file-btn").click(function() { 
        $("#upload").trigger('click');
    });
	var $uploadCrop = "";
	$('#upload').on('change', function() {

	      var value = $(this).val(),
	          file = value.toLowerCase(),
	          extension = file.substring(file.lastIndexOf('.') + 1);

	      $(".err").html("")
	      let allowedExtensions = ['jpg', 'jpeg', 'png']
	      if ($.inArray(extension, allowedExtensions) == -1) {
	          $(".err").html("<p style='color:red;'>Please select only: jpg, jpeg, png format.</p>");
	          return false;
	      }

	      $('#upload-demo').croppie('destroy');
	      $('.upload-result').show();
	      $uploadCrop = $('#upload-demo').croppie({
	          enableExif: true,
	          enableOrientation: true,
	          viewport: {
	              width: 200,
	              height: 200
	          },
	          boundary: {
	              width: 300,
	              height: 300
	          }
	      });

	      var reader = new FileReader();
	      reader.onload = function(e) {
	          $uploadCrop.croppie('bind', {
	              url: e.target.result
	          }).then(function() {
	            $('.vanilla-rotate').show();
	          });
	      }
	      reader.readAsDataURL(this.files[0]);
	  });
	  $('.vanilla-rotate').on('click', function(ev) {
	    $uploadCrop.croppie('rotate', parseInt($(this).data('deg')));
	  });
	  $('.upload-result').on('click', function(ev) {
	      $uploadCrop.croppie('result', {
	          type: 'canvas',
	          size: 'viewport'
	      }).then(function(resp) {
	          var userType  = $('#userType').val();
	          $.ajax({
	              url: "/"+ userType +"/upload/profile",
	              type: "POST",
	              data: {
	                  "image": resp
	              },
	              dataType: 'JSON',
	              success: function(data) {
	                  $("#edit-photo").modal("hide");
	                  $(".profile-img").attr('src', resp)
	                  $('#upload-demo').croppie('destroy');
	                  $('.upload-result').hide();
	                  $('#edit-photo').modal('hide');
	                  if(data.success) {
	                    swal('Profile Updated', 'Your profile picture has been updated.', "success");
	                  } else {
	                    swal('Error', data.message, "error");
	                  }
	              },
	              error: function(err) {
	                  swal("Error!", "Please try again", "error");
	              }
	          });
	      });
	  });

	$('.delete-school').click(function() {
		var schoolId = $(this).data('id');
		swal({
          title: 'Delete School?',
          text: "You sure you want to delete school.",
          icon: "warning",
          buttons: true,
          dangerMode: true,
          html: true
      })
      .then((confirm) => {
	        if(confirm) {
	        	$.ajax({
	        		url: '/admin/school/delete/' + schoolId,
	        		type: 'DELETE',
	        		dataType:'JSON',
	        		success: function(response) {
	        			if(response.status) {
	        				$('.school-' + schoolId).remove();
	        				swal('Deleted', response.message, "success");
	        			} else {
	        				swal('Error', response.message, "error");
	        			}
	        		},
	        		error: function(error){
	        			swal('Error', 'Please try again.', "error");
	        		}
	        	})
	        }
    	});
	});

	$('.delete-plan').click(function() {
		var schoolId = $(this).data('id');
		swal({
          title: 'Delete Plan?',
          text: "You sure you want to delete plan.",
          icon: "warning",
          buttons: true,
          dangerMode: true,
          html: true
      })
      .then((confirm) => {
	        if(confirm) {
	        	$.ajax({
	        		url: '/admin/plan/delete/teacher/' + schoolId,
	        		type: 'DELETE',
	        		dataType:'JSON',
	        		success: function(response) {
	        			if(response.status) {
	        				$('.plan-' + schoolId).remove();
	        				swal('Deleted', response.message, "success");
	        			} else {
	        				swal('Error', response.message, "error");
	        			}
	        		},
	        		error: function(error){
	        			swal('Error', 'Please try again.', "error");
	        		}
	        	})
	        }
    	});
	});

	$('.delete-plan-school').click(function() {
		var schoolId = $(this).data('id');
		swal({
          title: 'Delete Plan?',
          text: "You sure you want to delete plan.",
          icon: "warning",
          buttons: true,
          dangerMode: true,
          html: true
      })
      .then((confirm) => {
	        if(confirm) {
	        	$.ajax({
	        		url: '/admin/plan/delete/school/' + schoolId,
	        		type: 'DELETE',
	        		dataType:'JSON',
	        		success: function(response) {
	        			if(response.status) {
	        				$('.plan-school' + schoolId).remove();
	        				swal('Deleted', response.message, "success");
	        			} else {
	        				swal('Error', response.message, "error");
	        			}
	        		},
	        		error: function(error){
	        			swal('Error', 'Please try again.', "error");
	        		}
	        	})
	        }
    	});
	});
});