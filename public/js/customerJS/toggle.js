var btnToggle = document.getElementById('btn-acc');
console.log(btnToggle);
btnToggle.addEventListener("click", function(){
  var x = document.getElementById("account-list");

  if (x.style.display === "none") {
    x.style.display = "block";
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
})
