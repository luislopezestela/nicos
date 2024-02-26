$(".reneewitemlist").on("click", function(){
    let ittm=$(this).attr("data-config");
    let ibps=$(".optlistnulldop").attr("data-nullb");
    $.ajax({
        type:"POST",
        data:{opsf:ittm},
        url:list_urls()+list_action()+"index.php?accion=renew",
        cache:false,
        beforeSend:function(){
        $("#process456").addClass('lds-ripple');
        },
        success: function(datos){
           setTimeout(function(){
          document.location.reload();
        }, 1000);
        }
    })
});

$(document).on("click", ".boxitem_cl", function(){
    let ittms=$(this).attr("data-config");
    var dtr=$(".optlistnulldop").attr("data-nullb");
    $.ajax({
        type:"POST",
        data:{ups_tr:ittms},
        url:list_urls()+list_action()+"cl_items",
        beforeSend:function(){
        $("#process456").addClass('lds-ripple');
        },
        success: function(datos){
            console.log(datos)
        setTimeout(function(){
          document.location.reload();
        }, 1000);
        }
    });
})



$(document).on("change", ".input_text_category_seaching", function(){
    let data_item=$(this).val();
    $.ajax({
        type:"POST",
        data:{name_searching:data_item,categori:true},
        url:list_urls()+list_action()+"seach_items",
        beforeSend:function(){
            $(".message_searching_list").text("Buscando..");
        },
        success: function(datos){
            document.location.reload();
        }
    });
})

$(document).on("keyup", ".lista_filter_items_box_one", function(){
    let data_item=$(this).val();
    $.ajax({
        type:"POST",
        data:{name_searching:data_item},
        url:list_urls()+list_action()+"seach_items",
        beforeSend:function(){
            $(".message_searching_list").text("Buscando..");
        },
        success: function(datos){
            $(".message_searching_list").text("");
            $(".result_seaching_pag").html(datos);
        }
    });
})

$(document).on("click", ".select_stock_item_imventori", function (){
    var dat=$(this).attr("data-conf");
    $.ajax({
      type:'POST',
      url: list_urls()+list_action()+"update_stock",
      data:{prodc:dat,proveedor:$("#proveedor_cpl"+dat).val(),documento:$("#document"+dat).val(),num_documento:$("#numdoc"+dat).val(),barcode:$("#barcode"+dat).val(),cpu:$("#cpu"+dat).val(),cpu_speed:$("#cpu_speed"+dat).val()},
      dataType: "json",
      success: function(data){
        if(data.estado==true){
            $(".stock_view_init"+dat).html(data.stock);
            $("#barcode"+dat).val("");$("#barcode"+dat).focus();
            alertexito(data.mensaje);
        }else{
            alertadvertencia(data.mensaje);
        }
      }
    });
  });


 $(document).ready(function(){
    let num_data=0;
 $("#search").keyup(function(){
 _this = this;
 
 $.each($(".result_seaching_pag .contentboxitemslist"), function() {
    if($(this).text().toLowerCase().indexOf($(_this).val().toLowerCase()) === -1){
        $(this).hide();
        num_data = $(".stockviewers span").val();
    }else{
        $(this).show();
        num_data = $(".stockviewers span").val();
    }
 });

console.log(num_data+" - ")


 });
});