    DecoupledEditor
    .create( document.querySelector( '#editor' ) )
    .then( editor => {
      const toolbarContainer = document.querySelector( '#toolbar-container' );

      toolbarContainer.appendChild( editor.ui.view.toolbar.element );
    } )
    .catch( error => {
        console.error( error );
    } );
 $(document).ready(function(){
  $("#loading").hide();
  $(".sidebar-scroll").css({"height":"100%"})
 	var url = "http://localhost/jalanintravel/";
  var title = $("#titlehtml").data("title")
  setInterval(getNotif,2000);
  function getNotif(){
      $.ajax({
        url : url+"admin/common/get-notif.php",
        success : function(data){
          $(".thisnotif").append(data)
        }
      })
  }
  $(".thisnotif").click(function(){
      $.ajax({
        url : url+"admin/common/loop-notif.php",
        success : function(data){
          $(".notifications").append(data)
        }
      })
  })

  $("title").html(title)
      $(".time-picker").hunterTimePicker();
  
  var wrapper       = $(".input_fields_wrap"); //Fields wrapper
  var add_button      = $(".add_field_button"); //Add button ID
  
  var x = 0; //initlal text box count
  $(add_button).click(function(e){ //on add input button click
    e.preventDefault();
    x = $(this).data("arrcount")
      x++;
    $(this).data("arrcount",x)
      var err = parseInt(x) - 1;
      $(wrapper).append('<div id="div'+x+'"><div class="col-md-6"><label class="mt15">Foto <small id="errorimg'+err+'" class="error"></small></small></label><input type="file" class="form-control" name="img[]"><a href="#" data-div="#div'+x+'" class="remove_field">Remove</a></div></div>'); //add input box
  });
  
  $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
    e.preventDefault(); 
    x--;
    var thisId = $(this).attr("data-div")
    $(thisId).remove(); 
  })

 	$("#add-destination").submit(function(e){
 		e.preventDefault()

 		var form = $(this)[0]
 		var frmdata = new FormData(form)
    var info = $("#editor").html()
    frmdata.append("information",info)
 		$.ajax({
 			type : "post",
 			url : url+"admin/destinations/insert-destination.php",
 			data : frmdata,
      cache : false,
			processData: false,
      dataType : 'json',
			contentType: false,
      beforeSend: function (){
        $("#loading").show()
      },     
      success : function(data){
          if(data.error=="no"){
            alert("Berhasil")
              window.location = ''
          }
          else{
            $("#errdsname").html(data.error_destination_name)
            $("#errcity").html(data.error_city)
            $("#errcat").html(data.error_category)
            $("#errts").html(data.error_tour_style)
            $("#erroverview").html(data.error_overview)
            $("#errimg").html(data.error_img)
            $("#errinfo").html(data.error_info)
            if(data.error_img==""){
              for(var i=0;i<data.error_loop_img.length;i++){
                $("#errorimg"+data.error_loop_img[i][0]).html(data.error_loop_img[i][1]);
              }
            }
          }
          $("#loading").hide()
      }
    })
  })
  $("#edit-destination").submit(function(e){
    e.preventDefault()
      var form = $(this)[0]
      var frmdata = new FormData(form)
    var info = $("#editor").html()
    frmdata.append("information",info)
    $.ajax({
      type : "post",
      url : url+"admin/destinations/update-destination.php",
      data : frmdata,
      cache : false,
      processData: false,
      dataType : 'json',
      contentType: false,
      beforeSend: function (){
        $("#loading").show()
      },     
      success : function(data){
          if(data.error=="no"){
            alert("Berhasil")
              window.location = ''
          }
          else{
            $("#errdsname").html(data.error_destination_name)
            $("#errcity").html(data.error_city)
            $("#errcat").html(data.error_category)
            $("#errts").html(data.error_tour_style)
            $("#erroverview").html(data.error_overview)
            $("#errimg").html(data.error_img)
            $("#errinfo").html(data.error_info)
            if(data.img_loop=="yes"){
              for(var i=0;i<data.error_loop_img.length;i++){
                $("#errorimg"+data.error_loop_img[i][0]).html(data.error_loop_img[i][1]);
              }
            }
            console.log(data)
          }
          $("#loading").hide()
      }
    })
  })
  $("#hotels").change(function(){
    var thisVal = $(this).val()
    $.ajax({
      type : "post",
      data : {"hotel_id" : thisVal},
      url : url+"admin/hotels/get-room-hotel.php",
      success : function(data){
       $("#room-hotels").html(data)
        $("#room-hotels").prop("disabled", false)
        $("#room-hotels").val("")
      }
    })    
  })
  $(".select-dest").click(function(e){
      e.preventDefault()
      var thisId = $(this).attr("id")
      var labelFor = $(this).attr("for")
      if($("#"+thisId+" .destinations-img .layer .check.transition05.show").length==1){
        $(labelFor).prop("checked",false)
        $("#"+thisId+" .destinations-img .layer .check").removeClass("show")
      }
      else{
        $(labelFor).prop("checked",true)
        $("#"+thisId+" .destinations-img .layer .check").addClass("show")
      }
  })
  if($(".hideinput").length>0){
      $(".hideinput").each(function(key) {
        var col = $("#col"+key).attr("data-show")
        if(col=="yes"){
          $("#col"+key).show()
        }
        else{
          $("#col"+key).hide()
        }
      })
  }
  $(".showcheck").click(function(){
      var thisId = $(this).attr("id")
      $("#"+thisId).click(function(){
        var target = $(this).data("target")
        if($(target).attr("data-show")=="yes"){
          $(target).hide()
          $(target).attr("data-show","no")
          $(target+" select.select").attr("name","")
          $(target+" input.input").attr("name","")
          $(target+" select.select-day").attr("name","")
        }
        else{
          $(target).attr("data-show","yes")
          $(target).show()
          var nameAcc = $(target+" select.select").attr("data-name")
          var nameDep = $(target+" input").attr("data-name")
          var nameDay = $(target+" select.select-day").attr("data-name")
          $(target+" select.select").attr("name",nameAcc)
          $(target+" input.input").attr("name",nameDep)
          $(target+" select.select-day").attr("name",nameDay)
        }
      })
  })


  if($(".add-trip").length>0){
    var click = parseInt($(".add-trip").attr("data-click"));
    $(".add-trip").click(function(e){
      e.preventDefault()
      click++
      var target = $(this).data("target")
      var dataLoop = $(this).data("loop")
      var destId = $(this).data("dest")
      $.ajax({
        url : url+"admin/packages/add-trip.php",
        type : "post",
        data : {"id":click,"loop":dataLoop,"destination_id":destId},
        success : function(data){
          $("#"+target).append(data)
          $(".time-picker").hunterTimePicker();
          $(".remove-trip").click(function(e){
            e.preventDefault()
            var remove = $(this).data("remove")
            click--
            $("#"+remove).remove()
          })
        }
      })
    })
    $(".remove-trip").click(function(e){
      e.preventDefault()
      var remove = $(this).data("remove")
      click--
      $("#"+remove).remove()
    })
  }

  $("#frm-add-package").submit(function(e){
      e.preventDefault()
      var step = $(this).data("step")
      var nextUrl = $(this).data("url")
      var form = $(this)[0]
      var frmdata = new FormData(form)
      frmdata.append("step",step)

        $.ajax({
          type : "post",
          url : url+"admin/packages/set-session.php",
          data : frmdata,
          cache : false,
          processData: false,
          dataType : 'json',
          contentType: false,
          beforeSend: function (){
            $("#loading").show()
          },
          success : function(data){
          if(step==1){
            if(data.json_error=="no"){
              window.location = nextUrl 
            }
            else{
              for(var i=0;i<data.error.length;i++){
                  $(data.error[i][0]).html(data.error[i][1])
              }
            }
          }
          else if(step==2){
              if(data.error==""){
                window.location = nextUrl 
              }
              else{
                $("#errdest").addClass("alert alert-danger")
                $("#errdest").html(data.error)
              }
          }
          else if(step==3){
            if(data.error=="no"){
                window.location = nextUrl
            } 
            else{
              for(var i=0;i<data.error_dest.length;i++){
                $.each(data.error_dest[i], function(key,val){
                    $("#dest"+i+"-"+key).html(val)
                })
                $.each(data.error_title[i], function(key,val){
                    $("#title"+i+"-"+key).html(val)
                })
                $.each(data.error_category[i], function(key,val){
                    $("#cat"+i+"-"+key).html(val)
                })
                $.each(data.error_ts[i], function(key,val){
                    $("#ts"+i+"-"+key).html(val)
                })
                $.each(data.error_start[i], function(key,val){
                    $("#start"+i+"-"+key).html(val)
                })
                $.each(data.error_end[i], function(key,val){
                    $("#end"+i+"-"+key).html(val)
                })
                $.each(data.error_desc[i], function(key,val){
                    $("#desc"+i+"-"+key).html(val)
                })
              }
            }        
          }
          else if(step==4){
            if(data.error=="no"){
                window.location = nextUrl
            }
            else{
              if(data.error_count!=""){
                $("#erroffice").html("<div class='alert alert-danger'>"+data.error_count+"</div>")
              }
              else{
                $.each(data.error_accommodation, function(key,val){
                  $("#erracc"+key).html(val)
                })
                $.each(data.error_departure, function(key,val){
                  $("#errdep"+key).html(val)
                })
                $.each(data.error_departure_day, function(key,val){
                  $("#errday"+key).html(val)
                })
              }
            }
          }
          else if(step==5){
            if(data.error=="no"){
              window.location = nextUrl
            }
            else{
              $.each(data.error_price, function(key,val){
                $.each(data.error_price[key], function(k,v){
                  $("#errprice"+key+k).html(v)
                })
              })
            }
          }
          else if(step==6){
            if(data.error==""){
              window.location=url+"admin/packages/insert-packages.php"
            }
            else{
              $("#errsale").html(data.error)
            }
          }
          $("#loading").hide();
          console.log(data)
        }
      })
  })
  $(".remove-pax").click(function(e){
    e.preventDefault()
    var thisId = $(this).attr("data-id")
    var rem = $(this).attr("data-span")
    var rpax = $(rem).attr("data-rpax")
    var plus = parseInt(rpax)
    var count = parseInt($(rem).attr("data-count"))
    if(plus==(count-1)){
      var err = $(this).attr("data-loop")
      $("#err"+err).html("<div class='alert alert-danger'>Minimal 1 Kategori</div>");
      $("#me"+thisId).remove()
      $("#md"+thisId).removeClass("col-md-3")
      $("#md"+thisId).addClass("col-md-4")
    }
    else{
      $("#row"+thisId).remove()
      plus++
      $(rem).attr("data-rpax",plus)
    }
  })
  $(".imgmodal").click(function(){
    var target = $(this).data("target")
    var src = $(this).data("src")
    $(target+" .modal-body img").attr("src",src)
  })
  $("#step2city").change(function(){
    var thisVal = $(this).val()
    if(thisVal!=""){
      window.location = url+"admin/packages/add-package?step=2&city="+thisVal
    }
    else{
      window.location = url+"admin/packages/add-package?step=2"
    }
  })
  $("#step2cat").change(function(){
    var thisVal = $(this).val()
    var datafilter = $("#step2city").data("filter")
    if(thisVal!=""){
      if(datafilter=="yes"){
        var cityVal = $("#step2city").val()
        if(cityVal==""){
          var filter =  "&category="+thisVal;
        }
        else{
          var filter =  "&city="+cityVal+"&category="+thisVal;
        }
      }
      else{
        var filter =  "&category="+thisVal;
      }
      window.location = url+"admin/packages/add-package?step=2"+filter
    }
  })
 })
