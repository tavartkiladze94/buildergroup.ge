function news_create(){
    var text = $(".ql-editor").html();
    var titl = $("#title_ge").val();
    var cat = $("#category").val();
  
    $.ajax({
     url:'<?=base_url()?>admin/news_create_send',
     method: 'post',
     data: {title_ge: titl, category: cat, full_text_ge: text},
     success: function(data){
         var dataa = JSON.parse(data);
        window.location.href = "<?=base_url('admin/news_edit/');?>"+dataa.code;
     
     }
   
  });
 
 }
 
 function news_update(){
    var text = $(".ql-editor").html();
    var titl = $("#title_ge").val();
    var cat = $("#category").val();
  
    $.ajax({
     url:'<?=base_url()?>admin/news_update_send',
     method: 'post',
     data: {title_ge: titl, category: cat, full_text_ge: text, code: <?php echo $news_edit['code'];?>},
     success: function(data){
         var dataa = JSON.parse(data);
        window.location.href = "<?=base_url('admin/news_edit/');?>"+dataa.code;
     
     }
   
  });
 
 }

   

      $(window).on('load',  function(){
        if (feather) {
          feather.replace({ width: 14, height: 14 });
        }
      })