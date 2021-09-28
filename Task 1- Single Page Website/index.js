
let thumbnail = document.getElementsByClassName('thumbnail')
    
let activeImages = document.getElementsByClassName('active')

for (var i=0; i < thumbnail.length; i++){

  thumbnail[i].addEventListener('mouseover', function(){

    document.getElementById('featured').src = this.src
  })
}
