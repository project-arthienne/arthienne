document.querySelectorAll('[data-auction-carousel]').forEach(carousel=>{
const track=carousel.querySelector('.auction-track')
const cards=carousel.querySelectorAll('.auction-card')
const cardWidth=cards[0].offsetWidth+24
let index=0

carousel.querySelector('.auction-arrow.right').onclick=()=>{
index++
if(index>cards.length-1) index=0
track.style.transform=`translateX(${-index*cardWidth}px)`
}

carousel.querySelector('.auction-arrow.left').onclick=()=>{
index--
if(index<0) index=cards.length-1
track.style.transform=`translateX(${-index*cardWidth}px)`
}
})
