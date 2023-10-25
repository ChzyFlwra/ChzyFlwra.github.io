document.getElementById("logo").addEventListener("click", gantiLight)

function gantiLight() {
    document.querySelector("body").classList.toggle("light-mode")
}

var produkitem = document.querySelectorAll(".produk-item")
if (produkitem.length != 0){
    produkitem.forEach((produk) => {
        produk.querySelector("button").addEventListener("click", function(){
            produk.querySelector(".apa").innerHTML = "soldout"
        })
    })
}

var modal = document.getElementById("mymodal");

var btn = document.getElementById("mybtn");

var span = document.getElementsByClassName("close")[0];

if (btn)
btn.onclick = function() {
  modal.style.display = "block";
}

if(span)
span.onclick = function() {
  modal.style.display = "none";
}

window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}