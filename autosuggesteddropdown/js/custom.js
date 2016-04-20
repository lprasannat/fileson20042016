$(document).ready(function(){
    $('.autosuggest').keyup(function(){
        var searchitem=$(this).val();
       $.post('ajax/search.php',{searchitem:searchitem},function(data){
           $('.result').html(data);
           $('.result li').click(function(){
              var resultvalue=$(this).text();
              $('.autosuggest').val(resultvalue);
              $('.result').html('');
           });
       });
        
    });
});