function add(id){
  var request = $.ajax({
    url: "addToCart.php",
    method: "GET",
    data: { action:'add',id : id },

    success: function(){
      location.reload();
    }
  });
}

function remove(id){
  var request = $.ajax({
    url: "addToCart.php",
    method: "GET",
    data: { action:'remove',id : id },

    success: function(){
      location.reload();
    }
  });
}
