$(document).ready(function(){
    var url = "http://localhost/jalanintravel/"
    var home = $("#home").data("value")
    var title = $("#titlehtml").data("title")
    if($(".page-user").length==1){
      setInterval(getNotif,2000);
      function getNotif(){
        var user_id = $(".page-user").attr("data-user")
        $.ajax({
          type : "post",
          url : url+"user/get-notif.php",
          data : {"user_id" : user_id},
          success : function(data){
              $(".thisnotif").html(data)
          }
        })
      }
    }
    var itinerary_menu_container = $(".itinerary-menu-container")

    if(itinerary_menu_container.length==1){
      var x = itinerary_menu_container.offset()
    }
    if($(".destination-info").length==1){
      var img = $(".destination-info").find("img")
      img.addClass("img-responsive")
    }
    if($(".time-picker").length==1){
      $(".time-picker").hunterTimePicker();
    }

    if($(".btn-addfile").length==1){
      var x = 0;
      $(".btn-addfile").click(function(e){
        e.preventDefault()
        x++;
        $("#addfile").append("<div id='"+x+"' class='col-md-6'><span class='error' id='error_file_ex"+x+"'></span><input type='file' class='form-control file' name='file[]' id='file"+x+"'><a href='#' class='remove-file' data-target='#"+x+"'>Hapus</a><br><br></div>");

          $("a.remove-file").click(function(e){
            e.preventDefault()
            x--;
            var target = $(this).data("target")
            $(target).remove()
          })
      })
    }

    $("title").html(title)
    $('[data-toggle="tooltip"]').tooltip();
    $(".txtwaktu").prop("type","text")
   
    if($("#select-opt-payment").length==1){
      $("#full").hide()
      $("#dp").hide()
    }
    $("#select-opt-payment").change(function(){
        var thisval = $(this).val()
        if(thisval=="full"){
          $("#full").show()
          $("#dp").hide()
          $("#payment_option").val("full");
        }
        else if(thisval=="dp20"){
          $("#full").hide()
          $("#dp").show()
          $("#payment_option").val("dp20");
        }
        else{
          $("#full").hide()
          $("#dp").hide()
          $("#payment_option").val("");
        }
    })
    $(".hidethis").click(function(e){
      e.preventDefault()
      var datahide = $(this).data("hide")
      $(datahide).hide()
    })
    $(".scroll-package").click(function(e){
      e.preventDefault()
      var place = $(".bg-grey").offset()
      $("body").animate({"scrollTop":place.top-114},1200)

    })
    $(".check-date").click(function(e){
      e.preventDefault()
      var thisId = $(this).attr("id")
      var checkedDate = $("#"+thisId).data("value")
      var checkedDateEnd = $("#"+thisId).data("valueend")
      var tanggalindo = $("#"+thisId).data("alias")
      $("#start-tour").val(tanggalindo)
      $("#start-tour").attr("data-value",checkedDate)
      $("#start-tour").attr("data-valueend",checkedDateEnd)
      $("#myModal").modal("toggle")
    })
    $(".label-check").click(function(){
      $("label .mylayer").removeClass("show")
      var dataid = $(this).data("id")
      $("#"+dataid).addClass("show")
    })
    $(".get-city").change(function(){
        var thisval = $(this).val()
        if(thisval==""){
          $("#city").prop("disabled", true)
          $("#city").val("")
        }
        else{
            $.ajax({
              type : "post",
              data : {"province_id" : thisval},
              url : url+"admin/data-master/get-city.php",
              success : function(data){
               $("#city").append(data)
                $("#city").prop("disabled", false)
                $("#city").val("")
              }
            })      
        }
    })
    $(this).scroll(function(){
      var now = $(this).scrollTop()
      if(home=="yes"){
        if(now > 70){
          $("#navbar-top").removeClass("navbar-top-before")
          $("#navbar-top").addClass("navbar-top")

          $("#navbar-default").removeClass("navbar-default-before")
          $("#navbar-default").addClass("navbar-default")

          $("#jalan").removeClass("jalan-before")
          $("#jalan").addClass("jalan")
        }
        else{
          $("#navbar-top").removeClass("navbar-top")
          $("#navbar-top").addClass("navbar-top-before")

          $("#navbar-default").removeClass("navbar-default")
          $("#navbar-default").addClass("navbar-default-before")

          $("#jalan").removeClass("jalan")
          $("#jalan").addClass("jalan-before")
        }
      }
      else{
        if(itinerary_menu_container.length==1){
          var nav = $("#navbar-default").offset()
          if(now>=x.top){
            $(".itinerary-menu-container").addClass("fixed")
            $(".itinerary-menu-container.fixed .itinerary-menu").addClass("fixed")
          }
          else{
            $(".itinerary-menu-container").removeClass("fixed")
            $(".itinerary-menu-container.fixed .itinerary-menu").removeClass("fixed")
          }
        }
      }

      if(now > 300){
        $(".to-top").removeClass("before")
        $(".to-top").addClass("after")
      }
      else{
        $(".to-top").addClass("before")
        $(".to-top").removeClass("after")
      }
    })
    $(".to-top").click(function(){
      $("body").animate({"scrollTop" : 0},1200)
    })
    $(".txtwaktu").focus(function(){
      $(this).prop("type","time")
    })
    $(".next-step").click(function(e){
      e.preventDefault()
      var step = $(this).data("step")
      var href = $(this).attr("href")
      var package_id = $("#package_id").val() 
      if(step==2){
        var count = $(".input-pax").data("count")
        var valueToPush = [];
        var arrpax = [];
        for(var i=0;i<count;i++){
          var id = $("#pax"+i).data("id")
          var inputvalue = $("#pax"+i).val()
          arrpax.push([id,inputvalue])
        }
        var pax = arrpax
        var start_tour = $("#start-tour").attr("data-value")
        var end_tour = $("#start-tour").attr("data-valueend")
        $.ajax({
          type : "post",
          url : url+"booking/set-session.php",
          data : {"package_id" : package_id,"pax" : arrpax, "start_tour" : start_tour, "end_tour" : end_tour, "step" : 2},
          success : function(data){
            console.log(data)
            if(data.error_sum_pax=="" && data.error_start_tour==""){
                window.location = href
            }
            else{
              $("#error-sum-pax").html("<b>"+data.error_sum_pax+"</b>")
              $("#error-start-tour").html(data.error_start_tour)
            }
          }
        })
      }
      else if(step==3){
        var price = $(".radio-inline:checked").val()
        $.ajax({
          type : "post",
          data : {"price_id" : price, "step" :step},
          url : url+"booking/set-session.php",
          success : function(data){
            if(data.error_price==""){
              window.location = href
            }
            else{
              $("html,body").animate({"scrollTop" : 0}, 1200)
              $("#error-price").html("<b><i class='fa fa-warning'></i> "+data.error_price+"</b>")
            }
          }
        })
      }
      else if(step==4){
        var frmdata = new FormData()
        var alamat = $("#alamat").val()
        $(".file").each(function(key){
          var filedata = $(".file#file"+key).prop("files")[0]
          frmdata.append("file[]",filedata)
        })
        frmdata.append("alamat",alamat)
        frmdata.append("step",step)
        $.ajax({
          type : "post",
          url : url+"booking/set-session.php",
          data : frmdata,
          cache : false,
          processData: false,
          dataType : 'json',
          contentType: false,
          beforeSend: function (){
            $("#loading").show()
          },
          success : function(data){
            $("#loading").hide()
            if(data.error==""){
              window.location = href
            }
            else{
              $("#erroralamat").html("<b>"+data.erroralamat+"</b>")
              $("#errorfile").html("<b>"+data.errorfile+"</b>")
              $.each(data.error_file_ex, function(key,val){
                  $("#error_file_ex"+key).html("<b>"+val+"</b>")
              })
            }
          }
        })
      }
      else{
        window.location = href
      }
    })
    if($(".itinerary.itinerary-package").length>0){
      $(".itinerary.itinerary-package").each(function(key){
        var arrId = []
       $("#itinerary"+key+" .top img").each(function(keyImg){
          arrId.push("img"+key+keyImg)
       })
       $.each(arrId, function(index,val){
        
       })
      })
    }
    $("#register").submit(function(e){
        e.preventDefault();
        var first = $("#first_name").val()
        var last = $("#last_name").val()
        var email = $("#email").val()
        var number = $("#number").val()
        var password = $("#password").val()
        var repassword = $("#repassword").val()
        $.ajax({
          type : "post",
          data : {"first" : first, "last" : last, "email" : email, "number" : number, "password":password, "repassword":repassword},
          url : url+"user/register",
          success : function(data){
            if(data.error==""){
              window.location = '?msg=success'
            }
            else{
              $("#error_first").html(data.error_first)
              $("#error_last").html(data.error_last)
              $("#error_email").html(data.error_email)
              $("#error_number").html(data.error_number)
              $("#error_pass").html(data.error_pass)
              $("#error_repass").html(data.error_repass)
            }
          }
        })
    })
    $("#attachment").submit(function(e){
      e.preventDefault()
      var form = $(this)[0]
      var frmdata = new FormData(form)
        $.ajax({
          type : "post",
          url : url+"user/cek-attachment.php",
          data : frmdata,
          cache : false,
          processData: false,
          dataType : 'json',
          contentType: false,
          beforeSend: function (){
            $("#loading").show()
          },
          success : function(data){
            $("#loading").hide()
            if(data.error==""){
              window.location = "?q="+data.kode+"&msg=success"
            }
            else{
              $("#errorfile").html("<b>"+data.errorfile+"</b>")
              $.each(data.error_file_ex, function(key,val){
                  $("#error_file_ex"+key).html("<b>"+val+"</b>")
              })
            }
          }
        })
    })
    $(".select-city").click(function(e){
      e.preventDefault()
      var dataId = $(this).data("id")
      $(".select-city .radio").prop('checked','false')
      $(".select-city .col-md-10 h4").removeClass("color-green")
      $(".select-city .col-md-10 h4").addClass("color-grey")
      $(".select-city .col-md-10 h4 b span").html("")

      $(".select-city #id"+dataId).prop("checked","true")
      $(".select-city[data-id='"+dataId+"']").attr("data-selected","yes")
      $(".select-city[data-id='"+dataId+"'] .col-md-10 h4").removeClass("color-grey")
      $(".select-city[data-id='"+dataId+"'] .col-md-10 h4").addClass("color-green")
      $(".select-city[data-id='"+dataId+"'] .col-md-10 .color-green b span").html("<span class='fa fa-check-circle'></span> &nbsp;")
    })
    $(".select-dest").click(function(e){
      e.preventDefault()
      var dataId = $(this).data("id")
      var checkbox = "#id"+dataId;
      if($(checkbox).is(":checked")){
        $(checkbox).removeAttr("checked")
        $(".select-dest[data-id='"+dataId+"'] .col-md-8 h4 b .facheck").html("")
        $(".select-dest[data-id='"+dataId+"'] .col-md-8 .hairline.flat").removeClass("active")
      }
      else{
        $(checkbox).prop("checked","true")
        $(".select-dest[data-id='"+dataId+"'] .col-md-8 h4 b .facheck").html("<span class='fa fa-check-circle color-green'></span> &nbsp;")

        $(".select-dest[data-id='"+dataId+"'] .col-md-8 .hairline.flat").addClass("active")
      }
    })
    $(".label-check").click(function(){
      $(".check-day").hide()
      $(".box-border").removeClass("green")
      var id = $(this).data("id")
      $("#check"+id).show()
      $("#box"+id).addClass("green")
    })
    $(".plus-trip").click(function(){
      var dataId = $(this).attr("data-id")
      var ttlTrip = $(".plus-trip[data-id='"+dataId+"']").attr("data-count")
      $(".modal-lg .trip-ke").val(parseInt(parseInt(ttlTrip)+1))
      $("#frmadd-trip").attr("data-id",dataId)
      $(".time-picker").hunterTimePicker();
    })
    $("#change-hotel").change(function(){
      var thisval = $(this).val()
      $.ajax({
        type : "post",
        url : url+"hotels/get.php",
        data : {"tipe" : "hotel", "hotel_id" : thisval},
        success : function(data){
          $(".img-hotel").attr("src",data);
          $.ajax({
            type : "post",
            url : url+"hotels/get-room.php",
            data : {"hotel_id" :thisval},
            success : function(d){
             $("#room-hotels").html(d)
              $("#room-hotels").prop("disabled", false)
              $("#room-hotels").val("")
            }
          })
        }
      })
    })
    $("#room-hotels").change(function(){
      var thisval = $(this).val()
      $.ajax({
        type : "post",
        url : url+"hotels/get.php",
        data : {"tipe" : "room", "room_hotel_id" : thisval},
        success : function(data){
          $(".img-room").attr("src",data);
        }
      })      
    })
    $("#frmadd-trip").submit(function(e){
      e.preventDefault()
      var form = $(this)[0]
      var frmdata = new FormData(form)
      var tripKe = $(".trip-ke").val()
      var dataId = $(this).attr("data-id")
      frmdata.append("data_id",dataId)

      $(".plus-trip[data-id='"+dataId+"']").attr("data-count",tripKe)
      $.ajax({
        type : "post",
        url : url+"packages/custom/add-trip.php",
        processData: false,
        contentType: false,
        data : frmdata,
        success : function(data){
          $("#place-trip[data-loop='"+dataId+"']").append(data)
          $("#myModal").modal("toggle")
        }
      })
    })
    $(".custompack-next").click(function(e){
      e.preventDefault()
      var step = $(this).data("step")
      var href = $(this).attr("href")
      if(step==1){
        var city_id = $(".select-city .radio:checked").val()
        $.ajax({
          type : "post",
          url : url+"packages/custom/set-custom.php",
          data : {"step" : step , "city_id" : city_id},
          success : function(data){
            if(data.error!=""){
              var off = $("#error_city").offset()
              $("html, body").animate({"scrollTop" : off.top-50},1200)

              $("#error_city").html("<div class='alert alert-danger'>"+data.error+"</div>")
            }
            else{
              window.location = href
            }
          }
        })
      }
      else if(step==2){
        var dest_id = []
        $(".select-dest .custompack-check:checked").each(function(){
          dest_id.push($(this).val())
        });
        $.ajax({
          type : "post",
          url : url+"packages/custom/set-custom.php",
          data : {"step" : step , "dest_id" : dest_id},
          success : function(data){
            if(data.error!=""){
              var off = $("#error_dest").offset()
              $("html, body").animate({"scrollTop" : off.top-50},1200)
              $("#error_dest").html("<div class='alert alert-danger'>"+data.error+"</div>")
            }
            else{
              window.location = href
            }
          }
        })
      }
      else if(step==3){
        var dur_id = $(".dur-radio:checked").val()
        $.ajax({
          type : "post",
          url : url+"packages/custom/set-custom.php",
          data : {"step" : step , "dur_id" : dur_id},
          success : function(data){
            if(data.error!=""){
              $("#error_dur").html("<div class='alert alert-danger'>"+data.error+"</div>")
            }
            else{
              window.location = href
            }
          }
        })
      }
      else if(step==4){
        var arr = []
        var day = 0;
        $(".itinerary-package").each(function(x){
          day++
          $(".itinerary-package .middle[data-loop='"+x+"']").each(function(k){
            var v = parseInt(parseInt(k)+1)
            var time = $(".itinerary-package .middle#"+x+v+" .desc .time").html()
            var dest_id = $(".itinerary-package .middle#"+x+v+" .desc .title").attr("data-dest")
            var title = $(".itinerary-package .middle#"+x+v+" .desc .title").html()
            var desc = $(".itinerary-package .middle#"+x+v+" .desc p").html()
            arr.push({
              day : day,
              time : time,
              title : title,
              dest_id : dest_id,
              desc : desc,
            })
          })
        })
        $.ajax({
          type : "post",
          url : url+"packages/custom/set-custom.php",
          data : {"step" : step, "input" : arr},
          success : function(data){
              if(data.error!=""){

              }
              else{
                window.location = href
              }
          } 
        })
      }
      else if(step==5){
        var title = $("#title").val()
        var hotel_id = $("#change-hotel").val()
        var room_id = $("#room-hotels").val()
        var trans_id = $("#trans_id").val()
        var time = $("#time").val()
        var date = $("#date").val()
        var address = $("#address").val()
        var frmdata = new FormData()
        var filedata = $("#ktp").prop("files")[0]
        frmdata.append("ktp",filedata);
        frmdata.append("title",title);
        frmdata.append("hotel_id",hotel_id);
        frmdata.append("room_id",room_id);
        frmdata.append("trans_id",trans_id);
        frmdata.append("time",time);
        frmdata.append("date",date);
        frmdata.append("address",address);
        frmdata.append("step",step);
        $.ajax({
          type : "post",
          data : frmdata,
          cache : false,
          processData: false,
          contentType: false,
          url : url+"packages/custom/set-custom.php",
          success : function(data){
            if(data.error!=""){

            }
            else{
                window.location = data.redirect
            }
          }
        })
      }
    })
})
