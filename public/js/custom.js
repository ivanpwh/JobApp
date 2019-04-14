$(document).ready(function () {

  $("#close").click(function() {
    $(".modal").removeClass("is-active");
  });

  $("#cancel").click(function() {
    $(".modal").removeClass("is-active");
  });

  $("#close2").click(function() {
    $(".modal").removeClass("is-active");
  });

  $("#cancel2").click(function() {
    $(".modal").removeClass("is-active");
  });

  $(document).on('click','#view-button', function() {
    $('#view-modal').addClass('is-active');
    $('#user-id').val($(this).data('id'));
    $('.modal-card-title').text('User Details');
    var pathname = window.location.pathname; // Returns path only (/path/example.html)

    // $.ajax({
    //   type: "GET",
    //   url: '/admin/users/',
    //   data: {
    //     'id': $(this).data('id')
    //   },
    //   dataType: "json",
    //   success: function (data) {
    //     $('#data-view').html(data['view']);
    //   },
    //   error: function (xhr,status) {
		// 		console.log(xhr.error + "ERROR STATUS: " + status);
		// 	},
		// 	complete: function(){
		// 		alreadyLoading = false;
		// 	}
    // });

    // e.preventDefault();
    var id = $(this).data('id');
    // var BASE = "<?php echo URL::base(); ?>";
    $.get('/admin/show/'+id, function(data) {
      $("#data-view").html(data['view']);
    });
    
    // $.ajax({
    //   type: "get",
    //   url: "/admin/show/",
    //   dataType: "json",
    //   data: {
    //     'id' : '3'
    //   },
    //   success: function (data) {
    //     $("#data-view").html(data['view']);
    //   },
    //   error: function (xhr,status) {
    //     console.log(xhr.error + "ERROR STATUS: " + status);
    //   },
    //   complete: function(){
    //     alreadyLoading = false;
    //   }
    // });

    // var xhttp = new XMLHttpRequest();
    // xhttp.onreadystatechange = function() {
    //   if (this.readyState == 4 && this.status == 200) {
    //     document.getElementById("data-view").innerHTML = this.responseText;
    //   }
    // };
    // xhttp.open("GET", "/admin/show", true);
    // xhttp.send();
  });

  $(document).on('click','#update-button', function() {
    $('#update-modal').addClass('is-active');
    $('#user-id').val($(this).data('id'));
    $('.modal-card-title').text('Edit User Details');

    var id = $(this).data('id');
    $.get('/admin/showUpdate/'+id, function(data) {
      $("#data-update").html(data['view']);
    });
  });

  $(document).on('click','#delete-button', function() {
    $('#view-modal').addClass('is-active');
    $('#user-id').val($(this).data('id'));
  });

  $(document).on('click','#button-unread', function() {
    $('#button-unread').addClass('is-active');
    $('#button-accept').removeClass('is-active');
    $('#button-reject').removeClass('is-active');
    // var xhttp = new XMLHttpRequest();
    // xhttp.onreadystatechange = function() {
    //   if (this.readyState == 4 && this.status == 200) {
    //     document.getElementById("table").innerHTML = this.responseText;
    //   }
    // };
    // xhttp.open("GET", "/admin/unread", true);
    // xhttp.send();
    
    $.ajax({
      type: "get",
      url: "/admin/status/",
      dataType: "json",
      data: {
        'status_cv' : '0'
      },
      success: function (data) {
        $("#table").html(data['view']);
      },
      error: function (xhr,status) {
        console.log(xhr.error + "ERROR STATUS: " + status);
      },
      complete: function(){
        alreadyLoading = false;
      }
    });
  });
  
  $(document).on('click','#button-accept', function() {
    $('#button-accept').addClass('is-active');
    $('#button-unread').removeClass('is-active');
    $('#button-reject').removeClass('is-active');
    
    var pathname = window.location.pathname; // Returns path only (/path/example.html)

    // var xhttp = new XMLHttpRequest();
    // xhttp.onreadystatechange = function() {
    //   if (this.readyState == 4 && this.status == 200) {
    //     document.getElementById("table").innerHTML = this.responseText;
    //   }
    // };
    // xhttp.open("GET", "/admin/accept", true);
    // xhttp.send();
    $.ajax({
      type: "get",
      url: "/admin/status/",
      dataType: "json",
      data: {
        'status_cv' : '1'
      },
      success: function (data) {
        $("#table").html(data['view']);
      },
      error: function (xhr,status) {
        console.log(xhr.error + "ERROR STATUS: " + status);
      },
      complete: function(){
        alreadyLoading = false;
      }
    });
  });

  $(document).on('click','#button-reject', function() {
    $('#button-reject').addClass('is-active');
    $('#button-unread').removeClass('is-active');
    $('#button-accept').removeClass('is-active');
    
    // var xhttp = new XMLHttpRequest();
    // xhttp.onreadystatechange = function() {
    //   if (this.readyState == 4 && this.status == 200) {
    //     document.getElementById("table").innerHTML = this.responseText;
    //   }
    // };
    // xhttp.open("GET", "/admin/reject", true);
    // xhttp.send();

    $.ajax({
      type: "get",
      url: "/admin/status/",
      dataType: "json",
      data: {
        'status_cv' : '2'
      },
      success: function (data) {
        $("#table").html(data['view']);
      },
      error: function (xhr,status) {
        console.log(xhr.error + "ERROR STATUS: " + status);
      },
      complete: function(){
        alreadyLoading = false;
      }
    });
  });

  $(document).on('click','#accept',function(){
    var id = $(this).data('id');
    $.ajax({
      type: "get",
      url: "admin/statusCV/"+id,
      data: {
        'status_cv' : '1'
      },
      dataType: "json",
      success: function () {
        $("#table").html(data['view']);
      }
    });
  });
  
});

document.addEventListener('DOMContentLoaded', function () {

  // Dropdowns

  var $dropdowns = getAll('.dropdown:not(.is-hoverable)');

  if ($dropdowns.length > 0) {
    $dropdowns.forEach(function ($el) {
      $el.addEventListener('click', function (event) {
        event.stopPropagation();
        $el.classList.toggle('is-active');
      });
    });

    document.addEventListener('click', function (event) {
      closeDropdowns();
    });
  }

  function closeDropdowns() {
    $dropdowns.forEach(function ($el) {
      $el.classList.remove('is-active');
    });
  }

  // Close dropdowns if ESC pressed
  document.addEventListener('keydown', function (event) {
    var e = event || window.event;
    if (e.keyCode === 27) {
      closeDropdowns();
    }
  });

  // Functions
  function getAll(selector) {
    return Array.prototype.slice.call(document.querySelectorAll(selector), 0);
  }
});
