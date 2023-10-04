document.getElementById("logo").addEventListener("click", gantiLight)

function gantiLight() {
    // ganti light mode disini
    var news = document.querySelector(".news")
    var box = document.querySelector(".box")
    var produkitem = document.querySelectorAll(".produk-item")
    var modalcontent = document.querySelector(".modal-content")
    var footer = document.querySelector(".copyright")
    if (document.querySelector("body").style.backgroundColor != 'white') {
        document.querySelector("body").style.backgroundColor = 'white'
        if (news ){
            news.style.color = 'black'
        }
        if (box){
            document.querySelector(".box").style.backgroundColor = "white"
            document.querySelector(".box").style.color = "black"
        }
        if (produkitem.length != 0){
            produkitem.forEach((produk) => {
                produk.style.color = "black"
            }) 
        }
        if (modalcontent){
            modalcontent.style.backgroundColor = "white"
        }
        if (footer){
            footer.style.backgroundColor = "white"
            footer.style.color = "black"
        }
        
    } else {
        document.querySelector("body").style.backgroundColor = 'black'
        if (news){
            news.style.color = 'white'
        }
        if (box){
            document.querySelector(".box").style.backgroundColor = "black"
            document.querySelector(".box").style.color = "white"
        }
        if (produkitem.length != 0){
            produkitem.forEach((produk) => {
                produk.style.color = "white"
            }) 
        }
        if (modalcontent){
            modalcontent.style.backgroundColor = "black"
        }
        if (footer){
            footer.style.backgroundColor = "black"
            footer.style.color = "white"
        }
    }
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