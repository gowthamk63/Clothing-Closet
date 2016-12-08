var price;
function store(p){
  price = p;
}

function show(){
  var url = "uploads/".concat(price).concat(".jpg");
  console.log(url);
  // document.body.style.backgroundImage = 'url("ur")';
}
