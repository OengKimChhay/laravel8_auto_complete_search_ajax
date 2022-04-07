<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Laravel 8 Autocomplete Search using Bootstrap Typeahead JS - ItSolutionStuff.com</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
   <style>
      .wrraper{
         position: relative;
      }
      .list{
         position: absolute;
         top:38px;
         left:0;
         
      }
      .lists{
         width:300px;
         height:350px;
         overflow:hidden;
         overflow-y:visible;
         background:#c7ecee;
         box-shadow: 0 8px 6px -6px black;
      }
   </style>
</head>
<body>
<div class="container">
    <h1>Autocomplete Search using ajax </h1>
    <div class="wrraper">
        <input class="search form-control" type="text">
        <div class="list">
    </div>  

   </div>
</div>

   
<script type="text/javascript">
   $(function(){
      $(".search").on('keyup',function(){
         var query = $(this).val();
         if(query!==""){  //check if input field has value or not
            $.ajax({
               headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
               url:"{{ route('autocomplete') }}",
               type: "GET",
               data: {"searchData":query},
               success:function(res){
                  if(res){
                     $('.list').fadeIn('slow',function(){
                        $(this).html(res);
                     });
                  }
               },
               error:function(e){
                  alert(e.responseText);
               }
            });
         }else{
            $('.list').fadeOut('slow');  //when the input fiel =="" list will be hide
         }
      });
      $(document).on('click', 'a', function(){
         var text = $(this).text();
         $(".search").val(text);
         $(".list").html("");  
      });
   });
</script>

</body>
</html>