function news_create(){
  alert("sss");
 
 

 
 }
 function news_update(){
    var text = $(".ql-editor").html();
    var titl = $("#titlee_ge").val();
    var cat = $("#category").val();
    var cod= "<?php echo $news_edit['code'];?>";
     $.ajax({
     url:'<?=base_url()?>admin/news_update_send',
     method: 'post',
     
     data: {title_ge: titl, category: cat, text_full_ge: text, code : cod},
     success: function(data){
         var dataa = JSON.parse(data);
        window.location.href = "<?=base_url('admin/news_edit/');?>"+cod;
     
     }
   
  });
 
 }