function reject(id) {
  var request = $.ajax({
    url: "approve.php",
    method: "GET",
    data: { action:'reject',id : id },
    success: function(){
      location.reload();
    }
  });
 }

 function approve(id) {
   var request = $.ajax({
     url: "approve.php",
     method: "GET",
     data: { action:'approve',id : id },
     success: function(){
       location.reload();
     }
   });
  }

  function edit(id){
    var x="editvalue".concat(id);
    var value = document.getElementById(x).value;
    var request = $.ajax({
      url: "approve.php",
      method: "GET",
      data: { action:'edit',id : id, value:value },
      success: function(){
        location.reload();
      }
    });
  }

  function show(id){
    var x="edit".concat(id);
    var y="btn".concat(id);

    document.getElementById(x).style.display="inline-block";
    document.getElementById(y).style.display="none";
}
